<?php

namespace App\Http\Controllers\Admin_user;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use DB;
use Session;

use App\Models\Article;

class ArticleController extends Controller
{

    public function save(Request $request){
        if($request->mode=="Save"){
            Article::create([
                'user_id'=> Session::get('user_id'),
                'title'=>$request->title,
                'pre_text'=>$request->article,//article summary
                'text'=>$request->description,//description
                'cat_id'=>$request->cat,
                'image'=>$request->image,//thumbnail
                'mode'=>$request->mode,//status
            ]);
        }else if($request->mode=="Update"){
            Article::where(['id'=>$request->id])->update([
                'title'=>$request->title,
                'pre_text'=>$request->article,//article summary
                'text'=>$request->description,//description
                'cat_id'=>$request->cat,
                'image'=>$request->image,//thumbnail
                'mode'=>$request->mode,//status
                ]
            );
        }     
        echo true;
    }

    function getAllArticlesById(){
        $ch = Article::where('user_id',Session::get('user_id'))->get();
      
        $data = array();
        foreach ($ch as $myList)
		{
			$row = array();
            $row['title'] = $myList->title;
            $getCategory = Content::where('id',$myList->category_id)->first();
            $row['category'] = $getCategory->title;
			//$row['cat_id'] = $myList->cat_id;
			$row['mode'] = $myList->mode;
			$row['article'] = $myList->view;
			$row['pre_text'] = $myList->pre_text;
			$row['text'] = $myList->text;
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

    public function list()
    {    
        return view('admin_user.article.list');
    }

    public function updatepage()
    {    
        return view('admin_user.article.update');
    }

    public function destroy($id){        
        Article::where('id',$id)->delete();
        echo true;
    }

    public function show($id)
    {
        $getData = Article::where(['id'=>$id])->first();
        return $getData;
    }
    
}
