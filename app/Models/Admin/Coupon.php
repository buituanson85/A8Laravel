<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coupon extends Model
{
    use HasFactory;
    use softDeletes;
    protected $table = "coupons";
    protected $fillable = [
        "name", "code","quantity","price", "features"
    ];
    protected $primaryKey = 'id';
}
