<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slider extends Model
{
    use HasFactory;
    use softDeletes;
    protected $table = "sliders";
    protected $fillable = [
        "image", "name","title", "short_description","status","species"
    ];
    protected $primaryKey = 'id';
}
