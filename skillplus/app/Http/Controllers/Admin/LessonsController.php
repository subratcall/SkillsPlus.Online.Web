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
        $list = ContentCategory::withCount('contents','childs','filters')->where('parent_id','0')->get();
        return view('admin.content.lesson',array('lists'=>$list));
    }
    
}
