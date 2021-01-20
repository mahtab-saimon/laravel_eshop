<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index(){
        return view('admin.slider.addSlider');
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'status' => 'required',
            'image' => 'required | mimes:jpeg,jpg,png,PNG | max:5000',
        ]);

        $slider = new Slider();
        $slider->status=$request->status;
        $image=$slider->image=$request->file('image');
        if ($image) {
            $image_name=hexdec(uniqid());
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/backend/image/slider/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $slider['image']=$image_url;
            $slider->save();
            $notification=array(
                'messege'=>'Successfully Inserted',
                'alert-type'=>'success'
            );
            return Redirect()->route('/addSlider')->with($notification);
        }else{
            $slider->save();
            $notification=array(
                'messege'=>'Successfully Inserted',
                'alert-type'=>'success'
            );
            return Redirect()->route('/addSlider')->with($notification);
        }

    }

    public function showSlider(){
        $slider=Slider::all();
        return view('admin.slider.allSlider',compact('slider'));
    }
    public function viewSlider($id){
        $slider=DB::table('sliders')->where('id',$id)->first();
        return view('admin.slider.viewSlider',compact('slider'));
    }

    public function edit($id){
        $slider=Slider::findorfail($id);
        return view('admin.slider.editSlider', compact('slider'));
    }
    public function updateSlider(Request $request,$id)
    {
        $slider=Slider::findorfail($id);
        $slider->status=$request->status;
        $image=$slider->image=$request->file('image');
        if ($image) {
            $image_name=hexdec(uniqid());
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/backend/image/slider/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $slider['image']=$image_url;
            unlink($request->old_photo);
            $slider->update();
            $notification=array(
                'messege'=>'Successfully Data Updated',
                'alert-type'=>'success'
            );
            return Redirect()->route('/allSlider')->with($notification);

        } else{
            $slider['image']=$request->old_photo;
            $slider->update();
            $notification=array(
                'messege'=>'Successfully Data Updated',
                'alert-type'=>'success'
            );
            return Redirect()->route('/allSlider')->with($notification);
        }
    }
    public function destroy($id){

        $slider=DB::table('sliders')->where('id',$id)->first();
        $image=$slider->image;
        $delete=DB::table('sliders')->where('id',$id)->delete();
        if ($delete) {
            unlink($image);
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

    public function active($id){
        $slider=DB::table('sliders')
            ->where('id',$id)
            ->update(['status'=>1]);
        if ($slider) {
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
        $slider= DB::table('sliders')
            ->where('id',$id)
            ->update(['status'=>0]);
        if ($slider) {
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
