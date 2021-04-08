<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pages\Order;
use App\Models\Pages\OrderDetails;
use App\Models\Pages\Shipping;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index(){
        $orders = DB::table('orders')
            ->join('payments','orders.payment_id','=','payments.id')
            ->select('orders.*','payments.method')
            ->orderBy('order_id','desc')->get();

        return view('admin.administration-order-details.orders.index', compact('orders'));
    }

    public function show($id){
        $order_details = OrderDetails::where('order_id', $id)->get();
        $orders = Order::where('order_id', $id)->get();
        foreach ($orders as $key => $val){
            $customer_id = $val->customer_id;
            $shipping_id = $val->shipping_id;
        }
        $customer = User::where('id', $customer_id)->first();
        $shipping = Shipping::where('id',$shipping_id )->first();

        return view('admin.administration-order-details.orders.view', compact('order_details','customer', 'shipping'));
    }

    public function orderDetailsDelivering(Request $request){
        $id = $request->order_id;
        $order = DB::table('orders')->where('order_id', $id)->first();
        $data = array();
        if ($order->status == 0){
            $data['customer_id'] = $request->customer_id;
            $data['shipping_id'] = $request->shipping_id;
            $data['total'] = $request->total;
            $data['status'] = 1;
        }else{
            $data['customer_id'] = $request->customer_id;
            $data['shipping_id'] = $request->shipping_id;
            $data['total'] = $request->total;
            $data['status'] = 2;
        }

        DB::table('orders')->where('order_id', $id)->update($data);

        return redirect(route('orders.index'));
    }

    public function destroy(Request $request, $id){
        DB::table('orders')->where('order_id', $id)->delete();
        return redirect(route('dashboard.index'));
    }

}
