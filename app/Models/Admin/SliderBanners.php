<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SliderBanners extends Model
{
    use HasFactory;
    use softDeletes;
    protected $table = "slider_banners";
    protected $fillable = [
        "image", "name","regular_price","sale_price","title_one","title_two","title_three","status"
    ];
    protected $primaryKey = 'id';
}
