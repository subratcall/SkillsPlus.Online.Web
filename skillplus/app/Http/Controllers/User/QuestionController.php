<?php

namespace App\Http\Controllers\User;
use App\Models\Questions;
use App\Models\QuestionHeader;
use App\Http\Controllers\Controller;
use App\Models\Options;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Auth;
use DB;
use Session;


class QuestionController extends Controller
{

    public function store(Request $request){
     
     $answer_id = $request->answer_id;

     $question = Questions::create([
       'question'=>$request->question,
       'type'=> $request->type ,
       'options'=> '',
       'answer'=> '',
       'created_by'=>Session::get('user_id'),
       'created_dt'=>date("Y-m-d H:i:s"),
       'hint'=>$request->hint,
       'correctremarks'=>$request->remarks,
       'attachment'=>$request->file,
       'timelimit'=>$request->timer,
       'points'=>$request->points,
      ]);
  
   $lastid = $question->id;
     
     if($request->type=="Multiple Choice"){

       foreach ($request->option as $key => $value) {
         $option = new Options;
         $option->question_id = $lastid;
         $option->description = $value;
         $option->is_correct = ($key == $answer_id) ? TRUE : FALSE;
         $option->save();
       }
     }





     if ($request->type=="Checkbox") {

      $answer_id = $request->answer_id;
      $answer_id = explode("-", $answer_id);

      foreach ($request->optioncheck as $keya => $valuea) {
       $option = new Options;
       $option->question_id = $lastid;
       $option->description = $valuea;

       foreach($answer_id as $keyb => $valueb) {
        if ($keya == $valueb) {
         $option->is_correct = TRUE;
        }
       }


       $option->save();
      }

     }


     if ($request->type=="Short Answer" || $request->type=="Paragraph") {
      $option = new Options;
      $option->question_id = $lastid;
      $option->description = $request->short_ans;
      $option->is_correct = TRUE;
      $option->save();
     }

     if ($request->type=="Switch") {

      $option = new Options;
      $option->question_id = $lastid;
      $option->description = ($request->switchOpt == "on") ? "TRUE": "FALSE";
      $option->is_correct = ($request->switchOpt == "on") ? TRUE: FALSE;
      $option->save();

     }


     return response()->json(["success"]);

     /*--------------------------------------------------------------*/
        // if($request->type=="Multiple Choice"){
        //     $storeValue = '';
        //     foreach ($request->option as $value) {
        //         $storeValue .=$value.'|';
        //     }
        //     $storeValue = substr_replace($storeValue ,"",-1);
        //     Questions::create([
        //         'question'=>$request->question,
        //         'type'=> $request->type ,
        //         'options'=>$storeValue,
        //         'answer'=>$request->checkbox,
        //         'created_by'=>Session::get('user_id'),
        //         'created_dt'=>date("Y-m-d H:i:s"),
        //         'hint'=>$request->hint,
        //         'correctremarks'=>$request->remarks,
        //         'attachment'=>$request->file,
        //         'timelimit'=>$request->timer,
        //         'points'=>$request->points,
        //     ]);
        // }

        // if($request->type=="Checkbox"){
        //     $storeValue = '';
        //     $storeAnswer = '';
        //     foreach ($request->optioncheck as $value) {
        //         $storeValue .=$value.'|';
        //     }
        //     foreach ($request->checkboxcheck as $value) {
        //         $storeAnswer .=$value.'|';
        //     }
        //     $storeValue = substr_replace($storeValue ,"",-1);
        //     $storeAnswer = substr_replace($storeAnswer ,"",-1);
            
        //     Questions::create([
        //         'question'=>$request->question,
        //         'type'=> $request->type ,
        //         'options'=>$storeValue,
        //         'answer'=>$storeAnswer,
        //         'created_by'=>Session::get('user_id'),
        //         'created_dt'=>date("Y-m-d H:i:s"),
        //         'hint'=>$request->hint,
        //         'correctremarks'=>$request->remarks,
        //         'attachment'=>$request->file,
        //         'timelimit'=>$request->timer,
        //         'points'=>$request->points,
        //     ]);
        // }

        // if($request->type=="Short Answer"){            
        //     Questions::create([
        //         'question'=>$request->question,
        //         'type'=> $request->type ,
        //         'answer'=>$request->short_ans,
        //         'created_by'=>Session::get('user_id'),
        //         'created_dt'=>date("Y-m-d H:i:s"),
        //         'hint'=>$request->hint,
        //         'correctremarks'=>$request->remarks,
        //         'attachment'=>$request->file,
        //         'timelimit'=>$request->timer,
        //         'points'=>$request->points,
        //     ]);
        // }

        // if($request->type=="Paragraph"){
        //     Questions::create([
        //         'question'=>$request->question,
        //         'type'=> $request->type ,
        //         'answer'=>$request->paragraph,
        //         'created_by'=>Session::get('user_id'),
        //         'created_dt'=>date("Y-m-d H:i:s"),
        //         'hint'=>$request->hint,
        //         'correctremarks'=>$request->remarks,
        //         'attachment'=>$request->file,
        //         'timelimit'=>$request->timer,
        //         'points'=>$request->points,
        //     ]);
        // }

        // if($request->type=="Switch"){
        //     Questions::create([
        //         'question'=>$request->question,
        //         'type'=> $request->type ,
        //         'answer'=>$request->swtich,
        //         'created_by'=>Session::get('user_id'),
        //         'created_dt'=>date("Y-m-d H:i:s"),
        //         'hint'=>$request->hint,
        //         'correctremarks'=>$request->remarks,
        //         'attachment'=>$request->file,
        //         'timelimit'=>$request->timer,
        //         'points'=>$request->points,
        //     ]);
        // }
        // echo true;
    }
    
    public function update(Request $request, $id){

     $answer_id = $request->answer_id;

     $question =  Questions::where(['id'=>$id])->update([
       'question'=>$request->question,
       'type'=> $request->type ,
       'options'=> '',
       'answer'=> '',
       'created_by'=>Session::get('user_id'),
       'created_dt'=>date("Y-m-d H:i:s"),
       'hint'=>$request->hint,
       'correctremarks'=>$request->remarks,
       'attachment'=>$request->file,
       'timelimit'=>$request->timer,
       'points'=>$request->points,
      ]);
  
      $lastid = $id;

      Options::where(["question_id" => $lastid])->delete();

     if($request->type=="Multiple Choice"){
       foreach ($request->option as $key => $value) {
         $option = new Options;
         $option->question_id = $lastid;
         $option->description = $value;
         $option->is_correct = ($key == $answer_id) ? TRUE : FALSE;
         $option->save();
       }
     }


     if ($request->type=="Checkbox") {

      $answer_id = $request->answer_id;
      $answer_id = explode("-", $answer_id);

      foreach ($request->optioncheck as $keya => $valuea) {
       $option = new Options;
       $option->question_id = $lastid;
       $option->description = $valuea;

       foreach($answer_id as $keyb => $valueb) {
        if ($keya == $valueb) {
         $option->is_correct = TRUE;
        }
       }


       $option->save();
      }

     }


     if ($request->type=="Short Answer" || $request->type=="Paragraph") {
      $option = new Options;
      $option->question_id = $lastid;
      $option->description = $request->short_ans;
      $option->is_correct = TRUE;
      $option->save();
     }

     if ($request->type=="Switch") {

      $option = new Options;
      $option->question_id = $lastid;
      $option->description = $request->short_ans;
      $option->is_correct = ($request->switchOpt == "on") ? TRUE: FALSE;
      $option->save();

     }

     return response()->json(["success"]);

     /*----------------------------------------------------------------------*/

        // if($request->type=="Multiple Choice"){
        //     $storeValue = '';
        //     foreach ($request->option as $value) {
        //         $storeValue .=$value.'|';
        //     }
            
        //     $storeValue = substr_replace($storeValue ,"",-1);
        //     Questions::where(['id'=>$request->id])->update([
        //         'updated_by'=>Session::get('user_id'),
        //         'updated_dt'=>date("Y-m-d H:i:s"),
        //         'question'=>$request->question,
        //         'type'=> $request->type ,
        //         'options'=>$storeValue,
        //         'answer'=>$request->checkbox,
        //         'hint'=>$request->hint,
        //         'correctremarks'=>$request->remarks,
        //         'attachment'=>$request->file,
        //         'timelimit'=>$request->timer,
        //         'points'=>$request->points,
        //         ]
        //     );
        // }

        // if($request->type=="Checkbox"){
        //     $storeValue = '';
        //     $storeAnswer = '';
        //     foreach ($request->optioncheck as $value) {
        //         $storeValue .=$value.'|';
        //     }
        //     foreach ($request->checkboxcheck as $value) {
        //         $storeAnswer .=$value.'|';
        //     }
        //     $storeValue = substr_replace($storeValue ,"",-1);
        //     $storeAnswer = substr_replace($storeAnswer ,"",-1);
        //     Questions::where(['id'=>$request->id])->update([
        //         'updated_by'=>Session::get('user_id'),
        //         'updated_dt'=>date("Y-m-d H:i:s"),
        //         'question'=>$request->question,
        //         'type'=> $request->type ,
        //         'options'=>$storeValue,
        //         'answer'=>$storeAnswer,
        //         'hint'=>$request->hint,
        //         'correctremarks'=>$request->remarks,
        //         'attachment'=>$request->file,
        //         'timelimit'=>$request->timer,
        //         'points'=>$request->points,
        //         ]
        //     );
        // }

        // if($request->type=="Short Answer"){      
        //     Questions::where(['id'=>$request->id])->update([
        //         'updated_by'=>Session::get('user_id'),
        //         'updated_dt'=>date("Y-m-d H:i:s"),
        //         'question'=>$request->question,
        //         'type'=> $request->type ,
        //         'answer'=>$request->short_ans,
        //         'hint'=>$request->hint,
        //         'correctremarks'=>$request->remarks,
        //         'attachment'=>$request->file,
        //         'timelimit'=>$request->timer,
        //         'points'=>$request->points,
        //         ]
        //     );
        // }

        // if($request->type=="Paragraph"){
        //     Questions::where(['id'=>$request->id])->update([
        //         'updated_by'=>Session::get('user_id'),
        //         'updated_dt'=>date("Y-m-d H:i:s"),
        //         'question'=>$request->question,
        //         'type'=> $request->type ,
        //         'answer'=>$request->paragraph,
        //         'hint'=>$request->hint,
        //         'correctremarks'=>$request->remarks,
        //         'attachment'=>$request->file,
        //         'timelimit'=>$request->timer,
        //         'points'=>$request->points,
        //         ]
        //     );
        // }

        // if($request->type=="Switch"){
        //     Questions::where(['id'=>$request->id])->update([
        //         'updated_by'=>Session::get('user_id'),
        //         'updated_dt'=>date("Y-m-d H:i:s"),
        //         'question'=>$request->question,
        //         'type'=> $request->type ,
        //         'answer'=>$request->swtich,
        //         'hint'=>$request->hint,
        //         'correctremarks'=>$request->remarks,
        //         'attachment'=>$request->file,
        //         'timelimit'=>$request->timer,
        //         'points'=>$request->points,
        //         ]
        //     );
        // }
        // echo true;
    }


    function getAllQuestionById(){
        $q = Questions::where('created_by',Session::get('user_id'))->get();

        return response()->json($q);
     }

/*     function getAllQuestionById(){
        $q = Questions::where('created_by',Session::get('user_id'))->get();
        $data = array();
        foreach ($q as $myList)
		{
			$row = array();
			$row['question'] = $myList->question;
			$row['type'] = $myList->type;
            $row['id'] = $myList->id;
            $btn = '';
            $btn = $btn.'<a href="/admin/question/edit_question/'.$myList->id.'" class="btn  btn-warning btn-xs" title="Edit">Edit</a>  ';
            $btn .= ' <button type="button" onclick="delete_question('."'".$myList->id."'".')" class="btn btn-danger">Delete</button>';
            //$btn .= ' <a href="/admin/user_student/student_show_lesson/'.$myList->id.'/'.$id.'" class="btn btn-primary">View Lesson</a>';
			$row['action'] = $btn;
			$data[] = $row;
		}
        $output = array("data" => $data);
		echo json_encode($output);
    } */

    public function destroyq($id){        
        Questions::where('id',$id)->delete();
        echo true;
    }

    public function main()
    {    
        return view('vendor.question.list');
    }

    public function new()
    {    
        return view('vendor.question.new');
    }

    public function edit($id)
    {    

     
        return view('vendor.question.new');
    }


    public function saveQuestionHeader(Request $request)
    {
        $a = QuestionHeader::create([
            'title'=>$request->title,
            'timer'=> $request->timer ,
            'content_id'=> $request->cid ,
            'lesson_id'=> $request->lid ,
        ]);
        echo $a;
    }

    public function updateQuestionHeader(Request $request)
    {
        $a = QuestionHeader::where(['id'=>$request->id])->update([
            'title'=>$request->title,
            'timer'=> $request->timer ,
        ]);
        echo $a;
    }

    public function getQuestionHeader($id)
    {
        $checkAns = QuestionHeader::where(['lesson_id'=>$id])->first();
        echo json_encode($checkAns);
    }

    public function getQuestionDetail($id)
    {
        $getData = Questions::where(['id'=>$id])->first();
        return $getData;
    }

    public function getOptionDetail($id) {

      $getData = Options::where("question_id", "=", $id)->get();

      return response()->json($getData);
    }
}