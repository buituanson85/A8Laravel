<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\SliderBanners;
use Illuminate\Http\Request;

class SliderBannerController extends Controller
{
    public function index(){
        $sliderbanners = SliderBanners::all();
        return view('admin.administration-product.sliderbanner.index', compact('sliderbanners'));
    }

    public function create(){
        return view('admin.administration-product.sliderbanner.create');
    }

    public function store(Request $request){
        $slidersbanner = new SliderBanners();
        $slidersbanner -> name = $request ->name;
        $slidersbanner -> status = $request ->status;
        $slidersbanner -> title_one = $request ->title_one;
        $slidersbanner -> title_two = $request ->title_two;
        $slidersbanner -> title_three = $request ->title_three;
        $slidersbanner -> regular_price = $request ->regular_price;
        $slidersbanner -> sale_price = $request ->sale_price;

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
            $slidersbanner -> image = $msg;
        }

        $slidersbanner->save();
        $request->session()->flash('success', 'Insert Slider Banner Success!');

        return redirect(route('sliderbanner.index'));
    }

    public function edit($id)
    {
        $sliderbanner = SliderBanners::find($id);
        return view('admin.administration-product.sliderbanner.edit', compact('sliderbanner'));
    }

    public function update(Request $request, $id){
        $slidersbanner = SliderBanners::find($id);
        $slidersbanner -> name = $request ->name;
        $slidersbanner -> status = $request ->status;
        $slidersbanner -> title_one = $request ->title_one;
        $slidersbanner -> title_two = $request ->title_two;
        $slidersbanner -> title_three = $request ->title_three;
        $slidersbanner -> regular_price = $request ->regular_price;
        $slidersbanner -> sale_price = $request ->sale_price;

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
            $slidersbanner -> image = $msg;
        }

        $slidersbanner->save();
        $request->session()->flash('success', 'Update Slider Banner Success!');

        return redirect(route('sliderbanner.index'));
    }

    public function destroy(Request $request,$id)
    {
        $sliderbanner = SliderBanners::find($id)->delete();
        $request->session()->flash('success', 'Delete Slider Banner success!');
        return redirect(route('sliderbanner.index'));
    }

    public function unlockstatustsliderbanner(Request $request,$id){
        SliderBanners::find($id)->update (['status'=> "outofstock"]);
        return redirect(route('sliderbanner.index'));
    }
    public function lockstatustsliderbanner(Request $request,$id){

        SliderBanners::find($id)->update (['status'=> "instock"]);
        return redirect(route('sliderbanner.index'));
    }
}
