<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseReview extends Model
{
    //
    protected $table = 'content_reviews';

    protected $visible = [
     "tbl_contents_id",
     "tbl_user_id",
     "comments",
     "created_at"
    ];
}
