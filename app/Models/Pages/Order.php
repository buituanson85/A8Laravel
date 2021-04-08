<?php

namespace App\Models\Pages;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory;
    use softDeletes;

    public $timestamps = true;
    protected $table = "orders";
    protected $fillable = [
        "customer_id","shipping_id", "payment_id", "total", "status","created_at"
    ];
}
