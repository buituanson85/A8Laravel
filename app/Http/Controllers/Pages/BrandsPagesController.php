<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Admin\Brand;
use App\Models\Admin\Product;
use Illuminate\Http\Request;

class BrandsPagesController extends Controller
{
    public function show($id)
    {
        $brand_name = Brand::find($id);
        $products_brand_slider = Product::where('brand_id', $id)->take(10)->get();
        $products_brand = Product::where('brand_id', $id)->orderBy('id','desc')->paginate(24);
        return view('pages.brands.index', compact('brand_name','products_brand_slider', 'products_brand'));
    }
}
