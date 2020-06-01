<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class CourseLog extends Model
{
    //use SoftDeletes;

    protected $table = "course_log";

    protected $primaryKey = "id";

    public $timestamps = false;

    protected $fillable = [
        'id',
        'content_id',
        'lesson_id',
        'question_id',
        'answer',
        'doneQuestion',
        'doneLesson',
        'doneCourse',
        'points',
        'submittedBy',
        'status',
    ];
}


