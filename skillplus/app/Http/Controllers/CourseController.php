<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContentCategory;

class CourseController extends Controller
{
    function getParentCategory(){
        $category = ContentCategory::where(['parent_id'=>0])->get();
        $data = array();
        foreach ($category as $myList)
		{
			$row = array();
			$row['category'] = $myList->title;
			$row['image'] = $myList->image;
			$data[] = $row;
		}
        $output = array("data" => $data);
		echo json_encode($output);
    }
}
