<?php

namespace App\Http\Controllers\Admin_user;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Auth;
use DB;
use Session;

use App\Models\Favorite;
use App\Models\Sell;
//use Illuminate\Support\Facades\Input;
//use Illuminate\Support\Facades\Redirect;
//use Illuminate\Validation\Rules\In;
//use PayPal\Auth\OAuthTokenCredential;
//use PayPal\Rest\ApiContext;
//use SoapClient;

class UserController extends Controller
{

    public function index()
    {
        //
    }


    public function dashboard()
    {    
        return view('admin_user.user');
    }

    public function getContentById()
    {
        $datas = Sell::where('buyer_id',Session::get('user_id'))->get();
        $getFavdatas = Favorite::where('user_id',Session::get('user_id'))->get();
        $cdata = array();
        foreach ($datas as $key) {
           $arr= array();
           $getContent = Content::where('id',$key->content_id)->first();
           $arr['content_title'] = $getContent->title;
           $cdata[] = $arr;
        }
        $fdata = array();
        foreach ($getFavdatas as $key) {
           $arr= array();
           $getContent = Content::where('id',$key->content_id)->first();
           $arr['content_title'] = $getContent->title;
           $fdata[] = $arr;
        }

        $output = array("courses" => $cdata,"favorite" => $fdata,);
		echo json_encode($output);
        
    }
}
