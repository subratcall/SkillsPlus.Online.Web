<?php

namespace App\Http\Controllers\Api;

use App\Models\Content;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ContentVip;


class ApiController extends Controller
{
    public function functionList(){
        echo '<ul>';
        echo '<li><a href="#">Content</a></li>';
        echo '<li><a href="#">index</a></li>';
        echo '</ul>';
    }

    ## Index Page ##
    public function functionIndex(){
        $result = [];
        $result['new_content'] = Content::with('metas')->where('mode','publish')->limit(15)->orderBy('id','DESC')->get();
        $result['popular_content'] = Content::with('metas')->where('mode','publish')->limit(15)->orderBy('view','DESC')->get();
        $result['vip_content'] = ContentVip::with('content')->where('mode','publish')->where('first_date','<',time())->where('last_date','>',time())->limit(15)->get();


        return $result;
    }


    ## Content Section ##
    public function contents($last = 0){
        return Content::with('metas')
            ->where('mode','publish')
            ->where('id','>',$last)
            ->orderBy('id','DESC')
            ->take(20)
            ->get();
    }


}
