<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class Questions extends Model
{
    //use SoftDeletes;

    protected $table = "question";

    protected $primaryKey = "id";

    public $timestamps = false;

    protected $fillable = [
        "id",
        'question',
        'type',
        'options',
        'answer',
        'deleted_at',
        'created_by',
        'created_dt',
        'updated_by',
        'updated_dt',
        'hint',
        'correctremarks',
        'attachment',
        'timelimit',
        'points'
    ];
}


