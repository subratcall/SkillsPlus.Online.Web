<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Options extends Model
{
    //
    protected $table = "options";
    protected $hidden = [
      "id"
    ];
    protected $fillable = [
     "question_id",
     "description",
     "is_correct",
     "created_at",
     "updated_at"
    ];

    protected $visible = [
     "question_id",
     "description",
     "is_correct",
     "created_at",
     "updated_at"
    ];
}
