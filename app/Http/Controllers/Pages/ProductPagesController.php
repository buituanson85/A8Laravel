<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\Galaxy;
use App\Models\Admin\Product;
use Illuminate\Http\Request;

class ProductPagesController extends Controller
{
    public function index(Request $request)
    {
        $products_slider = Product::take(10)->get();
        $categories = Category::get();
        $name = $request->name;
        $categories_id = $request->categories_id;

        if (isset($name) && isset($categories_id)){
            $products = Product::where('name', 'like','%'.$name.'%')->where('category_id', $categories_id)->paginate(10);
        }elseif (isset($name)){
            $products = Product::where('name','like','%'.$name.'%')->paginate(24);
        }elseif (isset($categories_id)){
            $products = Product::where('category_id', $categories_id)->paginate(24);
        }else{
            $products = Product::orderBy('id','desc')->paginate(24);
        }

        return view('pages.shop-products.index', compact(
            'products_slider',
            'categories',
            'categories_id',
            'products'
        ));
    }

    public function show($id)
    {
        $product_show = Product::find($id);
        $images_galaxy = Galaxy::where('product_id', $id)->get();
        $product_related = Product::where('category_id', $product_show->category_id)->get();
        return view('pages.single-product.index', compact('product_show', 'images_galaxy','product_related'));
    }
}
