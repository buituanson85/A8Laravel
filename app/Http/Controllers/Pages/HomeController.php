<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Admin\Brand;
use App\Models\Admin\Category;
use App\Models\Admin\Product;
use App\Models\Admin\SliderBanners;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $brands = Brand::get();
        $categories_table = Category::take(5)->get();
        $products_table = Product::all();
        $sliderBanner = SliderBanners::all();

        return view('pages.home', compact('brands', 'categories_table','products_table', 'sliderBanner'));
    }

    public function profile($id){
        return view('profile.show');
    }
}
