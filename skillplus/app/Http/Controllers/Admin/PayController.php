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
    function paynow(Request $request,$id,$type)
    {
        //Merchant's account information
        $merchant_id = "JT01";			//Get MerchantID when opening account with 2C2P
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

        
        /* get response */

        //each response params:
        #$version = $_REQUEST["version"];
        $date = date_create();
        $request_timestamp = date_timestamp_get($date);// $_REQUEST["request_timestamp"];
        #$merchant_id = $_REQUEST["merchant_id"];
        #$currency = $_REQUEST["currency"];
        #$order_id = $_REQUEST["order_id"];
        #$amount = $_REQUEST["amount"];
        $invoice_no = '';//$_REQUEST["invoice_no"];
        $transaction_ref = 'O';//$_REQUEST["transaction_ref"];
        $approval_code = '';// $_REQUEST["approval_code"];
        $eci = '';//$_REQUEST["eci"];
        $transaction_datetime = date("Y-m-d");//$_REQUEST["transaction_datetime"];
        $payment_channel = '';//$_REQUEST["payment_channel"];
        $payment_status = '';//$_REQUEST["payment_status"];
        $channel_response_code = '';//$_REQUEST["channel_response_code"];
        $channel_response_desc = '';//$_REQUEST["channel_response_desc"];
        $masked_pan = '';//$_REQUEST["masked_pan"];
        $stored_card_unique_id ='';// $_REQUEST["stored_card_unique_id"];
        $backend_invoice ='';//$_REQUEST["backend_invoice"];
        $paid_channel = '';//$_REQUEST["paid_channel"];
        $recurring_unique_id = '';//$_REQUEST["recurring_unique_id"];
        $paid_agent = '';//$_REQUEST["paid_agent"];
        $payment_scheme = '';//$_REQUEST["payment_scheme"];
        $user_defined_1 ='';// $_REQUEST["user_defined_1"];
        $user_defined_2 ='';// $_REQUEST["user_defined_2"];
        $user_defined_3 ='';// $_REQUEST["user_defined_3"];
        $user_defined_4 ='';//'';// $_REQUEST["user_defined_4"];
        $user_defined_5 = '';//$_REQUEST["user_defined_5"];
        $browser_info = '';//$_REQUEST["browser_info"];
        $ippPeriod ='';// $_REQUEST["ippPeriod"];
        $ippInterestType ='';//$_REQUEST["ippInterestType"];
        $ippInterestRate = '';//$_REQUEST["ippInterestRate"];
        $ippMerchantAbsorbRate = '';//$_REQUEST["ippMerchantAbsorbRate"];
        $payment_scheme ='';// $_REQUEST["payment_scheme"];
        $process_by ='';// $_REQUEST["process_by"];
        $sub_merchant_list = '';//$_REQUEST["sub_merchant_list"];
       // $hash_value ='';// $_REQUEST["hash_value"];   
        
        //check response hash value (for security, hash value validation is Mandatory)
        $checkHashStr = $version . $request_timestamp . $merchant_id . $order_id . 
        $invoice_no . $currency . $amount . $transaction_ref . $approval_code . 
        $eci . $transaction_datetime . $payment_channel . $payment_status . 
        $channel_response_code . $channel_response_desc . $masked_pan . 
        $stored_card_unique_id . $backend_invoice . $paid_channel . $paid_agent . 
        $recurring_unique_id . $user_defined_1 . $user_defined_2 . $user_defined_3 . 
        $user_defined_4 . $user_defined_5 . $browser_info . $ippPeriod . 
        $ippInterestType . $ippInterestRate . $ippMerchantAbsorbRate . $payment_scheme .
        $process_by . $sub_merchant_list;

        $SECRETKEY = "7jYcp4FxFdf0";
        $checkHash = hash_hmac('sha256',$checkHashStr, $SECRETKEY,false); 
        echo "hash_value: ".$hash_value."<br/><br/>";
        echo "checkHash: ".$checkHash."<br/><br/>";

        if(strcmp(strtolower('a87183f5f9663f37ddb7e4d321c2471d70aaecf6058945319c2400b752e5973b'), strtolower($checkHash))==0){
            echo "Hash check = success. it is safe to use this response data.";
        }
        else{
            echo "Hash check = failed. do not use this response data.";
        }
<<<<<<< HEAD

        /**/
=======
>>>>>>> parent of b170ffd... 2c2cp success partial
    
       // dd($checkHashStr);
    }


}
