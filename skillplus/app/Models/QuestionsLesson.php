<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class QuestionsLesson extends Model
{
    //use SoftDeletes;

    protected $table = "lesson_with_question";

    protected $primaryKey = "id";

    public $timestamps = false;

    protected $fillable = [
        "id",
        'question_id',
        'lesson_id',
    ];
}


