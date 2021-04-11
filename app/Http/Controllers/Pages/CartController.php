<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Admin\Coupon;
use Illuminate\Http\Request;
use Session;

class CartController extends Controller
{
    public function addCartAjax(Request $request){
        $data = $request->all();
        //print_r($data);
        $session_id = substr(md5(microtime()), rand(0,26),5);
        $cart = Session::get('cart');
        if ($cart == true){
            $is_avaiable = 0;
            foreach($cart as $key => $val){
                if($val['product_id']==$data['cart_product_id']){
                    $is_avaiable++;
                    $cart[$key]['product_qty'] = $cart[$key]['product_qty'] + 1;
                    Session::put('cart',$cart);
                }
            }
            if($is_avaiable == 0){
                $cart[] = array(
                    'session_id' => $session_id,
                    'product_name' => $data['cart_product_name'],
                    'product_id' => $data['cart_product_id'],
                    'product_qty' => $data['cart_product_qty'],
                    'product_image' => $data['cart_product_image'],
                    'product_sale_price' => $data['cart_product_sale_price'],
                    'product_regular_price' => $data['cart_product_regular_price'],
                );
                Session::put('cart',$cart);
            }
        }else{
            $cart[] = array(
                'session_id' => $session_id,
                'product_name' => $data['cart_product_name'],
                'product_id' => $data['cart_product_id'],
                'product_qty' => $data['cart_product_qty'],
                'product_image' => $data['cart_product_image'],
                'product_sale_price' => $data['cart_product_sale_price'],
                'product_regular_price' => $data['cart_product_regular_price']
            );
            Session::put('cart', $cart);
        }
        Session::save();
    }

    public function showCartAjax(){
        return view('pages.shopping-cart.index');
    }

    public function updateCartAjax(Request $request){
        $data = $request->all();
        $cart = Session::get('cart');
        if($cart==true){
            $message = '';

            foreach($data['cart_qty'] as $key => $qty){
                $i = 0;
                foreach($cart as $session => $val){
                    $i++;

                    if($val['session_id']==$key){

                        $cart[$session]['product_qty'] = $qty;
                    }
                }
            }

            Session::put('cart',$cart);
            return redirect()->back()->with('success','Product Has Been Update Successfully');
        }else{
            return redirect()->back()->with('success','Number update failed');
        }
    }
    public function deleteCartAjax($id){
        $cart = Session::get('cart');

        if($cart==true){
            foreach($cart as $key => $val){
                if($val['session_id']==$id){
                    unset($cart[$key]);
                }
            }
            Session::put('cart',$cart);
            return redirect()->back()->with('success','Product Has Been Delete Successfully');

        }else{
            return redirect()->back()->with('success','Product Has Been Delete Failed');
        }
    }

    public function deleteAllAjax(){
        $cart = Session::get('cart');
        if($cart==true){
            // Session::destroy();
            Session::forget('cart');
            Session::forget('coupon');
            return redirect()->back()->with('success','Product Has Been Delete Successfully');
        }
    }


    public function checkCoupon(Request $request){
        $data = $request->all();
        $coupon = Coupon::where('code', $request->coupon)->first();
        if ($coupon){
            $coupon_coupon = $coupon->count();
            if (($coupon_coupon > 0)){
                $coupon_session = Session::get('coupon');
                if ($coupon_session == true){
                    $is_avaiable = 0;
                    if ($is_avaiable == 0){
                        $cou[] = array(
                            'coupon_code' => $coupon->code,
                            'coupon_features' => $coupon->features,
                            'coupon_price' => $coupon->price
                        );
                        Session::put('coupon', $cou);
                    }
                }else{
                    $cou[] = array(
                        'coupon_code' => $coupon->code,
                        'coupon_features' => $coupon->features,
                        'coupon_price' => $coupon->price
                    );
                    Session::put('coupon', $cou);
                }
                Session::save();
                return redirect()->back()->with('success_coupon','Successfully added discount code');
            }
        }else{
            return redirect()->back()->with('error','Coupon code is not correct');
        }
    }

    public function deleteCoupon(){
        $coupon = Session::get('coupon');
        if ($coupon == true){
            Session::forget('coupon');
            return redirect()->back()->with('success','Successfully delete discount code');
        }
    }
}
