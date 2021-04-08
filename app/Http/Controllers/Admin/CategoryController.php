<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $categoriesParent = Category::get();

        $name = $request->name;
        $category_id = $request->category_id;

        if (isset($name) && isset($category_id)){
            $categories = Category::where('name', 'like','%'.$name.'%')->where('parent', $category_id)->paginate(10);
        }elseif (isset($name)){
            $categories = Category::where('name','like','%'.$name.'%')->paginate(10);
        }elseif (isset($category_id)){
            $categories = Category::where('parent', $category_id)->paginate(10);
        }else{
            $categories = Category::paginate(10);
        }

        return view('admin.administration-product.categories.index',compact(
            'categoriesParent',
            'categories',
            'category_id',
            'name'
        ));
    }

    public function create()
    {
        $categories = Category::where('parent', 0)->get();
        return view('admin.administration-product.categories.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|unique:categories,name',
            'description' => 'required',
            'status' => 'required'
        ]);

        $category = new Category();
        $category -> name = $request -> name;
        $category ->slug = $request->slug;
        $category -> description = $request -> description;
        $category -> status = $request -> status;
        $category -> parent = $request -> parent;
        $category -> icon = $request -> icon;
        $category->save();
        $request->session()->flash('success', 'Insert category success!');
//        return response()->json(['success'=>'Category saved successfully.']);
        return redirect(route('categories.index'));
    }

    public function edit($id)
    {
        $categories = Category::where('parent', 0)->get();
        $category = Category::find($id);
        return view('admin.administration-product.categories.edit', compact('categories','category'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required',
            'description' => 'required'
        ]);
        $category = Category::find($id);

        $category -> name = $request -> name;
        $category ->slug = $request->slug;
        $category -> description = $request -> description;
        $category -> status = $request -> status;
        $category -> parent = $request -> parent;
        $category -> icon = $request -> icon;
        $category->save();
        $request->session()->flash('success', 'Update category success!');

        return redirect(route('categories.index'));
    }

    public function destroy(Request $request,$id){
        Category::find($id)->delete();
        $request->session()->flash('success', 'Delete category success!');
        return redirect(route('categories.index'));
    }

    public function unlockstatustcategory(Request $request,$id){
        $category = Category::find($id);
        Category::where('id', $id)->update (['status'=> "outofstock"]);
        $request->session()->flash('success', 'Update instock category success!');
        return redirect(route('categories.index'));
    }
    public function lockstatustcategory(Request $request,$id){
        $category = Category::find($id);
        Category::where('id', $id)->update (['status'=> "instock"]);
        $request->session()->flash('success', 'Update instock category success!');
        return redirect(route('categories.index'));
    }
}
