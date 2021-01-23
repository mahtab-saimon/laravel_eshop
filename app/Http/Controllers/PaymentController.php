<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
    public function payment(){

        return view('pages.payment');

    }
    public function afterPayment(){

        return view('pages.afterPayment');

    }
    public function orderPlace(Request $request){
        $payment_getway = $request->payment_method;

        $paymentData=array();
        $paymentData['payment_method'] = $payment_getway;
        $paymentData['payment_status'] = 'Panding';

        $payment_id = DB::table('payments')
            ->insertGetId($paymentData);

        $orderData=array();
       // $customer_id = DB::table('customers')
        $orderData['customer_id']=Session::get('customer_id');
        $orderData['shipping_id']=Session::get('shipping_id');
        $orderData['payment_id']=$payment_id;
        $orderData['total']=Cart::total();
        $order_id = DB::table('orders')->insertGetId($orderData);
        $contents = Cart::content();
        $orderDetails_data=array();
        foreach ($contents as $content) {
            $orderDetails_data['order_id'] = $order_id;
            $orderDetails_data['product_id'] = $content->id;
            $orderDetails_data['product_name'] = $content->name;
            $orderDetails_data['product_price'] = $content->price;
            $orderDetails_data['quantity'] = $content->qty;
            //$oData['total']=$content->total;
          DB::table('order_details')->insert($orderDetails_data);
        }
        if ($payment_getway == 'HandCash') {
            //$request->session()->put('payment_id',$payment_id);
            $notification = array(
                'messege' => 'Successfully Inserted',
                'alert-type' => 'success'
            );
            return Redirect('/afterPayment')->with($notification);
        }elseif ($payment_getway == 'Visa') {
            //$request->session()->put('payment_id',$payment_id);
            $notification = array(
                'messege' => 'Successfully Inserted',
                'alert-type' => 'success'
            );
            return Redirect('/afterPayment')->with($notification);
        }elseif ($payment_getway == 'Paypal') {
            //$request->session()->put('payment_id',$payment_id);
            $notification = array(
                'messege' => 'Successfully Inserted',
                'alert-type' => 'success'
            );
            return Redirect('/afterPayment')->with($notification);
        }elseif ($payment_getway == 'Bkash') {
            //$request->session()->put('payment_id',$payment_id);
            $notification = array(
                'messege' => 'Successfully Inserted',
                'alert-type' => 'success'
            );
            return Redirect('/afterPayment')->with($notification);
        } else {
            $notification = array(
                'messege' => 'Not Inserted',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }



    }
}
