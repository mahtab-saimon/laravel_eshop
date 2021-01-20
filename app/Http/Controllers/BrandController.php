<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Facades\DB;

class BrandController extends Controller
{
    public function index(){
        return view('admin/brand/addBrand');
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'brand_name' => 'required|max:200',
        ]);
        $brand = new Brand;
        $brand->brand_name=$request->brand_name;
        $brand->status=$request-> status;

        $brand->save();
        if ($brand) {
            $notification = array(
                'messege' => 'Successfully Inserted',
                'alert-type' => 'success'
            );
            return Redirect()->route('/addBrand')->with($notification);
        } else {
            $notification = array(
                'messege' => 'Not Inserted',
                'alert-type' => 'error'
            );
            return Redirect()->route('addBrand')->with($notification);
        }
    }
    public function showBrand(){
        $brand=Brand::all();
        return view('admin/brand/allBrand',compact('brand'));
    }
    public function destroy($id){
        $brand=Brand::findorfail($id);
        $brand->delete();
        if ($brand) {
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
    public function viewBrand($id){
        $brand=Brand::findorfail($id);
        return view('admin.brand/viewBrand',compact('brand'));
    }
    public function edit($id){
        $brand=Brand::findorfail($id);
        return view('admin.brand.editBrand',compact('brand'));
    }
    public function updateBrand(Request $request, $id){
        $brand=Brand::findorfail($id);
        $brand->brand_name=$request->brand_name;
        $brand->update();
        if ($brand) {
            $notification=array(
                'messege'=>'Successfully Data Updated !',
                'alert-type'=>'success'
            );

            return Redirect()->route('admin.brand/allBrand')->with($notification);

        }else{
            $notification=array(
                'messege'=>'Something went wrong !',
                'alert-type'=>'error'
            );
            return Redirect()->route('admin.brand/allBrand')->with($notification);
        }

    }
    public function active($id){
        $brand=DB::table('brands')
            ->where('id',$id)
            ->update(['status'=>1]);
        if ($brand) {
            $notification=array(
                'messege'=>'Successfully Data Activated !',
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
    public function inactive($id){
        $brand= DB::table('brands')
            ->where('id',$id)
            ->update(['status'=>0]);
        if ($brand) {
            $notification=array(
                'messege'=>' Data Inactive !',
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
