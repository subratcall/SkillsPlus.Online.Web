<?php

namespace App\Http\Controllers\Admin_user;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Auth;
use DB;
use Session;

use App\Models\Favorite;
use App\Models\Sell;
use App\Models\Article;
use App\Models\ContentCategory;
use App\Models\User;
use App\Models\Content;
use App\Models\Transaction;
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
    

    public function category(Request $request) {
        $contentMenu = contentMenu();
        return response()->json($contentMenu);
    }

    public function article() {
        return view('admin_user.article');
    }

    public function courses()
    {    
        return view('admin_user.courses');
    }

    public function getContentById()
    {
        $datas = Sell::where('buyer_id',Session::get('user_id'))->get();
        $getFavdatas = Favorite::where('user_id',Session::get('user_id'))->get();
        $cdata = array();
        foreach ($datas as $key) {
           $arr= array();
           $getContent = Content::where('id',$key->content_id)->first();
           $getUser = User::where('id',$key->user_id)->first();
           $getTransaction = Transaction::where(['content_id'=>$getContent->id,'buyer_id'=>$key->buyer_id])->first();
           $arr['content_title'] = $getContent->title;
           $arr['vendor'] = $getUser->name;
           $arr['date'] = date("F d, Y H:i:s", $key->create_at);
           $arr['price'] = ($getTransaction?$getTransaction->price:'');
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

    public function list(Request $request) {
        global $user;

        $filter = $request->input('filter');
        $sortRules = $request->input('sort');
        $limit = $request->input('per_page');
        list($field, $dir) = explode('|', $sortRules);

         return Article::leftJoin('tbl_contents_category', function($join) {
             $join->on('tbl_article.cat_id', '=', 'tbl_contents_category.id');
         })
            ->select('tbl_article.id', 'tbl_article.title', 'tbl_contents_category.title AS category')
            ->where('tbl_article.title','LIKE','%'.$filter.'%')
            ->where('tbl_article.user_id',$user['id'])
            ->orderBy($field, $dir)
            ->paginate($limit);
    }

    public function getCourses()
    {
        $datas = Sell::where('buyer_id',Session::get('user_id'))->get();
        $getFavdatas = Favorite::where('user_id',Session::get('user_id'))->get();
        $cdata = array();
        foreach ($datas as $key) {
           $arr= array();
           $getContent = Content::where('id',$key->content_id)->first();
           $getUser = User::where('id',$key->user_id)->first();
           $getTransaction = Transaction::where(['content_id'=>$getContent->id,'buyer_id'=>$key->buyer_id])->first();
           $arr['content_title'] = '<a href="/product/'.$key->content_id.'" target="_blank">'.$getContent->title.'</a>';
           $arr['vendor'] = $getUser->name;
           $arr['date'] = date("F d, Y H:i:s", $key->create_at);
           $arr['price'] = ($getTransaction?$getTransaction->price:'');
           $cdata[] = $arr;
        }

        $output = array("data" => $cdata,);
		echo json_encode($output);
        
    }
}
