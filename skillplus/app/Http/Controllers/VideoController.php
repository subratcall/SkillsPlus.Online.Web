<?php

namespace App\Http\Controllers;

use App\Models\ContentPart;
use App\Models\Sell;
use Illuminate\Support\Facades\Session;

class VideoController extends Controller
{
    ## User Section ##
    public function stream($id){
       // global $user;
        /* if(!$user)
            return back()->with('msg',trans('admin.login_to_play_video')); */

          //  echo 0;exit;
        $part = ContentPart::with('content')->where('mode','publish')->find($id);
        //dd(!$user); exit;
        if(!$part){

            echo 1;exit;
            abort(404);
        }

        //if($part->free == 0 && $user['id'] != $part->content->user_id) {
            if($part->free == 0 && Session::get('user_id') != $part->content->user_id) {
                $sell = Sell::where('buyer_id', Session::get('user_id'))->where('content_id', $part->content->id)->count();
                //$sell = Sell::where('buyer_id', $user['id'])->where('content_id', $part->content->id)->count();
            if ($sell == 0){

                echo 2;exit;
                abort(404); 
            }
        }

        $meta =$part->upload_video;
 
        return view('view.product.productsdsdsds');

    }
}
