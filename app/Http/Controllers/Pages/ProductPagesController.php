<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Admin\Galaxy;
use App\Models\Admin\Product;
use Illuminate\Http\Request;

class ProductPagesController extends Controller
{
    public function index()
    {
        $products_slider = Product::take(10)->get();
        $products = Product::orderBy('id','desc')->paginate(24);
        return view('pages.shop-products.index', compact('products_slider', 'products'));
    }

    public function show($id)
    {
        $product_show = Product::find($id);
        $images_galaxy = Galaxy::where('product_id', $id)->get();
        $product_related = Product::where('category_id', $product_show->category_id)->get();
        return view('pages.single-product.index', compact('product_show', 'images_galaxy','product_related'));
    }
}
