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
use App\Models\ContentMeta;
use App\Models\User;
use App\Models\Content;
use App\Models\Transaction;
use App\Models\QuestionsLesson;
use App\Models\CourseLog;
use App\Models\ContentPart;
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

        $category = contentMenu();

        return view('admin_user.article', compact('category'));
    }

    public function courses()
    {    
        return view('admin_user.courses');
    }

    public function store(Request $request) {
        global $user;
        $request->request->add(['user_id'=>$user['id'],'create_at'=>time()]);
        $article = Article::create($request->toArray());
        if (!$article)
            return abort(404);
        return response()->json("success");
    }

    public function editStore(Request $request,$id){
        global $user;
        $article = Article::where('user_id',$user['id'])->find($id);
        if(!$article)
            return abort(404);
        $article->update($request->toArray());
        return response()->json("success");
    }

    public function delete($id){
        global $user;
        $article = Article::where('user_id',$user['id'])->find($id);
        $article->update(['mode'=>'delete']);
        if (!$article)
            return abort(404);
        return response()->json("success");
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
           $getTransaction = Transaction::where(['content_id'=> $getContent->id , 'buyer_id'=> $key->buyer_id])->first();
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

    // public function list(Request $request) {
    //     global $user;

    //     $filter = $request->input('filter');
    //     $sortRules = $request->input('sort');
    //     $limit = $request->input('per_page');
    //     list($field, $dir) = explode('|', $sortRules);

    //      return Article::leftJoin('tbl_contents_category', function($join) {
    //          $join->on('tbl_article.cat_id', '=', 'tbl_contents_category.id');
    //      })
    //         ->select('tbl_article.id', 'tbl_article.title', 'tbl_article.mode AS status', 'tbl_contents_category.title AS category')
    //         ->where('tbl_article.title','LIKE','%'.$filter.'%')
    //         ->where('tbl_article.user_id',$user['id'])
    //         ->orderBy($field, $dir)
    //         ->paginate($limit);
    // }

       public function list(Request $request) {
        global $user;

        $lists = Article::leftJoin('tbl_contents_category', function($join) {
            $join->on('tbl_article.cat_id', '=', 'tbl_contents_category.id');
        })
           ->select('tbl_article.id', 'tbl_article.title', 'tbl_article.pre_text', 'tbl_article.text', 'tbl_article.mode AS status', 'tbl_article.create_at AS date', 'tbl_contents_category.title AS category', 'tbl_contents_category.id AS cat_id')
           ->where('tbl_article.user_id',$user['id'])
           ->get();

         return response()->json(["data" => $lists]);
    }

    public function getCourses()
    {
        $datas = Sell::where('buyer_id',Session::get('user_id'))->get();
        $getFavdatas = Favorite::where('user_id',Session::get('user_id'))->get();
        $cdata = array();

        
        $cbid = 1;
        $getcnt = 0;
        $cnt_lwqa = 0;
        foreach ($datas as $key) {
           $arr= array();
           //$meta = ContentMeta::where('content_id',$key->content_id)->first()->get();
           $getContent = Content::where('id',$key->content_id)->first();
           $getUser = User::where('id',$key->user_id)->first();
           $getTransaction = Transaction::where(['content_id'=>$getContent->id,'buyer_id'=>$key->buyer_id])->first();
           $arr['content_title'] = '<a href="/product/'.$key->content_id.'" target="_blank">'.$getContent->title.'</a>';
           $arr['vendor'] = $getUser->name;
           $arr['date'] = date("F d, Y H:i:s", $key->create_at);
           $arr['price'] = ($getTransaction?$getTransaction->price:'');

           $arr['content_id'] = $key->content_id;

           //$arr['data'] = $meta;
           $btn = '';
           //$btn .= '<a href="/admin/user_student/student_lesson_list/'.$key->content_id.'" type="button" class="btn btn-warning">View Lesson</a>';
           $btn .= ' <a href="/admin/user_student/student_show_course/'.$key->content_id.'" type="button" class="btn btn-success">View Course</a>';
           $arr['action'] = $btn;
           /*** */
            $content = ContentPart::where(['content_id'=>$key->content_id])->get();
            //$data = array();
            $cnt=0;
            foreach ($content as $myList)
            {
                $mrow = array();
                $lesson = QuestionsLesson::where(['lesson_id'=>$myList->id])->get();
                foreach ($lesson as $val)
                {
                    $lesson_with_questions_answers = CourseLog::where(['lesson_id'=>$val['lesson_id'],'status' => 'Done'])->get(); 
                    //$val['lesson_id'];
                   $cnt_lwqa =  count($lesson_with_questions_answers);
                    $cnt++;
                }            
            }
            $arr['count'] = $cnt;
            $arr['id'] =$key->content_id;
            $arr['lwqa'] = $cnt_lwqa;
            if($cnt_lwqa!=0&&$cnt!=0){
                $p = (floatval($cnt_lwqa) / floatval($cnt)) * 100;
                $prog = floor($p * 100)/100;
                $arr['progress'] = $prog.'%';
            }else{
                
            $arr['progress'] = '0%';
            }
           /*** */
           $cdata[] = $arr;
        }
        $output = array("data" => $cdata);
		echo json_encode($output);        
    }

    public function viewCourses()
    {    
        // return view('student.courses.course');
        return view('student.courses.course-vue');
    }

    public function viewLesson()
    {    
        return view('student.courses.lesson');
    }
}