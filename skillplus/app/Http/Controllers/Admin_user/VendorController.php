<?php

namespace App\Http\Controllers\Admin_user;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Auth;
use DB;
use Session;

use App\Models\TicketsCategory;
use App\Models\Tickets;
//use Illuminate\Support\Facades\Input;
//use Illuminate\Support\Facades\Redirect;
//use Illuminate\Validation\Rules\In;
//use PayPal\Auth\OAuthTokenCredential;
//use PayPal\Rest\ApiContext;
//use SoapClient;

class VendorController extends Controller
{

    public function store(Request $request){
        Tickets::create([
            'mode'=>'open',
            'user_id'=> Session::get('user_id'),
            'title'=>$request->title,
            'category_id'=>$request->category_id,
            'mode'=>'draft',
            'create_at'=>time()
        ]);
        echo true;
    }

    function getAllCategory(){
        $cat = TicketsCategory::all();
        $data = array();
        foreach ($cat as $myList)
		{
			$row = array();
			$row['title'] = $myList->title;
			$row['id'] = $myList->id;
			$data[] = $row;
		}
        $output = array("data" => $data);
		echo json_encode($output);
    }

    public function vendor()
    {    
        return view('admin_user.vendor.vendor');
    }
    
}
