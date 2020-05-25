<?php

namespace App\Http\Controllers\Admin_user;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Auth;
use DB;
use Session;

use App\Models\Content;
use App\Models\Requests;
use App\Models\ContentCategory;

class RequestController extends Controller
{

    public function index()
    {
        //
    }


    public function request()
    {    
        return view('admin_user.request.request');
    }

    public function store(Request $request){
        Requests::create([
            'user_id'=>0,
            'requester_id'=> Session::get('user_id'),
            'title'=>$request->title,
            'description'=>$request->description,
            'category_id'=>$request->category_id,
            'mode'=>'draft',
            'create_at'=>time()
        ]);
        echo true;
    }

    public function update(Request $request){
        Requests::where(['id'=>$request->id])->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'category_id'=>$request->category_id,
            ]
        );  
        echo true;
    }

    function getAllCategory(){
        $cat = ContentCategory::all();
        $data = array();
        foreach ($cat as $myList)
		{
			$row = array();
			$row['cat'] = $myList->title;
			$row['id'] = $myList->id;
			$data[] = $row;
		}
        $output = array("data" => $data);
		echo json_encode($output);
    }

    public function getMyRequest()
    {
        $datas = Requests::where('requester_id',Session::get('user_id'))->get();
        $data = array();
        foreach ($datas as $key) {
           $arr= array();
           $arr['title'] = $key->title;
           $arr['description'] = $key->description;
           $getCategory = Content::where('id',$key->category_id)->first();
           $arr['category'] = $getCategory->title;
           $arr['mode'] = $key->mode;

           $btn = ''; 
           $btn = $btn.'<a href="/admin/user_request/editRequest/'.$key->id.'" class="btn  btn-primary btn-xs" title="Edit"><i class="far fa-save"></i></a>  ';
           $btn = $btn.'<button type="button" class="btn  btn-danger btn-xs" title="Edit" onclick="delete_request('."'".$key->id."'".')"><i class="fas fa-trash"></i></button>  ';
           $arr['action'] = $btn;
           $data[] = $arr;
        }

        $output = array("data" => $data,);
		echo json_encode($output);
        
    }

    public function myrequest()
    {    
        return view('admin_user.request.myrequest');
    }

    public function editrequest($id)
    {    
        return view('admin_user.request.request');
    }

    public function show($id)
    {
        $getData = Requests::where(['id'=>$id])->first();
        return $getData;
    }

    public function destroy($id){        
        Requests::where('id',$id)->delete();
        echo true;
    }

    
}
