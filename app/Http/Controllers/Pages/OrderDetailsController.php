<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderDetailsController extends Controller
{
    public function index(){
        $id = \Auth::user()->id;
        $get_all_datas = DB::table('order_details')
            ->join('orders','orders.order_id','=','order_details.order_id')
            ->join('payments','orders.payment_id','=','payments.id')
            ->select('orders.*','order_details.*','payments.method')
            ->where('orders.customer_id',$id)
            ->orderBy('orders.order_id', 'desc')
            ->get();
        return view('pages.order-details.index', compact('get_all_datas'));
    }

    public function destroy(Request $request, $id){
        DB::table('order_details')->where('order_id', $id)->delete();
        return redirect(route('pages.showcartajax'));
    }
}
