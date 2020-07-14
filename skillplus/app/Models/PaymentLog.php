<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentLog extends Model
{
    //use SoftDeletes;

    protected $table = "tbl_payment_log";

    protected $primaryKey = "id";

    public $timestamps = false;

    protected $fillable = [
        'id',
        'transaction_code',
        'course_id',
        'transaction_status',
        'channel_response_code',
        'channel_response_desc',
        'version',
        'merchant_id',
        'currency',
        'amount',
        'hash_value',
        'given_amt',
        'transaction_ref',
        'approval_code',
        'eci',
        'transaction_datetime',
        'payment_channel',
        'masked_pan',
        'backend_invoice',
        'payment_scheme',
        'process_by',
        'card_type',
    ];
}


