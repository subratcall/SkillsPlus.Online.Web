<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class ContentLearn extends Model
{
    //use SoftDeletes;

    protected $table = "tbl_content_learn";

    protected $primaryKey = "id";

    public $timestamps = false;

    protected $fillable = [
        'id',
        'content_id',
        'description',
    ];
}


