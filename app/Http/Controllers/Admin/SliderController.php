<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Slider;
use Illuminate\Http\Request;
use Image;

class SliderController extends Controller
{
    public function index(){
        $sliders = Slider::all();
        return view('admin.administration-product.sliders.index', compact('sliders'));
    }

    public function create(){
        return view('admin.administration-product.sliders.create');
    }

    public function store(Request $request){
        $sliders = new Slider();
        $sliders -> name = $request ->name;
        $sliders -> status = $request ->status;
        $sliders -> title = $request ->title;
        $sliders -> short_description = $request ->short_description;
        $sliders->species = $request-> species;

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
            $sliders -> image = $msg;
        }

        $sliders->save();
        $request->session()->flash('success', 'Insert Images Success!');

        return redirect(route('sliders.index'));
    }

    public function edit($id)
    {
        $slider = Slider::find($id);
        return view('admin.administration-product.sliders.edit', compact('slider'));
    }

    public function update(Request $request, $id){
        $sliders = Slider::find($id);
        $sliders -> name = $request ->name;
        $sliders -> status = $request ->status;
        $sliders -> title = $request ->title;
        $sliders -> short_description = $request ->short_description;
        $sliders->species = $request-> species;

        if (isset($request->image)){
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
            $sliders -> image = $msg;
        }

        $sliders->save();
        $request->session()->flash('success', 'Update Images Success!');

        return redirect(route('sliders.index'));
    }

    public function destroy(Request $request,$id)
    {
        $slider = Slider::find($id)->delete();
        $request->session()->flash('success', 'Delete Image success!');
        return redirect(route('sliders.index'));
    }

    public function unlockstatustslider(Request $request,$id){
        Slider::find($id)->update (['status'=> "outofstock"]);
        return redirect(route('sliders.index'));
    }
    public function lockstatustslider(Request $request,$id){

        Slider::find($id)->update (['status'=> "instock"]);
        return redirect(route('sliders.index'));
    }

    public function unlockspeciesslider(Request $request,$id){
        Slider::find($id)->update (['species'=> "two"]);
        return redirect(route('sliders.index'));
    }
    public function lockspeciesslider(Request $request,$id){

        Slider::find($id)->update (['species'=> "one"]);
        return redirect(route('sliders.index'));
    }
}
