<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Galaxy;
use App\Models\Admin\Product;
use Illuminate\Http\Request;
use Image;

class GalaxyController extends Controller
{
    public function store(Request $request, $id)
    {

        $request->validate([
            'images' =>'required',
            'images.*' =>'image|mimes:png,jpg,gif,jpeg'
        ]);

        if($request->hasFile('images'))
        {
            foreach($request->images as $image)
            {

                $imageName = $image->getClientOriginalName();
                $imageName = time().".".$imageName;
                $image_resize = Image::make($image->getRealPath());
                $image_resize->resize(300,300);
                $image_resize->save(public_path('assets/uploads/galaxy/'.$imageName));
                $image->storeAs('galaxies', $imageName);

                $galaxys = new Galaxy();
                $galaxys-> image = $imageName;
                $galaxys->product_id = $id;
                $galaxys->save();
            }
        }

        return back()->with("success","Uploaded Success");
    }

    public function galaxys($id){
        $galaxys = Galaxy::where('product_id', $id)->paginate(5);
        $product = Product::find($id);
        return view('admin.administration-product.products.galaxys', compact('galaxys','product'));
    }
}
