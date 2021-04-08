<?php

namespace App\Models\Pages;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    public $timestamps = true;
    protected $table = "order_details";
    protected $fillable = [
        "order_id","product_id", "product_name", "product_image", "product_price","product_sale_qty","created_at"
    ];
}
