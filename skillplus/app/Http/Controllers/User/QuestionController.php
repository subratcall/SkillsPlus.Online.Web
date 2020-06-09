<?php

namespace App\Http\Controllers\User;
use App\Models\Questions;
use App\Models\QuestionHeader;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Auth;
use DB;
use Session;


class QuestionController extends Controller
{

    public function store(Request $request){

        if($request->type=="Multiple Choice"){
            $storeValue = '';
            foreach ($request->option as $value) {
                $storeValue .=$value.'|';
            }
            $storeValue = substr_replace($storeValue ,"",-1);
            Questions::create([
                'question'=>$request->question,
                'type'=> $request->type ,
                'options'=>$storeValue,
                'answer'=>$request->checkbox,
                'created_by'=>Session::get('user_id'),
                'created_dt'=>date("Y-m-d H:i:s"),
                'hint'=>$request->hint,
                'correctremarks'=>$request->remarks,
                'attachment'=>$request->file,
                'timelimit'=>$request->timer,
                'points'=>$request->points,
            ]);
        }

        if($request->type=="Checkbox"){
            $storeValue = '';
            $storeAnswer = '';
            foreach ($request->optioncheck as $value) {
                $storeValue .=$value.'|';
            }
            foreach ($request->checkboxcheck as $value) {
                $storeAnswer .=$value.'|';
            }
            $storeValue = substr_replace($storeValue ,"",-1);
            $storeAnswer = substr_replace($storeAnswer ,"",-1);
            
            Questions::create([
                'question'=>$request->question,
                'type'=> $request->type ,
                'options'=>$storeValue,
                'answer'=>$storeAnswer,
                'created_by'=>Session::get('user_id'),
                'created_dt'=>date("Y-m-d H:i:s"),
                'hint'=>$request->hint,
                'correctremarks'=>$request->remarks,
                'attachment'=>$request->file,
                'timelimit'=>$request->timer,
                'points'=>$request->points,
            ]);
        }

        if($request->type=="Short Answer"){            
            Questions::create([
                'question'=>$request->question,
                'type'=> $request->type ,
                'answer'=>$request->short_ans,
                'created_by'=>Session::get('user_id'),
                'created_dt'=>date("Y-m-d H:i:s"),
                'hint'=>$request->hint,
                'correctremarks'=>$request->remarks,
                'attachment'=>$request->file,
                'timelimit'=>$request->timer,
                'points'=>$request->points,
            ]);
        }

        if($request->type=="Paragraph"){
            Questions::create([
                'question'=>$request->question,
                'type'=> $request->type ,
                'answer'=>$request->paragraph,
                'created_by'=>Session::get('user_id'),
                'created_dt'=>date("Y-m-d H:i:s"),
                'hint'=>$request->hint,
                'correctremarks'=>$request->remarks,
                'attachment'=>$request->file,
                'timelimit'=>$request->timer,
                'points'=>$request->points,
            ]);
        }

        if($request->type=="Switch"){
            Questions::create([
                'question'=>$request->question,
                'type'=> $request->type ,
                'answer'=>$request->swtich,
                'created_by'=>Session::get('user_id'),
                'created_dt'=>date("Y-m-d H:i:s"),
                'hint'=>$request->hint,
                'correctremarks'=>$request->remarks,
                'attachment'=>$request->file,
                'timelimit'=>$request->timer,
                'points'=>$request->points,
            ]);
        }
        echo true;
    }

    function getAllQuestionById(){
        $q = Questions::where('created_by',Session::get('user_id'))->get();
        $data = array();
        foreach ($q as $myList)
		{
			$row = array();
			$row['question'] = $myList->question;
			$row['type'] = $myList->type;
            $row['id'] = $myList->id;
            $btn = '';
            $btn = $btn.'<button type="button" onclick="delete_question('."'".$myList->id."'".')" class="btn  btn-warning btn-xs" title="Edit">Edit</button>  ';
            $btn .= ' <button type="button" onclick="delete_question('."'".$myList->id."'".')" class="btn btn-danger">Delete</button>';
			$row['action'] = $btn;
			$data[] = $row;
		}
        $output = array("data" => $data);
		echo json_encode($output);
    }

    public function main()
    {    
        return view('vendor.question.list');
    }

    public function new()
    {    
        return view('vendor.question.new');
    }

    function list(){}

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
}