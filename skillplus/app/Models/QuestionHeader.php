<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class QuestionHeader extends Model
{
    //use SoftDeletes;

    protected $table = "question_header";

    protected $primaryKey = "id";

    public $timestamps = false;

    protected $fillable = [
        'id',
        'title',
        'timer',
        'content_id',
        'lesson_id',
    ];
}


