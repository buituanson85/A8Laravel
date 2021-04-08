<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index(Request $request)
    {
        $brandsParent = Brand::get();

        $name = $request->name;
        $brand_id = $request->brand_id;

        if (isset($name) && isset($brand_id)){
            $brands = Brand::where('name', 'like','%'.$name.'%')->where('parent', $brand_id)->paginate(10);
        }elseif (isset($name)){
            $brands = Brand::where('name','like','%'.$name.'%')->paginate(10);
        }elseif (isset($category_id)){
            $brands = Brand::where('parent', $brand_id)->paginate(10);
        }else{
            $brands = Brand::paginate(10);
        }

        return view('admin.administration-product.brands.index',compact(
            'brandsParent',
            'brands',
            'brand_id',
            'name'
        ));
    }

    public function create()
    {
        $brands = Brand::where('parent', 0)->get();
        return view('admin.administration-product.brands.create', compact('brands'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|unique:brands,name',
            'description' => 'required',
            'status' => 'required'
        ]);

        $brand = new Brand();
        $brand -> name = $request -> name;
        $brand ->slug = $request->slug;
        $brand -> description = $request -> description;
        $brand -> status = $request -> status;
        $brand -> parent = $request -> parent;

        if ($request ->image != null){
            $image = base64_encode(file_get_contents($_FILES['image']['tmp_name']));

            $options = array('http' =>array(
                'method' => "POST",
                'header' => "Authorization: Bearer 3597bf9393d8155003c84329d6205961426482fc\n".
                    "Content-Type: application/x-www-form-urlencoded",
                'content' => $image
            ));
            $context = stream_context_create($options);
            $imgurURL = "https://api.imgur.com/3/image";

            $response = file_get_contents($imgurURL, false, $context);
            $response = json_decode($response);
            $msg = $response->data->link;
            $brand -> image = $msg;
        }
        $brand->save();
        $request->session()->flash('success', 'Insert Brands success!');
        return redirect(route('brands.index'));
    }

    public function edit($id)
    {
        $brands = Brand::where('parent', 0)->get();
        $brand = Brand::find($id);
        return view('admin.administration-product.brands.edit', compact('brands','brand'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required',
            'description' => 'required'
        ]);
        $brand = Brand::find($id);

        $brand -> name = $request -> name;
        $brand ->slug = $request->slug;
        $brand -> description = $request -> description;
        $brand -> status = $request -> status;
        $brand -> parent = $request -> parent;

        if ($request ->image != null){
            $image = base64_encode(file_get_contents($_FILES['image']['tmp_name']));

            $options = array('http' =>array(
                'method' => "POST",
                'header' => "Authorization: Bearer 3597bf9393d8155003c84329d6205961426482fc\n".
                    "Content-Type: application/x-www-form-urlencoded",
                'content' => $image
            ));
            $context = stream_context_create($options);
            $imgurURL = "https://api.imgur.com/3/image";

            $response = file_get_contents($imgurURL, false, $context);
            $response = json_decode($response);
            $msg = $response->data->link;
            $brand -> image = $msg;
        }
        $brand->save();
        $request->session()->flash('success', 'Update Brand Success!');

        return redirect(route('brands.index'));
    }

    public function destroy(Request $request,$id){
        Brand::find($id)->delete();
        $request->session()->flash('success', 'Delete Brands Success!');
        return redirect(route('brands.index'));
    }

    public function unlockstatustbrand(Request $request,$id){
        $brand = Brand::find($id);
        Brand::where('id', $id)->update (['status'=> "outofstock"]);
        $request->session()->flash('success', 'Update instock brand success!');
        return redirect(route('brands.index'));
    }
    public function lockstatustbrand(Request $request,$id){
        $brand = Brand::find($id);
        Brand::where('id', $id)->update (['status'=> "instock"]);
        $request->session()->flash('success', 'Update instock brand success!');
        return redirect(route('brands.index'));
    }
}
