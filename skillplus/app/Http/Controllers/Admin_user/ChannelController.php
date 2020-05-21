<?php

namespace App\Http\Controllers\Admin_user;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use DB;
use Session;


use App\Models\Channel;

class ChannelController extends Controller
{

    public function save(Request $request){
        if($request->mode=="Save"){
            Channel::create([
                'user_id'=> Session::get('user_id'),
                'title'=>$request->title,
                'description'=>$request->description,
                'username'=>$request->username,//link
            ]);
        }else if($request->mode=="Update"){
            Channel::where(['id'=>$request->id])->update([
                'title'=>$request->title,
                'description'=>$request->description,
                'username'=>$request->username,//link
                ]
            );
        }    
        
        /* foreach ($request->test as  $value) {
            echo $value.'<br>';
        }
        exit; */
        echo true;
    }

    function getAllChannelsById(){
        $ch = Channel::where('user_id',Session::get('user_id'))->get();
      
        $data = array();
        foreach ($ch as $myList)
		{
			$row = array();
			$row['title'] = $myList->title;
			$row['description'] = $myList->description;
			$row['mode'] = $myList->mode;
			$row['view'] = $myList->view;
			$row['username'] = $myList->username;
            $row['id'] = $myList->id;
            $btn = ''; 
            $btn = $btn.'<a href="/admin/user_channel/mychannel/'.$myList->id.'" class="btn  btn-primary btn-xs" title="Edit"><i class="far fa-save"></i></a>  ';
            $btn = $btn.'<button type="button" class="btn  btn-danger btn-xs" title="Edit" onclick="delete_request('."'".$myList->id."'".')"><i class="fas fa-trash"></i></button>  ';
            $row['action'] = $btn;
			$data[] = $row;
		}
        $output = array("data" => $data,"uid"=>$ch);
		echo json_encode($output);
    }

    public function channel()
    {    
        return view('admin_user.channel.channel');
    }

    public function mychannel()
    {    
        return view('admin_user.channel.mychannel');
    }

    public function destroy($id){        
        Channel::where('id',$id)->delete();
        echo true;
    }

    public function show($id)
    {
        $getData = Channel::where(['id'=>$id])->first();
        return $getData;
    }
    
}
