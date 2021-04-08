<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Mail\SendMail;

use App\Models\Pages\Payment;
use App\Models\Pages\Shipping;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Session;
use Illuminate\Support\Str;
use evn;

class CheckOutController extends Controller
{
    public function index(){
        return view('pages.checkout.index');
    }

    public function saveCheckout(Request $request){
        $data = array();
        $data['customer_name'] = $request->name;
        $data['email'] = $request->email;
        $data['address'] = $request->address;
        $data['customer_phone'] = $request->phone;
        $data['note'] = $request->note;
        $data['customer_id'] = \Auth::user()->id;
        $shipping_id = DB::table('shippings')->insertGetId($data);
        \Session::put('shipping_id', $shipping_id);

        return redirect(route('pages.payment'));

    }
    public function payment(){
        $shipping_id = \Session::get('shipping_id');
        $shipping = Shipping::find($shipping_id);
        return view('pages.payment.index', compact('shipping'));
    }

    public function changePayment(){
        Session::forget('shipping_id');
        return view('pages.checkout.index');
    }

    public function orderPlace(Request $request){
        $cart = Session::get('cart');
        $total = 0;
        if ($cart == true){
            foreach($cart as $key => $val){
                $total += $val['product_qty']*$val['product_sale_price'];
            }
            if ($request->payment_option == "CASH"){
                //insert payment method
                $data = array();
                $data['method'] = $request->payment_option;
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $data['created_at'] = now();
                $payment_id = DB::table('payments')->insertGetId($data);

                //insert order

                $order_data = array();
                $order_data['customer_id'] = \Auth::user()->id;
                $order_data['shipping_id'] = \Session::get('shipping_id');
                $order_data['payment_id'] = $payment_id;
                $order_data['total'] = $total;
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $order_data['created_at'] = now();
                $order_data_id = DB::table('orders')->insertGetId($order_data);

                //insert order_details
                foreach($cart as $key => $val){
                    $order_details_data = array();
                    $order_details_data['order_id'] = $order_data_id;
                    $order_details_data['product_id'] = $val['product_id'];
                    $order_details_data['product_name'] = $val['product_name'];
                    $order_details_data['product_image'] = $val['product_image'];
                    $order_details_data['product_price'] = $val['product_sale_price'];
                    $order_details_data['product_sale_qty'] = $val['product_qty'];
                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                    $order_details_data['created_at'] = now();
                    $order_details_data_id = DB::table('order_details')->insert($order_details_data);
                }
            $now = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y H:i:s');
            $title_mail = "Thanks You!";
            $email = Auth::user()->email;
            $date = "Date: ".''.$now;
            $details = [
                'title' => $title_mail,
                'body' => 'Order Success! Thank you for purchasing our product.',
                'date' => $date
            ];

            Mail::to($email)->send(new SendMail($details));
            Session::forget('cart');
            $get_all = DB::table('orders')
                ->join('users','orders.customer_id','=','users.id')
                ->join('shippings','orders.shipping_id','=','shippings.id')
                ->join('payments','orders.payment_id','=','payments.id')
                ->select('orders.*','users.name','shippings.*','payments.method')
                ->where('orders.order_id',$order_data_id)
                    ->first();
            return view('pages.payment.handcash', compact('get_all'));
            }else{
                return view('pages.vnpay.index',compact('total'));
            }
        }
        return view('pages.shopping-cart.index');
    }

    public function paymentOnline(Request $request){

        $vnp_TxnRef = Str::random(10);
        $vnp_OrderInfo = $request->order_desc;
        $vnp_OrderType = $request->order_type;
        $vnp_Amount = str_replace(',', '', $request->amount) * 10000;
        $vnp_Locale = $request->language;
        $vnp_BankCode = $request->bank_code;
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

        $inputData = array(
            "vnp_Version" => "2.0.0",
            "vnp_TmnCode" => env('VNP_TMN_CODE'),
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => route('pages.vnpayreturn'),
            "vnp_TxnRef" => $vnp_TxnRef,
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . $key . "=" . $value;
            } else {
                $hashdata .= $key . "=" . $value;
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = env('VNP_URL') . "?" . $query;
        if (env('VNP_HASH_SECRET')) {
            // $vnpSecureHash = md5($vnp_HashSecret . $hashdata);
            $vnpSecureHash = hash('sha256', env('VNP_HASH_SECRET') . $hashdata);
            $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
        }


        return redirect($vnp_Url);
    }

    public function paymentVnpay(Request $request){
        $cart = Session::get('cart');
        $total = 0;
        foreach($cart as $key => $val){
            $total += $val['product_qty']*$val['product_sale_price'];
        }

        //insert payment method
        $data = array();
        $data['method'] = "ATM";
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $data['created_at'] = now();
        $payment_id = DB::table('payments')->insertGetId($data);

        //insert order

        $order_data = array();
        $order_data['customer_id'] = \Auth::user()->id;
        $order_data['shipping_id'] = \Session::get('shipping_id');
        $order_data['payment_id'] = $payment_id;
        $order_data['total'] = $total;
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $order_data['created_at'] = now();
        $order_data_id = DB::table('orders')->insertGetId($order_data);

        //insert vnpay

        $vnpay_data = $request->all();
        $vnpays = [
            'p_transaction_id' => $payment_id,
            'p_trasaction_code' => $vnpay_data['vnp_TxnRef'],
            'p_user_id' => \Auth::user()->id,
            'p_money' => $total,
            'p_note' => $vnpay_data['vnp_OrderInfo'],
            'p_vnp_response_code' => $vnpay_data['vnp_ResponseCode'],
            'p_code_vnpay' => $vnpay_data['vnp_TransactionNo'],
            'p_code_bank' => $vnpay_data['vnp_BankCode'],
            'p_time' => date('Y-m-d H:i' , strtotime($vnpay_data['vnp_PayDate']))
        ];
        DB::table('payment')->insert($vnpays);

        //insert order_details
        foreach($cart as $key => $val){
            $order_details_data = array();
            $order_details_data['order_id'] = $order_data_id;
            $order_details_data['product_id'] = $val['product_id'];
            $order_details_data['product_name'] = $val['product_name'];
            $order_details_data['product_image'] = $val['product_image'];
            $order_details_data['product_price'] = $val['product_sale_price'];
            $order_details_data['product_sale_qty'] = $val['product_qty'];
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $order_details_data['created_at'] = now();
            $order_details_data_id = DB::table('order_details')->insert($order_details_data);
        }

        $now = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y H:i:s');
        $title_mail = "Thanks You!";
        $email = Auth::user()->email;
        $date = "Date: ".''.$now;
        $details = [
            'title' => $title_mail,
            'body' => 'Order Success! Thank you for purchasing our product.',
            'date' => $date
        ];

        Mail::to($email)->send(new SendMail($details));

        Session::forget('cart');
        return view('pages.vnpay.vnpay_return', compact('vnpays'));
    }
}
