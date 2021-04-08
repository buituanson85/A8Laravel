<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use softDeletes;

    protected $table = 'products';
    protected $fillable = [
        "name","slug", "short_description","description","regular_price","sale_price", "SKU", "status", "featured","quantity","image","category_id","user_id","brand_id"
    ];
    public function category(){
        return $this->belongsTo('App\Models\Admin\Category');
    }
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function galaxy(){
        return $this->hasOne('App\Models\Admin\Galaxy');
    }
    public function brand(){
        return $this->belongsTo('App\Models\Admin\Brand');
    }
}
