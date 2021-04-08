<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Brand;
use App\Models\Admin\Category;
use App\Models\Admin\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::get();

        $name = $request->name;
        $category_id = $request->category_id;

        if (isset($name) && isset($category_id)){
            $products = Product::where('name', 'like','%'.$name.'%')->where('category_id', $category_id)->paginate(10);
        }elseif (isset($name)){
            $products = Product::where('name','like','%'.$name.'%')->paginate(10);
        }elseif (isset($category_id)){
            $products = Product::where('category_id', $category_id)->paginate(10);
        }else{
            $products = Product::paginate(10);
        }

        return view('admin.administration-product.products.index',compact(
            'products',
            'categories',
            'category_id',
            'name'
        ));
    }

    public function create()
    {
        $categories = Category::get();
        $brands = Brand::all();
        return view('admin.administration-product.products.create', compact('categories', 'brands'));
    }

    public function store(Request $request)
    {
//        $this->validate($request,[
//            'name' => 'required|unique:products,name',
//            'short_description' => 'required',
//            'description' => 'required',
//            'status' => 'required',
//            'regular_price' => 'required|integer',
//            'sale_price' => 'required|integer',
//            'SKU' => 'required',
//            'featured' => 'required',
//            'quantity' => 'required|integer',
//            'category_id' => 'required',
//            'brand_id' => 'required',
//            'user_id' => 'required',
//            'image' => 'required',
//            'images.*' =>'image|mimes:png,jpg,gif,jpeg'
//        ]);

        $product = new Product();
        $product -> name = $request ->name;
        $product -> short_description = $request ->short_description;
        $product -> description = $request ->description;
        $product -> regular_price = $request ->regular_price;
        $product -> sale_price = $request ->sale_price;
        $product -> slug = $request ->slug;
        $product -> status = $request ->status;
        $product -> featured = $request ->featured;
        $product -> quantity = $request ->quantity;
        $product -> category_id = $request ->category_id;
        $product -> brand_id = $request ->brand_id;
        $product -> user_id = Auth::user()->id;

        $image_resize = "";
        if ($request ->image != null){
            $images = $request->image;
            $imageName = $images->getClientOriginalName();
            $imageName = time().".".$imageName;
            $image_resize = Image::make($images->getRealPath());
            $image_resize->resize(300,300);
            $image_resize->save(public_path('assets/uploads/products/'.$imageName));
            $request->image->storeAs('products', $imageName);
            $product -> image = $imageName;
        }

        $product->save();
        $request->session()->flash('success', 'Insert Product Success!');

        return redirect(route('products.index'));
    }

    public function show($id)
    {
        $product = Product::find($id);
        return view('admin.administration-product.products.show', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::get();
        if ($product->user_id === Auth::user()->id){
            return view('admin.administration-product.products.edit', compact('product', 'categories'));
        }else{
            return redirect(route('products.index'));
        }
    }

    public function update(Request $request, $id)
    {
//        $this->validate($request,[
//            'name' => 'required|unique:products,name',
//            'short_description' => 'required',
//            'description' => 'required',
//            'status' => 'required',
//            'regular_price' => 'required|integer',
//            'sale_price' => 'required|integer',
//            'SKU' => 'required',
//            'featured' => 'required',
//            'quantity' => 'required|integer',
//            'category_id' => 'required',
//            'user_id' => 'required'
//        ]);

        $product = Product::find($id);
        $product -> name = $request ->name;
        $product -> short_description = $request ->short_description;
        $product -> description = $request ->description;
        $product -> regular_price = $request ->regular_price;
        $product -> sale_price = $request ->sale_price;
        $product -> slug = $request ->slug;
        $product -> status = $request ->status;
        $product -> featured = $request ->featured;
        $product -> quantity = $request ->quantity;
        $product -> category_id = $request ->category_id;
        $product -> brand_id = $request ->brand_id;
        $product -> user_id = Auth::user()->id;

        $image_resize = "";
        if ($request ->image != null){
            $images = $request->image;
            $imageName = $images->getClientOriginalName();
            $imageName = time().".".$imageName;
            $image_resize = Image::make($images->getRealPath());
            $image_resize->resize(300,300);
            $image_resize->save(public_path('assets/uploads/products/'.$imageName));
            $request->image->storeAs('products', $imageName);
            $product -> image = $imageName;

        }

        $product->save();
        $request->session()->flash('success', 'Update Product Success!');

        return redirect(route('products.index'));
    }

    public function destroy(Request $request,$id)
    {
        $product = Product::find($id)->delete();
//        unlink(public_path('assets/uploads/products').'/'.$product->image);
        $request->session()->flash('success', 'Delete product success!');
        return redirect(route('products.index'));
    }

    public function unlockstatustproduct(Request $request,$id){
        Product::find($id)->update (['status'=> "outofstock"]);
        return redirect(route('products.index'));
    }
    public function lockstatustproduct(Request $request,$id){

        Product::find($id)->update (['status'=> "instock"]);
        return redirect(route('products.index'));
    }
}
