<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class ContentClass extends Model
{
    //use SoftDeletes;

    protected $table = "tbl_class";

    protected $primaryKey = "id";

    public $timestamps = false;

    protected $fillable = [
        'id',
        'code',
        'title',
        'startDate',
        'dueDate',
        'lesson_id',
        'lesson_title',
        'user_id',
    ];
}


