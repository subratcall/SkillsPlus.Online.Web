<?php

namespace App\Http\Controllers\Admin;

use Anand\LaravelPaytmWallet\Facades\PaytmWallet;
use App\Models\Balance;
use App\Models\Content;
use App\Models\Sell;
use App\Models\Transaction;
use App\Models\TransactionCharge;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PayPal\Api\Amount;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use SoapClient;
use Illuminate\Support\Facades\Redirect;
use Unicodeveloper\Paystack\Facades\Paystack;

class PayController extends Controller
{

    public function __construct()
    {
        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential(
                $paypal_conf['client_id'],
                $paypal_conf['secret'])
        );
        $this->_api_context->setConfig($paypal_conf['settings']);
    }

    ## Paypal
    public function paypalPay($id, $mode = 'download'){
        global $user;
        if(!$user)
            return Redirect::to('/user?redirect=/product/'.$id);

        $content = Content::with('metas')->where('mode','publish')->find($id);
        if(!$content)
            abort(404);

        if($content->private == 1)
            $site_income = get_option('site_income_private');
        else
            $site_income = get_option('site_income');

        $meta = arrayToList($content->metas,'option','value');

        if($mode == 'download')
            $Amount = $meta['price'];
        elseif ($mode == 'post')
            $Amount = $meta['post_price'];

        $Description = trans('admin.item_purchased').$content->title.trans('admin.by').$user['name']; // Required
        $Amount_pay = pricePay($content->id,$content->category_id,$Amount)['price'];


        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
        $item_1 = new Item();
        $item_1->setName($content->title)
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setPrice($Amount);
        $item_list = new ItemList();
        $item_list->setItems(array($item_1));
        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal($Amount);
        $transaction = new \PayPal\Api\Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Purchase Product');
        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(url('/').'/bank/paypal/status')
            ->setCancelUrl(url('/').'/bank/paypal/cancel/'.$id);
        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));
        try {
            $payment->create($this->_api_context);
        } catch (\PayPal\Exception\PPConnectionException $ex) {
            if (\Config::get('app.debug')) {
                \Session::put('error', 'Connection timeout');
                return Redirect::route('paywithpaypal');
            } else {
                \Session::put('error', 'Some error occur, sorry for inconvenient');
                return Redirect::route('paywithpaypal');
            }
        }
        foreach ($payment->getLinks() as $link) {
            if ($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }
        $ids = $payment->getId();
        \Session::put('paypal_payment_id', $ids);
        Transaction::insert([
            'buyer_id'=>$user['id'],
            'user_id'=>$content->user_id,
            'content_id'=>$content->id,
            'price'=>$Amount_pay,
            'price_content'=>$Amount,
            'mode'=>'pending',
            'create_at'=>time(),
            'bank'=>'paypal',
            'income'=>$Amount_pay - (($site_income/100)*$Amount_pay),
            'authority'=>$ids,
            'type'=>$mode
        ]);
        /** add payment ID to session **/
        if (isset($redirect_url)) {
            /** redirect to paypal **/
            return Redirect::away($redirect_url);
        }
        \Session::put('error', 'Unknown error occurred');
        return Redirect::route('paywithpaypal');

    }
    public function paypalStatus(Request $request){
        $payment_id = \Session::get('paypal_payment_id');
        \Session::forget('paypal_payment_id');
        if (empty($request->PayerID) || empty($request->token)) {
            \Session::put('error', 'Payment failed');
            return Redirect::route('/');
        }
        $payment = Payment::get($payment_id, $this->_api_context);
        $execution = new PaymentExecution();
        $execution->setPayerId($request->PayerID);
        $result = $payment->execute($execution, $this->_api_context);
        $transaction = Transaction::where('mode','pending')->where('authority',$payment_id)->first();
        if ($result->getState() == 'approved') {
            $product = Content::find($transaction->content_id);
            $userUpdate = User::with('category')->find($transaction->user_id);
            if($product->private == 1)
                $site_income = get_option('site_income_private')-$userUpdate->category->off;
            else
                $site_income = get_option('site_income')-$userUpdate->category->off;

            if(empty($transaction))
                \redirect('/product/'.$transaction->content_id);

            $Amount = $transaction->price;

            Sell::insert([
                'user_id'       => $transaction->user_id,
                'buyer_id'      => $transaction->buyer_id,
                'content_id'    => $transaction->content_id,
                'type'          => $transaction->type,
                'create_at'     => time(),
                'mode'          => 'pay',
                'transaction_id'=> $transaction->id,
                'remain_time'   => $transaction->remain_time
            ]);

            $userUpdate->update(['income'=>$userUpdate->income+((100-$site_income)/100)*$Amount]);
            Transaction::find($transaction->id)->update(['mode'=>'deliver','income'=>((100-$site_income)/100)*$Amount]);

            ## Notification Center
            sendNotification(0,['[c.title]'=>$product->title],get_option('notification_template_buy_new'),'user',$transaction->buyer_id);

            return redirect('/product/'.$transaction->content_id);

        }
        return redirect('/product/'.$transaction->content_id);
    }
    public function paypalCancel($id, Request $request){
        return \redirect('/product/'.$id)->with('msg',trans('admin.payment_failed'));
    }

    ## Paytm
    public function paytmPay($id, $mode = 'download', Request $request){
        global $user;
        if(!$user)
            return Redirect::to('/user?redirect=/product/'.$id);

        $content = Content::with('metas')->where('mode','publish')->find($id);
        if(!$content)
            abort(404);

        if($content->private == 1)
            $site_income = get_option('site_income_private');
        else
            $site_income = get_option('site_income');

        $meta = arrayToList($content->metas,'option','value');

        if($mode == 'download')
            $Amount = $meta['price'];
        elseif ($mode == 'post')
            $Amount = $meta['post_price'];

        $Description = trans('admin.item_purchased').$content->title.trans('admin.by').$user['name']; // Required
        $Amount_pay = pricePay($content->id,$content->category_id,$Amount)['price'];

        $Transaction = Transaction::create([
            'buyer_id'      => $user['id'],
            'user_id'       => $content->user_id,
            'content_id'    => $content->id,
            'price'         => $Amount_pay,
            'price_content' => $Amount,
            'mode'          => 'pending',
            'create_at'     => time(),
            'bank'          => 'paytm',
            'authority'     => 0,
            'income'        => $Amount_pay - (($site_income/100)*$Amount_pay),
            'type'          => $mode
        ]);

        $payment = PaytmWallet::with('receive');
        $payment->prepare([
            'order'         => $Transaction->id,
            'user'          => $user['id'],
            'email'         => $user['email'],
            'mobile_number' => '00187654321',
            'amount'        => $Transaction->price,
            'callback_url'  => url('/').'/bank/paytm/status/'.$content->id
        ]);
        return $payment->receive();

    }
    public function paytmStatus($product_id, Request $request){
        $transaction = PaytmWallet::with('receive');
        $Transaction = Transaction::find($transaction->getOrderId());
        $response = $transaction->response();

        if($transaction->isSuccessful()){
            $product = Content::find($Transaction->content_id);
            $userUpdate = User::with('category')->find($Transaction->user_id);
            if($product->private == 1)
                $site_income = get_option('site_income_private')-$userUpdate->category->off;
            else
                $site_income = get_option('site_income')-$userUpdate->category->off;

            if(empty($transaction))
                \redirect('/product/'.$Transaction->content_id);

            $Amount = $transaction->price;

            Sell::insert([
                'user_id'       => $Transaction->user_id,
                'buyer_id'      => $Transaction->buyer_id,
                'content_id'    => $Transaction->content_id,
                'type'          => $Transaction->type,
                'create_at'     => time(),
                'mode'          => 'pay',
                'transaction_id'=> $Transaction->id,
                'remiain_time'  => $Transaction->remain_time
            ]);

            $userUpdate->update(['income'=>$userUpdate->income+((100-$site_income)/100)*$Amount]);
            Transaction::find($Transaction->id)->update(['mode'=>'deliver','income'=>((100-$site_income)/100)*$Amount]);

            ## Notification Center
            sendNotification(0,['[c.title]'=>$product->title],get_option('notification_template_buy_new'),'user',$Transaction->buyer_id);

            return redirect('/product/'.$Transaction->content_id);

        }else if($transaction->isFailed()){
            return \redirect('/product/'.$product_id)->with('msg',trans('admin.payment_failed'));
        }else if($transaction->isOpen()){
            //Transaction Open/Processing
        }
    }
    public function paytmCancel($id, Request $request){
        return \redirect('/product/'.$id)->with('msg',trans('admin.payment_failed'));
    }

    ## Payu
    public function payuPay($id, $mode = 'download', Request $request){
        global $user;
        if(!$user)
            return Redirect::to('/user?redirect=/product/'.$id);

        $content = Content::with('metas')->where('mode','publish')->find($id);
        if(!$content)
            abort(404);

        if($content->private == 1)
            $site_income = get_option('site_income_private');
        else
            $site_income = get_option('site_income');

        $meta = arrayToList($content->metas,'option','value');

        if($mode == 'download')
            $Amount = $meta['price'];
        elseif ($mode == 'post')
            $Amount = $meta['post_price'];

        $Description = trans('admin.item_purchased').$content->title.trans('admin.by').$user['name']; // Required
        $Amount_pay = pricePay($content->id,$content->category_id,$Amount)['price'];
        $Transaction = Transaction::create([
            'buyer_id'      => $user['id'],
            'user_id'       => $content->user_id,
            'content_id'    => $content->id,
            'price'         => $Amount_pay,
            'price_content' => $Amount,
            'mode'          => 'pending',
            'create_at'     => time(),
            'bank'          => 'paytm',
            'authority'     => 0,
            'income'        => $Amount_pay - (($site_income/100)*$Amount_pay),
            'type'          => $mode
        ]);


    }
    public function payuStatus($product_id, Request $request){

    }
    public function payuCancel($id, Request $request){
        return \redirect('/product/'.$id)->with('msg',trans('admin.payment_failed'));
    }

    ## PayStack
    public function paystackPay($id, $mode = 'download', Request $request){
        global $user;
        if(!$user)
            return Redirect::to('/user?redirect=/product/'.$id);

        $content = Content::with('metas')->where('mode','publish')->find($id);
        if(!$content)
            abort(404);

        if($content->private == 1)
            $site_income = get_option('site_income_private');
        else
            $site_income = get_option('site_income');

        $meta = arrayToList($content->metas,'option','value');

        if($mode == 'download')
            $Amount = $meta['price'];
        elseif ($mode == 'post')
            $Amount = $meta['post_price'];

        $Description = trans('admin.item_purchased').$content->title.trans('admin.by').$user['name']; // Required
        $Amount_pay = pricePay($content->id,$content->category_id,$Amount)['price'];

        $Transaction = Transaction::create([
            'buyer_id' => $user['id'],
            'user_id' => $content->user_id,
            'content_id' => $content->id,
            'price' => $Amount_pay,
            'price_content' => $Amount,
            'mode' => 'pending',
            'create_at' => time(),
            'bank' => 'paystack',
            'authority' => 0,
            'income' => $Amount_pay - (($site_income / 100) * $Amount_pay),
            'type' => $mode
        ]);
        $payStack    = new \Unicodeveloper\Paystack\Paystack();
        $payStack->getAuthorizationResponse([
            "amount"        => $Amount_pay,
            "reference"     => Paystack::genTranxRef(),
            "email"         => $user['email'],
            "callback_url"  => url('/').'/bank/paystack/status/'.$content->id,
            'metadata'      => json_encode(['transaction'=>$Transaction->id])
        ]);
        return redirect($payStack->url);
    }
    public function paystackStatus($product_id, Request $request){
        $payment = Paystack::getPaymentData();
        if(isset($payment['status']) && $payment['status'] == true){
            $Transaction = Transaction::find($payment['data']['metadata']['transaction']);
            $product = Content::find($Transaction->content_id);
            $userUpdate = User::with('category')->find($Transaction->user_id);
            if($product->private == 1)
                $site_income = get_option('site_income_private')-$userUpdate->category->off;
            else
                $site_income = get_option('site_income')-$userUpdate->category->off;

            if(empty($transaction))
                \redirect('/product/'.$Transaction->content_id);

            $Amount = $Transaction->price;

            Sell::insert([
                'user_id'       => $Transaction->user_id,
                'buyer_id'      => $Transaction->buyer_id,
                'content_id'    => $Transaction->content_id,
                'type'          => $Transaction->type,
                'create_at'     => time(),
                'mode'          => 'pay',
                'transaction_id'=> $Transaction->id,
                'remain_time'   => $Transaction->remain_time
            ]);

            $userUpdate->update(['income'=>$userUpdate->income+((100-$site_income)/100)*$Amount]);
            Transaction::find($Transaction->id)->update(['mode'=>'deliver','income'=>((100-$site_income)/100)*$Amount]);

            ## Notification Center
            sendNotification(0,['[c.title]'=>$product->title],get_option('notification_template_buy_new'),'user',$Transaction->buyer_id);

            return redirect('/product/'.$Transaction->content_id);
        }else{
            return \redirect('/product/'.$product_id)->with('msg',trans('admin.payment_failed'));
        }
    }

    ## Credit Section
    public function creditPay($id,$mode = 'download'){
        global $user;
        if(!$user)
            return Redirect::to('/user?redirect=/product/'.$id);

        $content = Content::with('metas')->where('mode','publish')->find($id);
        if(!$content)
            abort(404);

        $seller = User::with('category')->find($content->user_id);

        if($content->private == 1)
            $site_income = get_option('site_income_private');
        else
            $site_income = get_option('site_income');

        $meta = arrayToList($content->metas,'option','value');
        if($mode == 'download')
            $Amount = $meta['price'];
        elseif ($mode == 'post')
            $Amount = $meta['post_price'];

        $Amount_pay = pricePay($content->id,$content->category_id,$Amount)['price'];
        if($user['credit']-$Amount_pay<0) {
            return redirect('/product/' . $id)->with('msg', trans('admin.no_charge_error'));
        }else{
            $transaction = Transaction::create([
                'buyer_id'=>$user['id'],
                'user_id'=>$content->user_id,
                'content_id'=>$content->id,
                'price'=>$Amount_pay,
                'price_content'=>$Amount,
                'mode'=>'deliver',
                'create_at'=>time(),
                'bank'=>'credit',
                'authority'=>'000',
                'income'=>$Amount_pay - (($site_income/100)*$Amount_pay),
                'type'=>$mode
            ]);
            Sell::insert([
                'user_id'=>$content->user_id,
                'buyer_id'=>$user['id'],
                'content_id'=>$content->id,
                'type'=>$mode,
                'create_at'=>time(),
                'mode'=>'pay',
                'transaction_id'=>$transaction->id
            ]);

            $seller->update(['income'=>$seller->income+((100-$site_income)/100)*$Amount_pay]);
            $buyer = User::find($user['id']);
            $buyer->update(['credit'=>$user['credit']-$Amount_pay]);

            Balance::create([
                'title'=>trans('admin.item_purchased').$content->title,
                'description'=>trans('admin.item_purchased_desc'),
                'type'=>'minus',
                'price'=>$Amount_pay,
                'mode'=>'auto',
                'user_id'=>$buyer->id,
                'exporter_id'=>0,
                'create_at'=>time()
            ]);
            Balance::create([
                'title'=>trans('admin.item_sold').$content->title,
                'description'=>trans('admin.item_sold_desc'),
                'type'=>'add',
                'price'=>((100-$site_income)/100)*$Amount_pay,
                'mode'=>'auto',
                'user_id'=>$seller->id,
                'exporter_id'=>0,
                'create_at'=>time()
            ]);
            Balance::create([
                'title'=>trans('admin.item_profit').$content->title,
                'description'=>trans('admin.item_profit_desc').$buyer->username,
                'type'=>'add',
                'price'=>($site_income/100)*$Amount_pay,
                'mode'=>'auto',
                'user_id'=>0,
                'exporter_id'=>0,
                'create_at'=>time()
            ]);

            ## Notification Center
            $product = Content::find($transaction->content_id);
            sendNotification(0,['[c.title]'=>$product->title],get_option('notification_template_buy_new'),'user',$buyer->id);
            return redirect()->back()->with('msg',trans('admin.item_purchased_success'));
        }
        return back();
    }

    #2c2p paynow

    public $get2c2p_course_id;
    function paynow(Request $request,$id,$type='download')
    {
        $this->get2c2p_course_id = $id;
        $content = Content::with('metas')->where('mode','publish')->find($id);
        $meta = arrayToList($content->metas,'option','value');
        
        if($type == 'download')
            $Amounts = $meta['price'];
        elseif ($type == 'post')
            $Amounts = $meta['post_price']; 
          // dd($meta['price']);

        $merchant_id = "JT01";			//Get MerchantID when opening account with 2C2P
        $secret_key = "7jYcp4FxFdf0";	//Get SecretKey from 2C2P PGW Dashboard
        
        //Transaction information
        $payment_description  = $content->title;//'2 days 1 night hotel room';
        $order_id  = time();
        $currency = "702";
        $amount  =  str_pad($Amounts, 12, '0', STR_PAD_LEFT);//'000000002500';
        
        //Request information
        $version = "8.5";	
        $payment_url = "https://demo2.2c2p.com/2C2PFrontEnd/RedirectV3/payment";
        $result_url_1 = "http://192.168.110.16:8080/get2c2presult";
        
        //Construct signature string
        $params = $version.$merchant_id.$payment_description.$order_id.$currency.$amount.$result_url_1;
        $hash_value = hash_hmac('sha256',$params, $secret_key,false);	//Compute hash value
        $arr = array(
            'version'=>$version,
            'merchant_id'=>$merchant_id,
            'currency'=>$currency,
            'result_url_1'=>$result_url_1,
            'hash_value'=>$hash_value,
            'payment_description'=>$payment_description,
            'order_id'=>$order_id,
            'amount'=>$amount,
            //'user_defined_1' => $amount,
        );
        $fields_string = '';
        //url-ify the data for the POST
        foreach($arr as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
        rtrim($fields_string, '&');
        /* $al = $this->redirect_post($payment_url,$arr);
        dd($al); */


        global $user;

        $Amount_pay = pricePay($content->id,$content->category_id,$Amounts)['price'];
        if($content->private == 1)
            $site_income = get_option('site_income_private');
        else
            $site_income = get_option('site_income');
       $Transaction = Transaction::create([
            'buyer_id'      => $user['id'],
            'user_id'       => $content->user_id,
            'content_id'    => $content->id,
            'price'         => $Amount_pay,
            'price_content' => $Amounts,
            'mode'          => 'pending',
            'create_at'     => time(),
            'bank'          => 'paytm',
            'authority'     => 0,
            'income'        => $Amount_pay - (($site_income/100)*$Amount_pay),
            'type'          => '',//$mode
        ]);



        $ch = curl_init();

        //curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
 
        $fields_string = '';
        //url-ify the data for the POST
        foreach($arr as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
        rtrim($fields_string, '&');


        //set the url, number of POST vars, POST data
        curl_setopt($ch,CURLOPT_URL, $payment_url);
        curl_setopt($ch,CURLOPT_POST, count($arr));
        curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
        //execute post
        $redirectURL = curl_getinfo($ch,CURLINFO_EFFECTIVE_URL );
        curl_exec($ch);
        curl_close($ch);

     //   return Redirect::to($redirectURL);

    /*     header("Location: ".$redirectURL); 
        exit(); */
        
       // dd($redirectURL);
    }

    function testpaynow2(Request $request,$id,$type)
    {
        //Merchant's account information
       /*  $merchant_id = "JT01";			//Get MerchantID when opening account with 2C2P
        $secret_key = "7jYcp4FxFdf0";	//Get SecretKey from 2C2P PGW Dashboard
        
        //Transaction information
        $payment_description  = '2 days 1 night hotel room';
        $order_id  = time();
        $currency = "702";
        $amount  = '000000002500';
        
        //Request information
        $version = "8.5";	
        $payment_url = "https://demo2.2c2p.com/2C2PFrontEnd/RedirectV3/payment";
        $result_url_1 = "http://localhost/devPortal/V3_UI_PHP_JT01_devPortal/result.php";
        
        //Construct signature string
        $params = $version.$merchant_id.$payment_description.$order_id.$currency.$amount.$result_url_1;
        $hash_value = hash_hmac('sha256',$params, $secret_key,false);	//Compute hash value
      
        echo "hash_value: ".$hash_value."<br/><br/>";
     */
    
        /**form payment */
        $merchantID = "JT01";		//Get MerchantID when opening account with 2C2P
            $secretKey = "7jYcp4FxFdf0";	//Get SecretKey from 2C2P PGW Dashboard

            //Transaction Information
            $desc = "2 days 1 night hotel room";
            $uniqueTransactionCode = time();
            $currencyCode = "702";
            $amt  = "000000000080";
            $panCountry = "SG";

            //Customer Information
            $cardholderName = "John Doe";
        
            //Encrypted card data
           $encCardData = "00acTPCs4oy2P52nolDsjc9FabG5/p6OqMzISvh8glP+qb5YgD7z7wCayBp9QW66CtAFENvqW/zZTgDBSKM8qz0W6sFx4TO6Uww58ar//VvDc5+OUz+JIAlQCPhewZN8IznxlyaBFvFLpvi+VugaUWo/Eow6kYalVuIj0MYg8OAccgU=U2FsdGVkX18jR/eUn9PmDT3MSuD3cmgWSovAztlaIPaE52l+fl3SJkU2+UhgJxZL";
           // $_POST['encryptedCardInfo'];

            //Retrieve card information for merchant use if needed
            $maskedCardNo = 5437613519;//$_POST['maskedCardInfo'];
            $expMonth =12;// $_POST['expMonthCardInfo'];
            $expYear = 2022;//$_POST['expYearCardInfo'];

            //Request Information 
            $version = "9.9";    
            
            //Construct payment request message
            $xml = "
            <PaymentRequest>
                <merchantID>$merchantID</merchantID>
                <uniqueTransactionCode>$uniqueTransactionCode</uniqueTransactionCode>
                <desc>$desc</desc>
                <amt>$amt</amt>
                <currencyCode>$currencyCode</currencyCode>  
                <panCountry>$panCountry</panCountry> 
                <cardholderName>$cardholderName</cardholderName>
                <encCardData>$encCardData</encCardData>
                </PaymentRequest>"; 
            $paymentPayload = base64_encode($xml); //Convert payload to base64
            $signature = strtoupper(hash_hmac('sha256', $paymentPayload, $secretKey, false));
            $payloadXML = "<PaymentRequest>
                <version>$version</version>
                <payload>$paymentPayload</payload>
                <signature>$signature</signature>
                </PaymentRequest>"; 
            $payload = base64_encode($payloadXML); //encode with base64

            //dd($xml);

            /** submit payment */
            $arr = array('paymentRequest'=>$payload);

            $ap = $this->redirect_post('https://demo2.2c2p.com/2C2PFrontEnd/SecurePayment/PaymentAuth.aspx',$arr);
            //$encoded_payment_response = urldecode($_REQUEST["PaymentResponse"]);
            if($ap){
               // echo 1234;
            }
            //dd($ap);
            
            /** read response */
            $response = "<PaymentResponse><version>9.9</version><payload>PFBheW1lbnRSZXNwb25zZT48dGltZVN0YW1wPjA3MDcyMDE5NDUyNzwvdGltZVN0YW1wPjxtZXJjaGFudElEPkpUMDE8L21lcmNoYW50SUQ+PHJlc3BDb2RlPjk5PC9yZXNwQ29kZT48cGFuPjwvcGFuPjxhbXQ+MDAwMDAwMDAwMDgwPC9hbXQ+PHVuaXF1ZVRyYW5zYWN0aW9uQ29kZT4xNTk0MTc5ODUzPC91bmlxdWVUcmFuc2FjdGlvbkNvZGU+PHRyYW5SZWY+PC90cmFuUmVmPjxhcHByb3ZhbENvZGU+PC9hcHByb3ZhbENvZGU+PHJlZk51bWJlcj48L3JlZk51bWJlcj48ZWNpPjwvZWNpPjxkYXRlVGltZT4wNzA3MjAyMDQ1Mjc8L2RhdGVUaW1lPjxzdGF0dXM+Rjwvc3RhdHVzPjxmYWlsUmVhc29uPlRoZSBsZW5ndGggb2YgJ3BhbicgZmllbGQgZG9lcyBub3QgbWF0Y2guPC9mYWlsUmVhc29uPjx1c2VyRGVmaW5lZDE+PC91c2VyRGVmaW5lZDE+PHVzZXJEZWZpbmVkMj48L3VzZXJEZWZpbmVkMj48dXNlckRlZmluZWQzPjwvdXNlckRlZmluZWQzPjx1c2VyRGVmaW5lZDQ+PC91c2VyRGVmaW5lZDQ+PHVzZXJEZWZpbmVkNT48L3VzZXJEZWZpbmVkNT48aXBwUGVyaW9kPjwvaXBwUGVyaW9kPjxpcHBJbnRlcmVzdFR5cGU+PC9pcHBJbnRlcmVzdFR5cGU+PGlwcEludGVyZXN0UmF0ZT48L2lwcEludGVyZXN0UmF0ZT48aXBwTWVyY2hhbnRBYnNvcmJSYXRlPjwvaXBwTWVyY2hhbnRBYnNvcmJSYXRlPjxwYWlkQ2hhbm5lbD48L3BhaWRDaGFubmVsPjxwYWlkQWdlbnQ+PC9wYWlkQWdlbnQ+PHBheW1lbnRDaGFubmVsPjwvcGF5bWVudENoYW5uZWw+PGJhY2tlbmRJbnZvaWNlPjwvYmFja2VuZEludm9pY2U+PGlzc3VlckNvdW50cnk+PC9pc3N1ZXJDb3VudHJ5Pjxpc3N1ZXJDb3VudHJ5QTM+PC9pc3N1ZXJDb3VudHJ5QTM+PGJhbmtOYW1lPjwvYmFua05hbWU+PGNhcmRUeXBlPjwvY2FyZFR5cGU+PHByb2Nlc3NCeT48L3Byb2Nlc3NCeT48cGF5bWVudFNjaGVtZT48L3BheW1lbnRTY2hlbWU+PHJhdGVRdW90ZUlEPjwvcmF0ZVF1b3RlSUQ+PG9yaWdpbmFsQW1vdW50Pjwvb3JpZ2luYWxBbW91bnQ+PGZ4UmF0ZT48L2Z4UmF0ZT48Y3VycmVuY3lDb2RlPjwvY3VycmVuY3lDb2RlPjwvUGF5bWVudFJlc3BvbnNlPg==</payload><signature>8AB6298952A19D55134136C6FA5CCC46345384F668B85532936270DF1930A6DB</signature></PaymentResponse>";
            //$_REQUEST["paymentResponse"]; 
	
            //dd($response);
            //Decode response with base64
            $reponsePayLoadXML = base64_decode($response);
            //Parse ResponseXML            

            $json = json_encode($response);
            $array = json_decode($json,TRUE);
            $xmlObject =simplexml_load_string($array);// or die("Error: Cannot create object");

            
            //dd($xmlObject);
            //resource_path simplexml_load_string
            //Decode payload with base64 to get the Reponse
            $payloadxml = base64_decode($xmlObject->payload);
            
            //Get the signature from the ResponseXML
            $signaturexml = $xmlObject->signature;
            
            $secretKey = "7jYcp4FxFdf0";	//Get SecretKey from 2C2P PGW Dashboard

            //Encode the payload
            $base64EncodedPayloadResponse=base64_encode($payloadxml);
            //Generate signature based on "payload"
            $signatureHash = strtoupper(hash_hmac('sha256', $base64EncodedPayloadResponse ,$secretKey, false));
            
            //Compare the response signature with payload signature with secretKey
            if($signaturexml == $signatureHash){
                echo "Response :<br/><textarea style='width:100%;height:80px'>". $payloadxml."</textarea>"; 
            }
            else{
                //If Signature does not match
                echo "Error :<br/><textarea style='width:100%;height:20px'>". "Wrong Signature"."</textarea>"; 
                echo "<br/>";
            }
    }

    

/**
 * Redirect with POST data.
 *
 * @param string $url URL.
 * @param array $post_data POST data. Example: array('foo' => 'var', 'id' => 123)
 * @param array $headers Optional. Extra headers to send.
 */
public function redirect_post($url, array $data, array $headers = null) {
    $params = array(
        'http' => array(
            'method' => 'POST',
            'content' => http_build_query($data)
        )
    );
    if (!is_null($headers)) {
        $params['http']['header'] = '';
        foreach ($headers as $k => $v) {
            $params['http']['header'] .= "$k: $v\n";
        }
    }
    $ctx = stream_context_create($params);
    $fp = @fopen($url, 'rb', false, $ctx);
    if ($fp) {
        echo @stream_get_contents($fp);
        die();
    } else {
        // Error
        throw new Exception("Error loading '$url', $php_errormsg");
    }
}



    function get2c2presult(Request $request)
    {
       dd($request);exit;


        //if(isset($payment['status']) && $payment['status'] == true){
          //  dd($this->get2c2p_course_id);
            $Transaction = Transaction::find($this->get2c2p_course_id);
            $product = Content::find($Transaction->content_id);
            $userUpdate = User::with('category')->find($Transaction->user_id);
            if($product->private == 1)
                $site_income = get_option('site_income_private')-$userUpdate->category->off;
            else
                $site_income = get_option('site_income')-$userUpdate->category->off;

            if(empty($transaction))
                \redirect('/product/'.$Transaction->content_id);

            $Amount = $Transaction->price;

            Sell::insert([
                'user_id'       => $Transaction->user_id,
                'buyer_id'      => $Transaction->buyer_id,
                'content_id'    => $Transaction->content_id,
                'type'          => $Transaction->type,
                'create_at'     => time(),
                'mode'          => 'pay',
                'transaction_id'=> $Transaction->id,
                'remain_time'   => $Transaction->remain_time
            ]);

            $userUpdate->update(['income'=>$userUpdate->income+((100-$site_income)/100)*$Amount]);
            Transaction::find($Transaction->id)->update(['mode'=>'deliver','income'=>((100-$site_income)/100)*$Amount]);

            ## Notification Center
            sendNotification(0,['[c.title]'=>$product->title],get_option('notification_template_buy_new'),'user',$Transaction->buyer_id);

            return redirect('/product/'.$Transaction->content_id);
        /* }else{
            return \redirect('/product/'.$product_id)->with('msg',trans('admin.payment_failed'));
        } */
    
    }

}
