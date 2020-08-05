<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class ContentClassTrainors extends Model
{
    //use SoftDeletes;

    protected $table = "tbl_class_trainers";

    protected $primaryKey = "id";

    public $timestamps = false;

    protected $fillable = [
        'id',
        'class_id',
        'user_id',
        'name',
    ];
}


