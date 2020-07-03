<?php

namespace App\Http\Controllers\Admin_user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Sell;
use App\Models\Content;
use App\Models\ContentPart;

class ContentController extends Controller
{
    //

    public function product($id) {
     error_reporting(0);

        global $user;
        $buy = Sell::where('buyer_id',$user['id'])->where('content_id',$id)->count();
        $product = Content::withCount(['comments'=>function($q){
            $q->where('mode','publish');
        }])->with(['discount','category'=>function($c) use($id){
            $c->with(['discount'=>function($dc) use($id){
                $dc->where('off_id',Content::find($id)->category->id);
            }]);
        },'rates','user'=>function($u){
            $u->with(['usermetas','point','contents'=>function($cQuery){
                $cQuery->where('mode','publish')->limit(3);
            }]);
        },'metas','parts'=>function($query){
            $query->where('mode','publish')->orderBy('sort');
        },'favorite'=>function($fquery) use ($user){
            $fquery->where('user_id',$user['id']);
        },'comments'=>function($ccquery) use($id){
            $ccquery->where('mode','publish')->with(['user'=>function($uquery) use($id){
                $uquery->with(['category','usermetas'])->withCount(['buys'=>function($buysq) use($id){
                    $buysq->where('content_id',$id);
                },'contents'=>function($contentq) use($id){
                    $contentq->where('id',$id);
                }]);
            },'childs'=>function($cccquery) use($id) {
                $cccquery->where('mode', 'publish')->with(['user'=>function($cuquery) use($id){
                    $cuquery->with(['category','usermetas'])->withCount(['buys'=>function($buysq) use($id){
                        $buysq->where('content_id',$id);
                    },'contents'=>function($contentq) use($id){
                        $contentq->where('id',$id);
                    }]);
                }]);
            }]);
        },'supports'=>function($q) use ($user){
            $q->with(['user.usermetas','supporter.usermetas','sender.usermetas'])->where('sender_id',$user['id'])->where('mode','publish')->orderBy('id','DESC');
        }])->where(function ($where){
            $where->where('mode','publish');
        })->find($id);

        if(!$product)
            return abort(404);

        ## Update View
        $product->increment('view');

        if($product->price == 0 && $user)
            $buy = 1;

        $subscribe = false;
        if(isset($buy->tupe) && $buy->type == 'subscribe' && $buy->remain_time - time()) {
            $buy        = 0;
            $subscribe  = true;
        }

        if(!$product)
            return abort(404);

        $meta = arrayToList($product->metas,'option','value');
        $parts = $product->parts->toArray();
        $rates = getRate($product->user->toArray());



        ## Get Related Content ##
        $relatedCat = $product->category_id;
        $relatedContent = Content::with(['metas'])->where('category_id',$relatedCat)->where('id','<>',$product->id)->where('mode','publish')->limit(3)->inRandomOrder()->get();


        ## Get PreCourse Content ##
        if(isset($meta['precourse']))
            $preCourseIDs = explode(',',rtrim($meta['precourse'],','));
        else
            $preCourseIDs = [];
        $preCousreContent = Content::where('mode','publish')->whereIn('id',$preCourseIDs)->get();


        if(!cookie('cv'.$id)) {
            $product->increment('view');
            setcookie('cv'.$id,'1');
        }

        $data = ['product'=>$product,'meta'=>$meta,'parts'=>$parts,'rates'=>$rates,'buy'=>$buy,'related'=>$relatedContent,'precourse'=>$preCousreContent,'subscribe'=>$subscribe];
       
        return response()->json($data);
    }

    public function readFullLesson($cid) {

     $contentPart = ContentPart::where("id", $cid)->get();

return view("/admin_user/lesson/index", compact(array("contentPart")));
    }
    
}
