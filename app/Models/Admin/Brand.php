<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    use HasFactory;
    use softDeletes;
    protected $table = "brands";
    protected $fillable = [
        "name", "slug","description","status", "parent","image"
    ];
    protected $primaryKey = 'id';

    public function product(){
        return $this->hasOne('App\Models\Admin\Product');
    }
}
