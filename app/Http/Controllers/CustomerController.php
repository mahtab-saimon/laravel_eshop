<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use DB;

class CustomerController extends Controller
{
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
        $data['password'] = $request->password;
        $customer = DB::table('customers')
            ->insertGetId($data);
        //print_r($data);
       // $data->save();
        if ($data) {
            $request->session()->put('id',$customer);
            $request->session()->put('name',$request->name);
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
