<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LessonType extends Model
{
    protected $table = 'lessons';
    protected $fillable = ['lesson','description',];
    public $timestamps = false;
}
