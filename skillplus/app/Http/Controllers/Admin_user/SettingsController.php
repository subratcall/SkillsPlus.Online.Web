<?php

namespace App\Http\Controllers\Admin_user;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Auth;
use DB;
use Session;

use App\Models\Favorite;
use App\Models\Sell;
use App\Models\Content;
use App\Models\User;
use App\Models\Transaction;
use App\Models\Requests;
use App\Models\ContentCategory;
use App\Models\Balance;
use App\Models\TicketsCategory;
use App\Models\Tickets;
use App\Models\Usermeta;
//use Illuminate\Support\Facades\Input;
//use Illuminate\Support\Facades\Redirect;
//use Illuminate\Validation\Rules\In;
//use PayPal\Auth\OAuthTokenCredential;
//use PayPal\Rest\ApiContext;
//use SoapClient;

class SettingsController extends Controller
{

    public function store(Request $request)
    {        
        $a =  Usermeta::updateOrNew(Session::get('user_id'),$request->all());
        //echo $a;
        $userMetas = Usermeta::where('user_id',Session::get('user_id'))->pluck('value','option')->all();
        return view('admin_user.settings.settings',['user'=>'$user','meta'=>$userMetas]);
    }

    public function settings()
    {            
        $userMetas = Usermeta::where('user_id',Session::get('user_id'))->pluck('value','option')->all();
        return view('admin_user.settings.settings',['user'=>'$user','meta'=>$userMetas]);
        //return view('admin_user.settings.settings');
    }

    public function profile()
    {
        global $user;
        $userMetas = Usermeta::where('user_id',$user['id'])->pluck('value','option')->all();
        return view('user.pages.profile',['user'=>$user,'meta'=>$userMetas]);
    }
    
}
