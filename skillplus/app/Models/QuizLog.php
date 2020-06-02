<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class QuizLog extends Model
{
    //use SoftDeletes;

    protected $table = "quizlog";

    protected $primaryKey = "id";

    public $timestamps = false;

    protected $fillable = [
        'id',
        'timer',
        'question_index',
        'status',
        'userid',
    ];
}


