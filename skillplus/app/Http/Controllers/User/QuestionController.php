<?php

namespace App\Http\Controllers\User;
use App\Models\Questions;
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
                'created_dt'=>date("Y-m-d H:i:s")
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
                'created_dt'=>date("Y-m-d H:i:s")
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
			$row['action'] = '';
			$data[] = $row;
		}
        $output = array("data" => $data);
		echo json_encode($output);
    }

    public function main()
    {    
        return view('user.questions.main');
    }

    function list(){}
    
}