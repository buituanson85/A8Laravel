<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use HasFactory;
    protected $table = "payment";
    protected $fillable = [
        "p_transaction_id", "p_user_id","p_money","p_note", "p_vnp_response_code","p_code_vnpay","p_code_bank","p_time","p_trasaction_code"
    ];
    protected $primaryKey = 'id';
}
