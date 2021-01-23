<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function manageOrder(){
        $order = DB::table('orders')
            ->join('customers', 'orders.customer_id', '=', 'customers.id')
           // ->join('order_details', 'order_details.product_id', '=', 'order_details.id')
            ->select('customers.name', 'orders.*')
            ->get();
        return view('admin.manageOrder.manageOrder',compact('order'));
    }

    public function edit ($id){


    }
    public function show($id){

        $order = DB::table('orders')
            ->join('customers', 'orders.customer_id', '=', 'customers.id')
             ->join('order_details', 'order_details.order_id', '=', 'orders.id')
             ->join('checkouts', 'orders.shipping_id', '=', 'checkouts.id')
            ->select('customers.name','customers.phone', 'orders.*','order_details.*','checkouts.*')
            ->where('orders.id', '=', $id)
            ->get();
       /* $order_details = DB::table('orders')
             ->join('order_details', 'order_details.order_id', '=', 'orders.id')
            ->select('orders.*','order_details.*')
            ->groupBy('orders.id')
            ->where('orders.id', '=', $id)
            ->first();*/
        /*echo "<pre>";
        print_r($order);
        die();*/
        return view('admin.manageOrder.viewOrder',compact('order'));

    }
    public function delete($id){


    }
     public function update(Request $request, $id){


    }

}
