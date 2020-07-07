<?php

namespace App\Http\Controllers\Admin_user;

use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use App\Models\Content;
use App\Models\ContentMeta;
use App\Models\Questions;
use App\Models\QuestionsLesson;
use App\Models\CourseLog;
use App\Models\Sell;
use App\Models\ContentRate;
use App\Models\ContentLearn;
use App\Models\Options;
use DB;
use Session;

use App\Models\TicketsCategory;
use App\Models\Tickets;
use App\Models\ContentPart;

use App\SaveAnswer;
use App\Models\User;
use App\CourseReview;
use App\Models\ContentComment;
use App\Models\Usermeta;

class VendorController extends Controller
{

    public function store(Request $request)
    {
        Tickets::create([
            'mode' => 'open',
            'user_id' => Session::get('user_id'),
            'title' => $request->title,
            'category_id' => $request->category_id,
            'mode' => 'draft',
            'create_at' => time()
        ]);
        echo true;
    }

    function getAllCategory()
    {
        $cat = TicketsCategory::all();
        $data = array();
        foreach ($cat as $myList) {
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
    function vendorCourse()
    {
        $content = Content::where(['user_id' => Session::get('user_id')])->get();
        $data = array();
        foreach ($content as $myList) {
            $row = array();
            $row['title'] = strtoupper($myList->title);
            $row['content'] = strtoupper($myList->content);
            $row['mode'] = strtoupper($myList->mode);
            $row['type'] = strtoupper($myList->type);
            $row['subtitle'] = strtoupper($myList->subTitle);
            $row['id'] = $myList->id;
            $btn = '';
            $btn = $btn . '<a href="/admin/user_vendor/vendor_lesson_list/' . $myList->id . '" class="btn  btn-warning btn-xs" title="Edit"><i class="fa fa-book"></i></a>  ';
            $btn = $btn . '<a href="/admin/user_vendor/vendor_course_new/' . $myList->id . '" class="btn  btn-primary btn-xs" title="Edit"><i class="far fa-save"></i></a>  ';
            $btn = $btn . '<button type="button" class="btn  btn-danger btn-xs" title="Edit" onclick="delete_course(' . "'" . $myList->id . "'" . ')"><i class="fas fa-trash"></i></button>  ';
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

    public function saveCourse(Request $request)
    {
        if ($request->mode == "Save") {
            Content::create([
                'create_at' => time(),
                'user_id' => Session::get('user_id'),
                'title' => $request->title,
                'content' => $request->content,
                'type' => $request->type,
                'mode' => 'draft',
                'private' => $request->private,
                'subtitle' => $request->subtitle,
            ]);
        } else if ($request->mode == "Update") {
            Content::where(['id' => $request->id])->update([
                'title' => $request->title,
                'content' => $request->content,
                'type' => $request->type,
                'private' => $request->private,
                'subtitle' => $request->subtitle,
            ]);
        }
        echo true;
    }


    public function destroyCourse($id)
    {
        Content::where('id', $id)->delete();
        echo true;
    }

    public function showCourse($id)
    {
        $getContent = Content::where(['id' => $id])->first();
        $rate = ContentRate::select("user_id", "rate")->where(["content_id" => $id])->get();

        $data = array();
        $comment = array();

        foreach ($rate as $key_a => $value_a) {
            $user = User::where(["id" => $value_a->user_id])->first();
            $getComment = ContentComment::where(["user_id" => $value_a->user_id])->first();
            $userMeta = Usermeta::where(["user_id" => $value_a->user_id])->get();

            $comment["user_comment"][$key_a]["comment"] = $getComment["comment"];
            $comment["user_comment"][$key_a]["create_at"] = $getComment["create_at"];
            $comment["user_comment"][$key_a]["name"] = $user["name"];
            $comment["user_comment"][$key_a]["rate"] = $value_a->rate;

            foreach($userMeta as $key_b => $value_b) {
             if ($value_b->option == "avatar") {
              $comment["user_comment"][$key_a]["avatar"] = $value_b->value;
             }
            }
        }

        $data["content"] = $getContent;
        $data["content"]["user_comment"] = $comment["user_comment"];

        return response()->json($data["content"]);
    }


    public function getRatings($id)
    {

        $getData = ContentRate::where(['content_id' => $id])->get();

        return response()->json($getData);

        //       $getData = ContentRate::where(['content_id'=>$id])->get();
        //       $data = array();
        //       $cnt = 0;
        //       foreach ($getData as $myList)
        // {
        //           $cnt+=$myList->rate;
        //       }
        // echo json_encode($cnt);

    }





    public function getPrecourse($id)
    {
        $getData = ContentMeta::where(['content_id' => $id, 'option' => 'precourse'])->first();
        $pieces = explode(",", $getData->value);
        $data = array();
        foreach ($pieces as $myList) {
            if ($myList != '') {
                $row = array();
                $getMeta = Content::where(['id' => $myList])->first();
                $row['title'] = $getMeta->title;
                $data[] = $row;
            }
        }
        $output = array("data" => $data, "getData" => $getData);
        echo json_encode($output);
    }

    public function countCoursePurchased($id)
    {
        //       $datas = Sell::where('content_id',$id)->get();
        // echo json_encode(count($datas));

        $datas = Sell::where('content_id', $id)->get();
        return response()->json(count($datas));
    }

    public function showCourseMeta($id)
    {
        $getData = ContentMeta::where(['content_id' => $id])->get();
        $data = array();
        foreach ($getData as $myList) {
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
        $content = ContentPart::where(['content_id' => $id])->get();
        $data = array();
        $cbid = 1;
        $getcnt = 0;
        $cnt = 0;
        foreach ($content as $myList) {
            $row = array();
            $lesson = QuestionsLesson::where(['lesson_id' => $myList->id])->get();
            foreach ($lesson as $val) {
                $val['lesson_id'];
                $cnt++;
            }
        }
        $output = array("data" => $cnt);
        echo json_encode($output);
    }

    public function getCL($id) {
      $cl = ContentLearn::where('content_id',$id)->get();      
      $data = array();
      
      $data["data"] = $cl;

      return $data;
    }

    public function saveCourseLearn(Request $request)
    {
        if ($request->mode == "Save") {
            ContentLearn::create([
                'content_id' => $request->title,
                'description' => $request->content,
            ]);
        } else if ($request->mode == "Update") {
            ContentLearn::where(['id' => $request->id])->update([
                'content_id' => $request->title,
                'description' => $request->content,
            ]);
        }
        echo true;
    }

    public function getCourseLearn($id)
    {
        $data = ContentLearn::where('id', $id)->first();
        echo json_encode($data);
    }

    public function destroyCourseLarn($id)
    {
        ContentLearn::where('id', $id)->delete();
        echo true;
    }

    public function getAllCourseLearn($id)
    {
        $getData = ContentLearn::where(['content_id' => $id])->get();
        $data = array();
        foreach ($getData as $myList) {
            if ($myList != '') {
                $row = array();
                $row['des'] = $myList->description;
                $btn = '';
                $btn = $btn . '<button type="button" class="btn  btn-primary btn-xs" title="Edit" onclick="edit_cl(' . "'" . $myList->id . "'" . ')"><i class="far fa-save"></i></button>  ';
                $btn = $btn . '<button type="button" class="btn  btn-danger btn-xs" title="Delete" onclick="delete_cl(' . "'" . $myList->id . "'" . ')"><i class="fas fa-trash"></i></button>  ';
                $row['action'] = $btn;
                $data[] = $row;
            }
        }
        $output = array("data" => $data);
        echo json_encode($output);
    }

    /**Lessons */

    function vendorLessons($id)
    {
        $content = ContentPart::where(['content_id' => $id])->get();
        $data = array();
        $cbid = 1;
        foreach ($content as $myList) {
            $row = array();
            $row['title'] = strtoupper($myList->title);
            $row['desc'] = strtoupper($myList->description);
            $row['id'] = $myList->id;
            $row['cb'] = '<input type="checkbox" value="' . $myList->id . '" name="cb" id="cb_' . $cbid . '" >';
            $btn = '';
            $btn = $btn . '<a href="/admin/user_vendor/vendor_lesson_new/' . $id . "/" . $myList->id . '" class="btn  btn-primary btn-xs" title="Edit"><i class="far fa-save"></i></a>  ';
            $btn = $btn . '<a href="/admin/user_vendor/vendor_question_add/' . $myList->id . '/' . $id . '" class="btn  btn-success btn-xs" title="Edit"><i class="fa fa-book"></i></a>  ';
            $btn = $btn . '<button type="button" class="btn  btn-danger btn-xs" title="Edit" onclick="delete_course(' . "'" . $myList->id . "'" . ')"><i class="fas fa-trash"></i></button>  ';
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

    public function saveLesson(Request $request)
    {
        if ($request->mode == "Save") {
            ContentPart::create([
                'create_at' => time(),
                'content_id' => $request->cid, //content id
                'title' => $request->title,
                'description' => $request->desc,
                'upload_video' => $request->upload_video,
                'duration' => $request->duration,
                'size' => $request->size,
                'sort' => $request->sort,
                'mode' => 'request',
            ]);
        } else if ($request->mode == "Update") {
            ContentPart::where(['id' => $request->id])->update([
                'title' => $request->title,
                'description' => $request->desc,
                'upload_video' => $request->upload_video,
                'duration' => $request->duration,
                'size' => $request->size,
                'sort' => $request->sort,
            ]);
        }
        echo true;
    }

    public function destroyLesson($id)
    {
        ContentPart::where('id', $id)->delete();
        echo true;
    }

    public function showLesson($id)
    {
        $getData = ContentPart::where(['id' => $id])->first();
        return $getData;
    }

    /****Question */
    public function vendorQuestionAdd()
    {
        return view('vendor.question.list');
    }

    function vendorQuestion($id)
    {
        $content = Questions::where(['created_by' => Session::get('user_id')])->get();
        $data = array();
        $cbid = 1;
        foreach ($content as $myList) {
            $row = array();
            $checkRec = QuestionsLesson::where(['question_id' => $myList->id, 'lesson_id' => $id])->first();
            if ($checkRec == null) {
                $row['question'] = strtoupper($myList->question);
                $row['type'] = strtoupper($myList->type);
                $row['id'] = $myList->id;
                $row['cb'] = '<input type="checkbox" value="' . $myList->id . '" name="cb" id="cb_' . $cbid . '" >';
                $btn = '';
                $btn = $btn . '<a href="/admin/user_vendor/vendor_question_add/' . $myList->id . '" class="btn  btn-success btn-xs" title="Edit"><i class="fa fa-book"></i></a>  ';
                $btn = $btn . '<button type="button" class="btn  btn-danger btn-xs" title="Edit" onclick="delete_course(' . "'" . $myList->id . "'" . ')"><i class="fas fa-trash"></i></button>  ';
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

    public function addQuestion(Request $request)
    {
        foreach ($request->data as $value) {
            QuestionsLesson::create([
                'question_id' => $value['qid'],
                'lesson_id' => $value['lid'],
                'content_id' => $value['cid'],
            ]);
        }
        echo true;
    }

    function vendorSelectedQuestion($id)
    {
        $content = Questions::where(['created_by' => Session::get('user_id')])->get();
        $data = array();
        $cbid = 1;
        foreach ($content as $myList) {
            $row = array();
            $checkRec = QuestionsLesson::where(['question_id' => $myList->id, 'lesson_id' => $id])->first();
            if ($checkRec != null) {
                $row['question'] = strtoupper($myList->question);
                $row['type'] = strtoupper($myList->type);
                $row['id'] = $myList->id;
                $row['cb'] = '<input type="checkbox" value="' . $myList->id . '" name="cb" id="cb_' . $cbid . '" >';
                $btn = '';
                //$btn = $btn.'<a href="/admin/user_vendor/vendor_question_add/'.$myList->id.'" class="btn  btn-success btn-xs" title="Edit"><i class="fa fa-book"></i></a>  ';
                $btn = $btn . '<button type="button" class="btn  btn-danger btn-xs" title="Edit" onclick="delete_question(' . "'" . $checkRec->id . "'" . ')"><i class="fas fa-trash"></i></button>  ';
                $row['action'] = $btn;
                $data[] = $row;
            }
        }
        $output = array("data" => $data);
        echo json_encode($output);
    }

    public function removeQuestion($id)
    {
        QuestionsLesson::where('id', $id)->delete();
        echo true;
    }

    /*Student *Lessons */

    function studentLessons($id)
    {
        $content = ContentPart::where(['content_id' => $id])->get();

        return response()->json($content);
        //       $data = array();
        //       $cbid = 1;
        //       foreach ($content as $myList)
        // {
        // 	$row = array();
        // 	$row['title'] = strtoupper($myList->title);
        // 	$row['desc'] = strtoupper($myList->description);
        // 	$row['duration'] = strtoupper($myList->duration);
        // 	$row['size'] = strtoupper($myList->size);
        // 	$row['sort'] = strtoupper($myList->sort);
        //           $row['id'] = $myList->id;   
        //           $row['cb'] ='<input type="checkbox" value="'.$myList->id.'" name="cb" id="cb_'.$cbid.'" >';            
        //           $btn = ''; 
        //           $btn = $btn.'<a href="/admin/user_student/student_lesson_quiz/'.$myList->id.'/'.$id.'" class="btn  btn-success btn-xs" title="Edit">Take quiz</a>  ';
        //           //$btn = $btn.'<a href="/admin/user_student/student_lesson_take_quiz/'.$myList->id.'" class="btn  btn-success btn-xs" title="Edit">Take quiz</a>  ';
        //           $btn .= ' <a href="/admin/user_student/student_show_lesson/'.$myList->id.'/'.$id.'" class="btn btn-primary">View Lesson</a>';
        //           $row['action'] = $btn;
        // 	$data[] = $row;
        // }
        // $output = array("data" => $data);
        // echo json_encode($output);

        // return response()->json($data);
    }

    public function studentLessonsList()
    {
        return view('student.lesson.list');
    }

    public function studentTakeQuiz()
    {
        // return view('student.lesson.quiz');
        return view('student.lesson.quiz-vue');
    }

    /* function studentLoadQuiz($id){
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
                $row['options'] = $checkRec->options;
                $row['hint'] = strtoupper($checkRec->hint);
                $row['remarks'] = strtoupper($checkRec->remarks);
                $row['attachment'] = strtoupper($checkRec->attachment);
                $row['id'] = $checkRec->id;   
                $btn = ''; 
                $btn = $btn.'<button type="button" class="btn  btn-danger btn-xs" title="Edit" onclick="delete_question('."'".$checkRec->id."'".')"><i class="fas fa-trash"></i></button>  ';
                $row['action'] = $btn;
                $data[] = $row;
            }
		}
        $output = array("data" => $data);
		echo json_encode($output);
    } */

    function studentLoadQuiz($id)
    {
        $content = QuestionsLesson::where(['lesson_id' => $id])->get();
        $data = array();
        $cbid = 1;
        foreach ($content as $myList) {
            $row = array();
            $checkRec = Questions::where(['id' => $myList->question_id])->first();
            $options = Options::select("question_id", "description", "is_correct")->where(['question_id' => $myList->question_id])->get();

            if ($checkRec != null) {
                $row['question'] = strtoupper($checkRec->question);
                $row['type'] = strtoupper($checkRec->type);
                $row['options'] = $checkRec->options;
                $row['hint'] = strtoupper($checkRec->hint);
                $row['remarks'] = strtoupper($checkRec->remarks);
                $row['attachment'] = strtoupper($checkRec->attachment);
                $row['id'] = $checkRec->id;
                $row["answer"] = $options;

                $data[] = $row;
            }
        }
        $output = array("data" => $data);
        echo json_encode($output);
    }

    /**Answers */

    public function submitAnswers(Request $request)
    {
        $checkAns = CourseLog::where(['question_id' => $request->qid, 'lesson_id' => $request->lid])->first();
        if ($checkAns) {
            if ($request->type == "CHECKBOX") {
                $storeValue = '';
                if ($request->checkbox) {
                    foreach ($request->checkbox as $value) {
                        $storeValue .= $value . '|';
                    }
                }
                $storeValue = substr_replace($storeValue, "", -1);
                CourseLog::where(['id' => $request->cb_update_id])->update([
                    'answer' => $storeValue,
                    'status' => $request->isskip == 'true' ? 'Skipped' : 'Done',
                ]);
            }

            if ($request->type == "MULTIPLE CHOICE") {
                CourseLog::where(['id' => $request->mc_update_id])->update([
                    'answer' => $request->mc,
                    'status' => $request->isskip == 'true' ? 'Skipped' : 'Done',
                ]);
            }

            if ($request->type == "SHORT ANSWER") {
                CourseLog::where(['id' => $request->sa_update_id])->update([
                    'answer' => $request->shortanswer,
                    'status' => $request->isskip == 'true' ? 'Skipped' : 'Done',
                ]);
            }

            if ($request->type == "PARAGRAPH") {
                CourseLog::where(['id' => $request->pr_update_id])->update([
                    'answer' => $request->paragraph,
                    'status' => $request->isskip == 'true' ? 'Skipped' : 'Done',
                ]);
            }

            if ($request->type == "SWITCH") {
                CourseLog::where(['id' => $request->sw_update_id])->update([
                    'answer' => $request->swopt,
                    'status' => $request->isskip == 'true' ? 'Skipped' : 'Done',
                ]);
            }
        } else {
            if ($request->type == "CHECKBOX") {
                $storeValue = '';
                if ($request->checkbox) {
                    foreach ($request->checkbox as $value) {
                        $storeValue .= $value . '|';
                    }
                }

                $storeValue = substr_replace($storeValue, "", -1);
                CourseLog::create([
                    'content_id' => $request->cid,
                    'lesson_id' => $request->lid,
                    'question_id' => $request->qid,
                    'answer' => $storeValue,
                    'status' => $request->isskip == 'true' ? 'Skipped' : 'Done',
                    'submittedBy' => Session::get('user_id'),
                ]);
            }

            if ($request->type == "MULTIPLE CHOICE") {
                CourseLog::create([
                    'content_id' => $request->cid,
                    'lesson_id' => $request->lid,
                    'question_id' => $request->qid,
                    'answer' => $request->mc,
                    'status' => $request->isskip == 'true' ? 'Skipped' : 'Done',
                    'submittedBy' => Session::get('user_id'),
                ]);
            }

            if ($request->type == "SHORT ANSWER") {
                CourseLog::create([
                    'content_id' => $request->cid,
                    'lesson_id' => $request->lid,
                    'question_id' => $request->qid,
                    'answer' => $request->shortanswer,
                    'status' => $request->isskip == 'true' ? 'Skipped' : 'Done',
                    'submittedBy' => Session::get('user_id'),
                ]);
            }

            if ($request->type == "PARAGRAPH") {
                CourseLog::create([
                    'content_id' => $request->cid,
                    'lesson_id' => $request->lid,
                    'question_id' => $request->qid,
                    'answer' => $request->paragraph,
                    'status' => $request->isskip == 'true' ? 'Skipped' : 'Done',
                    'submittedBy' => Session::get('user_id'),
                ]);
            }

            if ($request->type == "SWITCH") {
                CourseLog::create([
                    'content_id' => $request->cid,
                    'lesson_id' => $request->lid,
                    'question_id' => $request->qid,
                    'answer' => $request->swopt,
                    'status' => $request->isskip == 'true' ? 'Skipped' : 'Done',
                    'submittedBy' => Session::get('user_id'),
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

        $e = $checkAns ? $checkAns : 0;
        echo json_encode($e);
    }

    public function viewSubmittedAnswer($qid, $lid)
    {
        $data = CourseLog::where(['question_id' => $qid, 'lesson_id' => $lid])->first();
        $output = array("data" => $data);
        echo json_encode($output);
    }

    public function getScoreDetails($lid)
    {
        $checkAns = CourseLog::where(['lesson_id' => $lid])->get();
        $cntQuestion = QuestionsLesson::where(['lesson_id' => $lid])->get();

        $correctAns = 0;
        $totalPoints = 0;
        $totalCorrectPoints = 0;
        foreach ($checkAns as $value) {
            $queryQuestion = Questions::where(['id' => $value->question_id])->first();

            if ($queryQuestion) {
                if ($queryQuestion->type == "Checkbox") {
                    $question_array = (explode("|", $queryQuestion->answer));
                    $answer_array = (explode("|", $value->answer));
                    $result = array_diff($answer_array, $question_array);
                    if (count($result) == 0) {
                        $correctAns++;
                        $totalCorrectPoints += $queryQuestion->points;
                    }
                }
                //$totalPoints+=$queryQuestion->points;
            }

            if ($queryQuestion) {
                if ($queryQuestion->type == "Multiple Choice") {
                    if ($queryQuestion->answer == $value->answer) {
                        $correctAns++;
                        $totalCorrectPoints += $queryQuestion->points;
                    }
                }
            }

            if ($queryQuestion) {
                if ($queryQuestion->type == "Short Answer") {
                    if ($queryQuestion->answer == $value->answer) {
                        $correctAns++;
                        $totalCorrectPoints += $queryQuestion->points;
                    }
                }
            }

            if ($queryQuestion) {
                if ($queryQuestion->type == "Paragraph") {
                    if ($queryQuestion->answer == $value->answer) {
                        $correctAns++;
                        $totalCorrectPoints += $queryQuestion->points;
                    }
                }
            }

            if ($queryQuestion) {
                if ($queryQuestion->type == "Switch") {
                    if ($queryQuestion->answer == $value->answer) {
                        $correctAns++;
                        $totalCorrectPoints += $queryQuestion->points;
                    }
                }
            }
            $totalPoints += $queryQuestion->points;
        }
        $avgPoints = $totalPoints != 0 ? ($totalCorrectPoints / $totalPoints) * 100 : 0;
        $output = array("number_of_questions" => count($cntQuestion), "number_of_correct" => $correctAns, "total_points" => $totalPoints, "total_correct_points" => $totalCorrectPoints, "avg" => round($avgPoints, 2) . " %");
        echo json_encode($output);
    }

    public function getAnswers($id)
    {
        $data = QuestionsLesson::where(['lesson_id' => $id])->get();
        $array = array();
        foreach ($data as $value) {
            $row = array();
            $f = Questions::where(['id' => $value->question_id])->first();
            $row['question'] = strtoupper($f->question);
            $row['type'] = strtoupper($f->type);
            $row['options'] = $f->options;
            $row['hint'] = strtoupper($f->hint);
            $row['remarks'] = strtoupper($f->correctremarks);
            $row['answer'] = strtoupper($f->answer);
            $row['id'] = $f->id;
            $array[] = $row;
        }
        $output = array("data" => $array, "ff" => 123);
        echo json_encode($output);
    }

    public function checkSubmittedAnswers($lid)
    {
        $data = CourseLog::where(['lesson_id' => $lid])->get();
        $array = array();
        foreach ($data as $value) {
            $row = array();
            $f = Questions::where(['id' => $value->question_id])->first();
            $row['question'] = strtoupper($f->question);
            $row['type'] = strtoupper($f->type);
            $row['options'] = $f->options;
            $row['hint'] = strtoupper($f->hint);
            $row['remarks'] = strtoupper($f->correctremarks);
            $row['answer'] = strtoupper($f->answer);
            $row['id'] = $value->question_id;
            $row['status'] = $value->status;
            $array[] = $row;
        }
        $output = array("data" => $array);
        echo json_encode($output);
    }


    public function saveAnswers(Request $request, $lid, $id)
    {

        $content_id = $id;
        $lesson_id = $lid;


        return dd($request->all());
    }

    public function getVendor($id)
    {

        $user = User::where(["id" => $id])->get();
        $userMeta = Usermeta::where(["user_id" => $id])->get();
        $data = array();
        foreach($user as $key_a => $value_a) {
         $data[$key_a]["name"] = $value_a->name;
         $data[$key_a]["about"] = $value_a->about;
         $data[$key_a]["vendor"] = $value_a->vendor;
         
         foreach($userMeta as $key_b => $value_b) {
          if ($value_b->option == "avatar") {
           $data[$key_a]["avatar"] = $value_b->value;
          }
         }
        }

        return response()->json($data);
    }

    public function getVendorCountCourses($id)
    {
        $user = Content::where(["user_id" => $id])->get();

        return response()->json(count($user));
    }

    public function getVendorCourseComment($id)
    {

        // $data= CourseReview::leftJoin("tbl_content_rate", function($join) {
        //  $join->on("tbl_content_rate.user_id", "=", "content_reviews.tbl_user_id");
        // })->select("content_reviews.comments", "tbl_content_rate.rate", "content_reviews.tbl_user_id")->get();

        $data = ContentRate::where(["content_id" => $id])->get();

        // SELECT content_reviews.`comments`, tbl_content_rate.rate, content_reviews.tbl_user_id
        // FROM content_reviews
        // LEFT JOIN tbl_content_rate
        // ON tbl_content_rate.user_id = content_reviews.tbl_user_id

        return response()->json($data);
    }

    public function getVendorRelatedCourse($id)
    {

        // $data = Content::where(["tag" => $id])->select("id as content_id")->get();

        /* $data = Content::leftJoin("tbl_contents_part as contents_part", function($join) {
      $join->on('contents_part.content_id', '=', 'tbl_contents.id');
    })->select("contents_part.title", "contents_part.create_at", "contents_part.duration", "contents_part.price", "contents_part.free")->where(["tag" => $id])->limit(5)->get(); */




        $content = Content::where(["tag" => $id])->get();

        $row = array();

        foreach ($content as $key_a => $value_a) {

            $contentMeta = ContentMeta::where("content_id", $value_a->id)->get();
            $contentRate = ContentRate::where(['content_id' => $value_a->id])->get();
            $userSold = Sell::where('content_id', $value_a->id)->get();

            $row[$key_a]["title"] = $value_a->title;
            $row[$key_a]["create_at"] = $value_a->create_at;
            $row[$key_a]["price_post"] = $value_a->price_post;
            
            $rate = 0;
            $average = 0;
            $length = count($contentRate);
            $length = ($length == 0) ? 1 : $length;
            
            foreach ($contentRate as $key_b => $value_b) {
                $rate = $rate + $value_b->rate;
            }
            
            $average = ($rate / $length);
            //overall rate
            $row[$key_a]["rate"] = ceil($average);
            //vendor student sold
            $row[$key_a]["sold"] = count($userSold);
            
            $collectMeta = array();

            foreach($contentMeta as $key_c => $value_c) {
                if ($value_c->option == "video") {
                    $collectMeta[$key_c]["video"] = $value_c->value;
                }

                if ($value_c->option == "thumbnail") {
                    $collectMeta[$key_c]["thumbnail"] = $value_c->value;
                }

                if ($value_c->option == "cover") {
                    $collectMeta[$key_c]["cover"] = $value_c->value;
                }
            }

            $row[$key_a]["meta"] = $collectMeta;
        }

        return response()->json($row);
    }
}
