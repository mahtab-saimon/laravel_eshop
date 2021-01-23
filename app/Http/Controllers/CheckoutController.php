<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Cart;

class CheckoutController extends Controller
{
    public function login(){
        return view('/pages.login');
    }
    public function checkout(){
        return view('pages.checkout');
    }
     public function logout(Request $request){
         $request->session()->flush();
         return Redirect('/loginCustomer');

    }

    public function shipping(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|max:200',
            'email' => 'required|max:200',
            'address' => 'required|max:200',
            'phone' => 'required|max:200',
            'country' => 'required|max:200',
            'city' => 'required|max:200',

        ]);
        //$data = new Customer();
        $data = array();
        $data['name'] =$request->name;
        $data['email'] =$request-> email;
        $data['address'] =$request->address;
        $data['phone'] = $request->phone;
        $data['country'] = $request->country;
        $data['city'] = $request->city;
       // print_r($data);
       // die();
        $shipping_id = DB::table('checkouts')
            ->insertGetId($data);
        //print_r($data);
        // $data->save();
        if ($shipping_id) {
            //Cart::destroy();
            $request->session()->put('shipping_id',$shipping_id->id);
        //    $request->session()->put('name',$request->name);
            $notification = array(
                'messege' => 'Successfully Inserted',
                'alert-type' => 'success'
            );
           //return redirect('/payment');
            return Redirect('/payment')->with($notification);
        } else {
            $notification = array(
                'messege' => 'Not Inserted',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }



}
