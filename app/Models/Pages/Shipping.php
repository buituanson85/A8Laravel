<?php

namespace App\Models\Pages;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shipping extends Model
{
    use HasFactory;
    use softDeletes;

    protected $table = 'shippings';
    protected $fillable = [
        "name","address", "phone","note","email","customer_id"
    ];
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
