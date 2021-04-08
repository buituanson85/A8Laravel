<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\Product;
use Illuminate\Http\Request;

class CategoryPagesController extends Controller
{
    public function show($id)
    {
        $category_name = Category::find($id);
        $products_category_slider = Product::where('category_id', $id)->take(10)->get();
        $products_category = Product::where('category_id', $id)->orderBy('id','desc')->paginate(24);
        return view('pages.categories.index', compact('category_name','products_category_slider', 'products_category'));
    }
}
