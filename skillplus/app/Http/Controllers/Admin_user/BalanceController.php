<?php

namespace App\Http\Controllers\Admin_user;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Auth;
use DB;
use Session;


use App\Models\Balance;
//use Illuminate\Support\Facades\Input;
//use Illuminate\Support\Facades\Redirect;
//use Illuminate\Validation\Rules\In;
//use PayPal\Auth\OAuthTokenCredential;
//use PayPal\Rest\ApiContext;
//use SoapClient;

class BalanceController extends Controller
{

    public function getAllMyBalance()
    {
        $datas = Balance::where('user_id',Session::get('user_id'))->get();
        $data = array();
        foreach ($datas as $key) {
           $arr= array();
           $arr['title'] = $key->title;
           $arr['description'] = $key->description;
           $arr['type'] = $key->type;
           $arr['amount'] = $key->price;
           $data[] = $arr;
        }
        $output = array("data" => $data,);
		echo json_encode($output);
        
    }

    public function mybalance()
    {    
        return view('admin_user.balance.mybalance');
    }
    
}
