<?php

namespace App\Http\Controllers\Admin;

use App\Models\Content;
use App\Models\ContentCategoryFilter;
use App\Models\ContentCategoryFilterTag;
use App\Models\ContentCategoryFilterTagRelation;
use App\Models\ContentComment;
use App\Models\ContentMeta;
use App\Models\ContentPart;
use App\Models\ContentSupport;
use App\Models\User;
use App\Models\LessonType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\ContentCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Input;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

class LessonsController extends Controller
{    
    ## Lesson Section
    public function lesson()
    {
        $list = LessonType::all();
        return view('admin.content.lesson',array('lists'=>$list));
    }

    public function lessonStore(Request $request)
    {
        if($request->edit != '') {
            $category = LessonType::find($request->edit);
            $category->lesson = $request->lesson;
            $category->description = $request->description;
            $category->save();
        }
        else {
            $category = new LessonType;
            $category->lesson = $request->lesson;
            $category->description = $request->description;
            $category->save();
        }
        return back();
    }

    function getAllLessons(){
        $lessons = LessonType::all();
        $data = array();
        foreach ($lessons as $myList)
		{
			$row = array();
			$row['lesson'] = $myList->lesson;
			$row['id'] = $myList->id;
			$data[] = $row;
		}
        $output = array("data" => $data);
		echo json_encode($output);
    }

    public function lessonEdit($id)
    {
        $list = LessonType::all();
        $item = LessonType::find($id);
        return view('admin.content.lessonedit',array('lists'=>$list,'item'=>$item));
    }
    
}
