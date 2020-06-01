<?php

namespace App\Http\Controllers\Admin_user;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use App\Models\Content;
use App\Models\ContentMeta;
use App\Models\Questions;
use App\Models\QuestionsLesson;
use App\Models\CourseLog;
use DB;
use Session;

use App\Models\TicketsCategory;
use App\Models\Tickets;
use App\Models\ContentPart;

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

    /**Courses */
    function vendorCourse(){
        $content = Content::where(['user_id'=>Session::get('user_id')])->get();
        $data = array();
        foreach ($content as $myList)
		{
			$row = array();
			$row['title'] = strtoupper($myList->title);
			$row['content'] = strtoupper($myList->content);
			$row['mode'] = strtoupper($myList->mode);
			$row['type'] = strtoupper($myList->type);
            $row['id'] = $myList->id;            
            $btn = ''; 
            $btn = $btn.'<a href="/admin/user_vendor/vendor_lesson_list/'.$myList->id.'" class="btn  btn-warning btn-xs" title="Edit"><i class="fa fa-book"></i></a>  ';
            $btn = $btn.'<a href="/admin/user_vendor/vendor_course_new/'.$myList->id.'" class="btn  btn-primary btn-xs" title="Edit"><i class="far fa-save"></i></a>  ';
            $btn = $btn.'<button type="button" class="btn  btn-danger btn-xs" title="Edit" onclick="delete_course('."'".$myList->id."'".')"><i class="fas fa-trash"></i></button>  ';
            $row['action'] = $btn;
			$data[] = $row;
		}
        $output = array("data" => $data);
		echo json_encode($output);
    }

    public function vendorCourseList()
    {    
        return view('vendor.course.list');
    }

    public function vendorCourseNew()
    {    
        return view('vendor.course.new');
    }
    
    public function saveCourse(Request $request){
        if($request->mode=="Save"){
            Content::create([
                'create_at'=>time(),
                'user_id'=> Session::get('user_id'),
                'title'=>$request->title,
                'content'=>$request->content,
                'type'=>$request->type,
                'mode'=>'draft',
                'private'=>$request->private,
            ]);
        }else if($request->mode=="Update"){
            Content::where(['id'=>$request->id])->update([
                    'title'=>$request->title,
                    'content'=>$request->content,
                    'type'=>$request->type,
                    'private'=>$request->private,
                ]
            );
        }    
        echo true;
    }

    public function destroyCourse($id){        
        Content::where('id',$id)->delete();
        echo true;
    }

    public function showCourse($id)
    {
        $getData = Content::where(['id'=>$id])->first();
        return $getData;
    }

    public function showCourseMeta($id)
    {
        $getData = ContentMeta::where(['content_id'=>$id])->get();
        $data = array();
        foreach ($getData as $myList)
		{
            $row = array();
			$row['option_id'] = $myList->option_id;
			$row['value'] = $myList->value;
			$row['mode'] = $myList->mode;
            $row['id'] = $myList->id;
			$data[] = $row;
		}
        $output = array("data" => $getData);
		echo json_encode($output);
    }


    public function courseProgress($id)
    {
        $content = ContentPart::where(['content_id'=>$id])->get();
        $data = array();
        $cbid = 1;
        $getcnt = 0;
        $cnt=0;
        foreach ($content as $myList)
		{
            $row = array();
            $lesson = QuestionsLesson::where(['lesson_id'=>$myList->id])->get();
            foreach ($lesson as $val)
            {
                $val['lesson_id'];
                $cnt++;
            }            
		}
        $output = array("data" => $cnt);
		echo json_encode($output);
    }

    /**Lessons */

    function vendorLessons($id){
        $content = ContentPart::where(['content_id'=>$id])->get();
        $data = array();
        $cbid = 1;
        foreach ($content as $myList)
		{
			$row = array();
			$row['title'] = strtoupper($myList->title);
			$row['desc'] = strtoupper($myList->description);
            $row['id'] = $myList->id;   
            $row['cb'] ='<input type="checkbox" value="'.$myList->id.'" name="cb" id="cb_'.$cbid.'" >';            
            $btn = ''; 
            $btn = $btn.'<a href="/admin/user_vendor/vendor_lesson_new/'.$id."/".$myList->id.'" class="btn  btn-primary btn-xs" title="Edit"><i class="far fa-save"></i></a>  ';
            $btn = $btn.'<a href="/admin/user_vendor/vendor_question_add/'.$myList->id.'/'.$id.'" class="btn  btn-success btn-xs" title="Edit"><i class="fa fa-book"></i></a>  ';
            $btn = $btn.'<button type="button" class="btn  btn-danger btn-xs" title="Edit" onclick="delete_course('."'".$myList->id."'".')"><i class="fas fa-trash"></i></button>  ';
            $row['action'] = $btn;
			$data[] = $row;
		}
        $output = array("data" => $data);
		echo json_encode($output);
    }

    public function vendorLessonsList()
    {    
        return view('vendor.lesson.list');
    }

    public function vendorLessonNew()
    {    
        return view('vendor.lesson.new');
    }
    
    public function saveLesson(Request $request){
        if($request->mode=="Save"){
            ContentPart::create([
                'create_at'=>time(),
                'content_id'=> $request->cid,//content id
                'title'=>$request->title,
                'description'=>$request->desc,
                'upload_video'=>$request->upload_video,
                'duration'=>$request->duration,
                'size'=>$request->size,
                'sort'=>$request->sort,
                'mode'=>'request',
            ]);
        }else if($request->mode=="Update"){
            ContentPart::where(['id'=>$request->id])->update([
                    'title'=>$request->title,
                    'description'=>$request->desc,
                    'upload_video'=>$request->upload_video,
                    'duration'=>$request->duration,
                    'size'=>$request->size,
                    'sort'=>$request->sort,
                ]
            );
        }    
        echo true;
    }

    public function destroyLesson($id){        
        ContentPart::where('id',$id)->delete();
        echo true;
    }

    public function showLesson($id)
    {
        $getData = ContentPart::where(['id'=>$id])->first();
        return $getData;
    }

    /****Question */
    public function vendorQuestionAdd()
    {    
        return view('vendor.question.list');
    }

    function vendorQuestion($id){
        $content = Questions::where(['created_by'=>Session::get('user_id')])->get();
        $data = array();
        $cbid = 1;
        foreach ($content as $myList)
		{
            $row = array();            
            $checkRec = QuestionsLesson::where(['question_id'=>$myList->id,'lesson_id'=>$id])->first();
            if($checkRec==null){
                $row['question'] = strtoupper($myList->question);
                $row['type'] = strtoupper($myList->type);
                $row['id'] = $myList->id;   
                $row['cb'] ='<input type="checkbox" value="'.$myList->id.'" name="cb" id="cb_'.$cbid.'" >';            
                $btn = ''; 
                $btn = $btn.'<a href="/admin/user_vendor/vendor_question_add/'.$myList->id.'" class="btn  btn-success btn-xs" title="Edit"><i class="fa fa-book"></i></a>  ';
                $btn = $btn.'<button type="button" class="btn  btn-danger btn-xs" title="Edit" onclick="delete_course('."'".$myList->id."'".')"><i class="fas fa-trash"></i></button>  ';
                $row['action'] = $btn;
                $data[] = $row;
            }			
		}
        $output = array("data" => $data);
		echo json_encode($output);
    }

    public function vendorQuestionList()
    {    
        return view('vendor.question.listAdd');
    }

    public function addQuestion(Request $request){
        foreach ($request->data as $value) {
            QuestionsLesson::create([
                'question_id'=>$value['qid'],
                'lesson_id'=>$value['lid'],
                'content_id'=>$value['cid'],
                'qh_id'=>$value['qh_id'],
            ]);
        }                      
        echo true;
    }

    function vendorSelectedQuestion($id){
        $content = Questions::where(['created_by'=>Session::get('user_id')])->get();
        $data = array();
        $cbid = 1;
        foreach ($content as $myList)
		{
            $row = array();            
            $checkRec = QuestionsLesson::where(['question_id'=>$myList->id,'lesson_id'=>$id])->first();
            if($checkRec!=null){
                $row['question'] = strtoupper($myList->question);
                $row['type'] = strtoupper($myList->type);
                $row['id'] = $myList->id;   
                $row['cb'] ='<input type="checkbox" value="'.$myList->id.'" name="cb" id="cb_'.$cbid.'" >';            
                $btn = ''; 
                //$btn = $btn.'<a href="/admin/user_vendor/vendor_question_add/'.$myList->id.'" class="btn  btn-success btn-xs" title="Edit"><i class="fa fa-book"></i></a>  ';
                $btn = $btn.'<button type="button" class="btn  btn-danger btn-xs" title="Edit" onclick="delete_question('."'".$checkRec->id."'".')"><i class="fas fa-trash"></i></button>  ';
                $row['action'] = $btn;
                $data[] = $row;
            }			
		}
        $output = array("data" => $data);
		echo json_encode($output);
    }

    public function removeQuestion($id){      
        QuestionsLesson::where('id',$id)->delete();          
        echo true;
    }

    /*Student *Lessons */

    function studentLessons($id){
        $content = ContentPart::where(['content_id'=>$id])->get();
        $data = array();
        $cbid = 1;
        foreach ($content as $myList)
		{
			$row = array();
			$row['title'] = strtoupper($myList->title);
			$row['desc'] = strtoupper($myList->description);
			$row['duartion'] = strtoupper($myList->duartion);
			$row['size'] = strtoupper($myList->size);
			$row['sort'] = strtoupper($myList->sort);
            $row['id'] = $myList->id;   
            $row['cb'] ='<input type="checkbox" value="'.$myList->id.'" name="cb" id="cb_'.$cbid.'" >';            
            $btn = ''; 
            $btn = $btn.'<a href="/admin/user_student/student_lesson_quiz/'.$myList->id.'/'.$id.'" class="btn  btn-success btn-xs" title="Edit">Take quiz</a>  ';
            //$btn = $btn.'<a href="/admin/user_student/student_lesson_take_quiz/'.$myList->id.'" class="btn  btn-success btn-xs" title="Edit">Take quiz</a>  ';
            $btn .= ' <a href="/admin/user_student/student_show_lesson/'.$myList->id.'/'.$id.'" type="button" class="btn btn-primary">View Lesson</a>';
            $row['action'] = $btn;
			$data[] = $row;
		}
        $output = array("data" => $data);
		echo json_encode($output);
    }

    public function studentLessonsList()
    {    
        return view('student.lesson.list');
    }

    public function studentTakeQuiz()
    {    
        return view('student.lesson.quiz');
    }

    function studentLoadQuiz($id){
        $content = QuestionsLesson::where(['lesson_id'=>$id])->get();
        $data = array();
        $cbid = 1;
        foreach ($content as $myList)
		{
			$row = array();            
            $checkRec = Questions::where(['id'=>$myList->question_id])->first();
            if($checkRec!=null){
                $row['question'] = strtoupper($checkRec->question);
                $row['type'] = strtoupper($checkRec->type);
                $row['options'] = strtoupper($checkRec->options);
                $row['hint'] = strtoupper($checkRec->hint);
                $row['remarks'] = strtoupper($checkRec->remarks);
                $row['id'] = $checkRec->id;   
                $btn = ''; 
                $btn = $btn.'<button type="button" class="btn  btn-danger btn-xs" title="Edit" onclick="delete_question('."'".$checkRec->id."'".')"><i class="fas fa-trash"></i></button>  ';
                $row['action'] = $btn;
                $data[] = $row;
            }
		}
        $output = array("data" => $data);
		echo json_encode($output);
    }

    /**Answers */

    public function submitAnswers(Request $request)
    {
        $checkAns = CourseLog::where(['question_id'=>$request->qid])->first();
            if($checkAns)
            {                
                if($request->type=="CHECKBOX"){
                    $storeValue = '';
                    if($request->checkbox){
                        foreach ($request->checkbox as $value) {
                            $storeValue .=$value.'|';
                        }
                    }                    
                    $storeValue = substr_replace($storeValue ,"",-1);
                    CourseLog::where(['id'=>$request->cb_update_id])->update([
                            'answer'=>$storeValue,
                            'status'=> $request->isskip=='true'?'Skipped':'Done',
                        ]
                    );
                }
        
                if($request->type=="MULTIPLE CHOICE"){
                    CourseLog::where(['id'=>$request->mc_update_id])->update([
                            'answer'=>$request->mc,
                            'status'=> $request->isskip=='true'?'Skipped':'Done',
                        ]
                    );
                }        
        
                if($request->type=="SHORT ANSWER"){     
                    CourseLog::where(['id'=>$request->sa_update_id])->update([
                            'answer'=>$request->shortanswer,
                            'status'=> $request->isskip=='true'?'Skipped':'Done',
                        ]
                    );
                }
        
                if($request->type=="PARAGRAPH"){
                    CourseLog::where(['id'=>$request->pr_update_id])->update([
                            'answer'=>$request->paragraph,
                            'status'=> $request->isskip=='true'?'Skipped':'Done',
                        ]
                    );
                }
        
                if($request->type=="SWITCH"){                    
                    CourseLog::where(['id'=>$request->sw_update_id])->update([
                            'answer'=>$request->swopt,
                            'status'=> $request->isskip=='true'?'Skipped':'Done',
                        ]
                    );
                }
            }else{
                if($request->type=="CHECKBOX"){
                    $storeValue = '';
                    if($request->checkbox){
                        foreach ($request->checkbox as $value) {
                            $storeValue .=$value.'|';
                        }
                    }
                    
                    $storeValue = substr_replace($storeValue ,"",-1);
                    CourseLog::create([
                        'content_id'=>$request->cid,
                        'lesson_id'=>$request->lid,
                        'question_id'=>$request->qid,
                        'answer'=>$storeValue,
                        'status'=> $request->isskip=='true'?'Skipped':'Done',
                        'submittedBy'=>Session::get('user_id'),                
                    ]);
                }
        
                if($request->type=="MULTIPLE CHOICE"){
                    CourseLog::create([
                        'content_id'=>$request->cid,
                        'lesson_id'=>$request->lid,
                        'question_id'=>$request->qid,
                        'answer'=>$request->mc,
                        'status'=> $request->isskip=='true'?'Skipped':'Done',
                        'submittedBy'=>Session::get('user_id'),                
                    ]);
                }        
        
                if($request->type=="SHORT ANSWER"){            
                    CourseLog::create([
                        'content_id'=>$request->cid,
                        'lesson_id'=>$request->lid,
                        'question_id'=>$request->qid,
                        'answer'=>$request->shortanswer,
                        'status'=> $request->isskip=='true'?'Skipped':'Done',
                        'submittedBy'=>Session::get('user_id'),  
                    ]);
                }
        
                if($request->type=="PARAGRAPH"){
                    CourseLog::create([
                        'content_id'=>$request->cid,
                        'lesson_id'=>$request->lid,
                        'question_id'=>$request->qid,
                        'answer'=>$request->paragraph,
                        'status'=> $request->isskip=='true'?'Skipped':'Done',
                        'submittedBy'=>Session::get('user_id'),  
                    ]);
                }
        
                if($request->type=="SWITCH"){
                    CourseLog::create([
                        'content_id'=>$request->cid,
                        'lesson_id'=>$request->lid,
                        'question_id'=>$request->qid,
                        'answer'=>$request->swopt,
                        'status'=> $request->isskip=='true'?'Skipped':'Done',
                        'submittedBy'=>Session::get('user_id'),  
                    ]);
                } 
            }

            /* if($request->type=="CHECKBOX"){
                $storeValue = '';
                if($request->checkbox){
                    foreach ($request->checkbox as $value) {
                        $storeValue .=$value.'|';
                    }
                }
                
                $storeValue = substr_replace($storeValue ,"",-1);
                CourseLog::create([
                    'content_id'=>$request->cid,
                    'lesson_id'=>$request->lid,
                    'question_id'=>$request->qid,
                    'answer'=>$storeValue,
                    'status'=> $request->isskip=='true'?'Skipped':'Done',
                    'submittedBy'=>Session::get('user_id'),                
                ]);
            }
    
            if($request->type=="MULTIPLE CHOICE"){
                CourseLog::create([
                    'content_id'=>$request->cid,
                    'lesson_id'=>$request->lid,
                    'question_id'=>$request->qid,
                    'answer'=>$request->mc,
                    'status'=> $request->isskip=='true'?'Skipped':'Done',
                    'submittedBy'=>Session::get('user_id'),                
                ]);
            }        
    
            if($request->type=="SHORT ANSWER"){            
                CourseLog::create([
                    'content_id'=>$request->cid,
                    'lesson_id'=>$request->lid,
                    'question_id'=>$request->qid,
                    'answer'=>$request->shortanswer,
                    'status'=> $request->isskip=='true'?'Skipped':'Done',
                    'submittedBy'=>Session::get('user_id'),  
                ]);
            }
    
            if($request->type=="PARAGRAPH"){
                CourseLog::create([
                    'content_id'=>$request->cid,
                    'lesson_id'=>$request->lid,
                    'question_id'=>$request->qid,
                    'answer'=>$request->paragraph,
                    'status'=> $request->isskip=='true'?'Skipped':'Done',
                    'submittedBy'=>Session::get('user_id'),  
                ]);
            }
    
            if($request->type=="SWITCH"){
                CourseLog::create([
                    'content_id'=>$request->cid,
                    'lesson_id'=>$request->lid,
                    'question_id'=>$request->qid,
                    'answer'=>$request->swopt,
                    'status'=> $request->isskip=='true'?'Skipped':'Done',
                    'submittedBy'=>Session::get('user_id'),  
                ]);
            } */

            $e = $checkAns?$checkAns:0;
            echo json_encode($e);
        
    }

    public function viewSubmittedAnswer($id)
    {
        $data = CourseLog::where(['question_id'=>$id])->first();
        $output = array("data" => $data);
		echo json_encode($output);
    }

    public function getScoreDetails(Request $request)
    {
        $checkAns = CourseLog::where(['lesson_id'=>$request->qid])->get();
        $cntQuestion = QuestionsLesson::where(['lesson_id'=>$request->qid])->get();

        foreach ($checkAns as $value) {
            # code...
        }

        $output = array("number_of_questions" => count($cntQuestion),"number_of_correct");
    }
}
