<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentLog extends Model
{
    //use SoftDeletes;

    protected $table = "tlb_payment_log";

    protected $primaryKey = "id";

    public $timestamps = false;

    protected $fillable = [
        'id',
        'transaction_code',
        'course_id',
    ];
}


