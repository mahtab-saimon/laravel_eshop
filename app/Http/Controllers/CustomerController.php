<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    public function login(Request $request){

        $email= $request->email;
        $password=md5($request->password);
        $customer = DB::table('customers')

            ->where('email',$email)
            ->where('password',$password)
            ->first();
        if ($customer) {
            $request->session()->put('customer_id',$customer->id);
            $request->session()->put('customer_name',$customer->name);
         /*   print_r(Session::get('customer_name'));
            print_r(Session::get('customer_id'));*/

            $notification = array(
                'messege' => 'Successfully Inserted',
                'alert-type' => 'success'
            );
          // return redirect('/checkout');
           return Redirect('/checkout')->with($notification);
        } else {
            $notification = array(
                'messege' => 'Not Inserted',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }

    }
    public function registration(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|max:200',
            'email' => 'required|max:200',
            'phone' => 'required|max:200',
            'password' => 'required|max:200',
        ]);
        //$data = new Customer();
        $data = array();
        $data['name'] =$request->name;
        $data['email'] =$request-> email;
        $data['phone'] =$request->phone;
        $data['password'] = md5($request->password);
        $customer = DB::table('customers')
            ->insertGetId($data);
        //print_r($data);
       // $data->save();
        if ($customer) {
            $request->session()->put('customer_id',$customer);
            $request->session()->put('customer_name',$customer->name);
            $notification = array(
                'messege' => 'Successfully Inserted',
                'alert-type' => 'success'
            );
            return redirect('/checkout');
            //return Redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'Not Inserted',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }

    }
}
