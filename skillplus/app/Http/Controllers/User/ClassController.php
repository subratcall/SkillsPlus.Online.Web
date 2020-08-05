<?php

namespace App\Http\Controllers\User;
use App\Models\Questions;
use App\Models\QuestionHeader;
use App\Http\Controllers\Controller;
use App\Models\Options;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Session;
use App\Models\Content; 
use App\Models\ContentPart;
use App\Models\ContentClass;
use App\Models\User;
use App\Models\ContentClassTrainors;

class ClassController extends Controller
{

    public function store(Request $request){
     
     $get_lessons = ContentPart::where(['id' => $request->precourse])->first();
     $option = new ContentClass;
     $option->title =$request->title;
     $option->startDate = $request->startDate ;
     $option->dueDate = $request->dueDate ;
     $option->lesson_id = $request->precourse ;
     $option->lesson_title = $get_lessons->title ;
     $option->user_id = Session::get('user_id') ;
     $option->save();

     $last_id = $option->id;

        $question =  ContentClass::where(['id'=>$option->id])->update([
            'code'=>'C'.str_pad($option->id, 3, '0', STR_PAD_LEFT),
        ]);
        echo true;
    }
    
    public function update(Request $request){

        $get_lessons = ContentPart::where(['id' => $request->precourse])->first();
     $question =  ContentClass::where(['id'=>$request->id])->update([
       'title'=>$request->title,
       'startDate'=> $request->startDate ,
       'dueDate'=> $request->dueDate ,
       'lesson_id'=>  $request->precourse,
       'lesson_title'=>$get_lessons->title,
      ]);
  
      echo true;
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
        return view('vendor.class.list');
    }

    public function trainers()
    {    
        return view('vendor.trainers.list');
    }

    public function new()
    {    
        return view('vendor.class.new');
    }

    public function edit($id)
    { 
        return view('vendor.question.new');
    }

    
    public function show($id)
    {
        $data = ContentClass::where(['id'=>$id])->first();
        echo json_encode($data);
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

    /**
     * lessons
     */

    function getVendorLessons()
    {
        $getcontent = Content::where(['user_id' => Session::get('user_id')])->get();
        $data = array();
        $cbid = 1;
        foreach ($getcontent as $myList) {
            $row = array();
            $get_lessons = ContentPart::where(['content_id' => $myList->id])->get();
            foreach ($get_lessons as $key) {
                $row['title'] = strtoupper($key->title);
                $row['desc'] = strtoupper($key->description);
                $row['id'] = $key->id;
                $data[] = $row;       
            }     
        }
        $output = array("data" => $data);
        echo json_encode($output);
    }

    function getClass()
    {
        $getcontent = ContentClass::where(['user_id' => Session::get('user_id')])->get();
        $data = array();
        foreach ($getcontent as $key) {
            $row = array();
            $row['title'] = strtoupper($key->title);
            $row['lesson_title'] = strtoupper($key->lesson_title);
            $row['code'] = $key->code;
            $sd = date_create($key->startDate);
            $dd = date_create($key->dueDate);
            $row['dd'] = date_format($dd,"F d, Y");
            $row['sd'] = date_format($sd,"F d, Y");
            $row['li'] = $key->lesson_id;
            $row['id'] = $key->id;
            $btn = '';
            $btn = $btn.'<a href="/admin/class/vendor_class_new/'.$key->id.'" class="btn  btn-warning btn-xs" title="Edit">Edit</a>  ';
            $btn .= ' <button type="button" onclick="delete_class('."'".$key->id."'".')" class="btn btn-danger">Delete</button>';
            $btn = $btn.' <a href="/admin/class/trainers/'.$key->id.'" class="btn  btn-primary btn-xs" title="Trainors">Trainors</a>  ';
            $btn .= ' <button type="button" onclick="viewTrainors('."'".$key->id."'".')" class="btn btn-success">Class Trainors</button>';
            $row['action'] = $btn;
                
            $data[] = $row;          
        }
        $output = array("data" => $data);
        echo json_encode($output);
    }

    function getAllUsers(){
        $getcontent = User::all();
        $data = array();
        foreach ($getcontent as $key) {
            $row = array();
            $row['name'] = strtoupper($key->name);
            $row['user_id'] = $key->id;                
            $data[] = $row;          
        }
        $output = array("data" => $data);
        echo json_encode($output);
    }

    
    function getTrainors($id){
        $getcontent = ContentClassTrainors::where(['class_id' => $id])->get();
        $data = array();
        $cnt=1;
        foreach ($getcontent as $key) {
            $row = array();
            $row['name'] = strtoupper($key->name);
            $row['desc'] = "Tranier ".$cnt;
            $row['user_id'] = $key->id;       
            $row['action'] =' <button type="button" onclick="delete_trainer('."'".$key->id."'".')" class="btn btn-danger">Delete</button>'    ;     
            $data[] = $row;          
            $cnt++;
        }
        $output = array("data" => $data);
        echo json_encode($output);
    }

    public function storeTrainor(Request $request){
     
        $getname = User::where(['id' => $request->user_id])->first();
        $option = new ContentClassTrainors;
        $option->class_id =$request->class_id;
        $option->user_id = $request->user_id ;
        $option->name = $getname->name ;
        $option->save();
   
        echo true;
    }

    public function removeTrainer($id){        
        ContentClassTrainors::where('id',$id)->delete();
        echo true;
    }

    function getClasstrainors($id)
    {
        $getcontent = ContentClass::where(['id' => $id])->first();
        
        $gettrainors = ContentClassTrainors::where(['class_id' => $getcontent->id])->get();
        $data = array();
        $cnt=1;
        foreach ($gettrainors as $key) {
            $row = array();
            $row['code'] = strtoupper($getcontent->code);
            $row['name'] = strtoupper($key->name);
            $row['desc'] = "Trainer ".$cnt; 
            $cnt++;       
            $data[] = $row;  
        }
        $output = array("data" => $data);
        echo json_encode($output);
    }
}