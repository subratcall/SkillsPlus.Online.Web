<?php

namespace App\Http\Controllers;

use App\Models\Balance;
use App\Models\TransactionCharge;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use PayPal\Api\Amount;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;

class PaymentController extends Controller
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
    public function walletStatus(Request $request)
    {
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
        if ($result->getState() == 'approved') {
            $transaction = TransactionCharge::where('mode','pending')->where('authority',$payment_id)->first();
            $Amount = $transaction->price;
            Balance::create([
                'title'=>'افزایش موجودی کیف پول',
                'description'=>'افزایش موجودی کیف پول توسط کاربر درگاه پی پال',
                'type'=>'add',
                'price'=>$Amount,
                'mode'=>'auto',
                'user_id'=>$transaction->user_id,
                'exporter_id'=>0,
                'create_at'=>time()
            ]);
            $userUpdate = User::find($transaction->user_id);
            $userUpdate->update(['credit'=>$userUpdate->credit+$Amount]);

            TransactionCharge::find($transaction->id)->update(['mode'=>'deliver']);
            return redirect('/user/balance/charge')->with('msg','کیف پول شما با موفقیت شارژ شد');
        }
        return redirect('/user/balance/charge')->with('msg','Error');
    }
}
