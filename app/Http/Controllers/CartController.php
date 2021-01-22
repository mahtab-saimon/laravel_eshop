<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  Cart;
use DB;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $qty = $request->qty;
        $pro_id = $request->pro_id;

        $product = DB::table('products')
            ->where('id', $pro_id)
            ->first();

        $data = array();
        $data['id'] = $pro_id;
        $data['name'] = $product->product_name;
        $data['qty'] = $qty;
        $data['price'] = $product->sellingPrice;
        $data['options']['productImage'] = $product->productImage;
        $add = Cart::add($data);

        if ($add) {
            $notification = array(
                'messege' => 'Successfully Data add to cart !',
                'alert-type' => 'success'
            );
            return Redirect('showCart')->with($notification);

        } else {
            $notification = array(
                'messege' => 'Something went wrong !',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }


    }

    public function showCart(Request $request)
    {
        $category = DB::table('categories')
            ->where('status', 1)
            ->get();
        return view('pages.cart', compact('category'));

    }

    public function remove($rowId)
    {
        $remove = Cart::remove($rowId);
        if ($remove) {
            $notification=array(
                'messege'=>'Successfully Data Deleted !',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);

        }else{
            $notification=array(
                'messege'=>'Something went wrong !',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
        }
    }
    public function update(Request $request){
        $qty=$request->qty;
        $rowId=$request->rowId;
        $uptade= Cart::update($rowId, $qty);
        if ($uptade) {
            $notification=array(
                'messege'=>'Successfully Data Updated !',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        }else{
            $notification=array(
                'messege'=>'Something went wrong !',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
        }
    }

}
