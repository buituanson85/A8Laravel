<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index(Request $request){
        $couponsParent = Coupon::get();

        $name = $request->name;
        $coupon_id = $request->coupon_id;

        if (isset($name) && isset($coupon_id)){
            $coupons = Coupon::where('name', 'like','%'.$name.'%')->where('parent', $coupon_id)->paginate(10);
        }elseif (isset($name)){
            $coupons = Coupon::where('name','like','%'.$name.'%')->paginate(10);
        }elseif (isset($coupon_id)){
            $coupons = Coupon::where('parent', $coupon_id)->paginate(10);
        }else{
            $coupons = Coupon::paginate(10);
        }

        return view('admin.administration-product.coupons.index',compact(
            'couponsParent',
            'coupons',
            'coupon_id',
            'name'
        ));
    }

    public function create()
    {
        return view('admin.administration-product.coupons.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'code' => 'required|unique:coupons,code',
            'quantity' => 'required',
            'price' => 'required',
            'features' => 'required'
        ]);

        $coupon = new Coupon();
        $coupon -> name = $request -> name;
        $coupon ->code = $request->code;
        $coupon -> quantity = $request -> quantity;
        $coupon -> price = $request -> price;
        $coupon -> features = $request -> features;
        $coupon->save();
        $request->session()->flash('success', 'Insert coupon success!');
        return redirect(route('coupons.index'));
    }

    public function edit($id)
    {
        $coupon = Coupon::find($id);
        return view('admin.administration-product.coupons.edit', compact('coupon'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required',
            'code' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'features' => 'required'
        ]);

        $coupon = Coupon::find($id);
        $coupon -> name = $request -> name;
        $coupon ->code = $request->code;
        $coupon -> quantity = $request -> quantity;
        $coupon -> price = $request -> price;
        $coupon -> features = $request -> features;
        $coupon->save();
        $request->session()->flash('success', 'Update coupon success!');
        return redirect(route('coupons.index'));
    }

    public function destroy(Request $request,$id){
        Coupon::find($id)->delete();
        $request->session()->flash('success', 'Delete coupon success!');
        return redirect(route('coupons.index'));
    }
}
