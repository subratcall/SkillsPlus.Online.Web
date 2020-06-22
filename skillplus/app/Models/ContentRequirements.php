<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class ContentRequirements extends Model
{
    //use SoftDeletes;

    protected $table = "tbl_contents_requirements";

    protected $primaryKey = "id";

    public $timestamps = false;

    protected $fillable = [
        'id',
        'content_id',
        'requirement',
    ];
}


