<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galaxy extends Model
{
    use HasFactory;
    protected $table = "galaxies";

    protected $fillable = [
        "image", "name","product_id"
    ];
    public function product(){
        return $this->belongsTo('App\Models\Admin\Product');
    }
}
