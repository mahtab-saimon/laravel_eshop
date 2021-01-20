<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index(){
        return view('admin/category/addCategory');
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'category_name' => 'required|max:200',
            'category_description' => 'required',
        ]);
        $category = new Category;
        $category->category_name=$request->category_name;
        $category->status=$request-> status;
        $category->category_description=$request-> category_description;

        $category->save();
        if ($category) {
            $notification = array(
                'messege' => 'Successfully Inserted',
                'alert-type' => 'success'
            );
            return Redirect()->route('/addCategory')->with($notification);
        } else {
            $notification = array(
                'messege' => 'Not Inserted',
                'alert-type' => 'error'
            );
            return Redirect()->route('addCategory')->with($notification);
        }
    }
    public function showCategory(){
        $category=Category::all();
        return view('admin/category/allCategory',compact('category'));
    }
      public function destroy($id){
          $category=Category::findorfail($id);
          $category->delete();
          if ($category) {
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
      public function viewCategory($id){
          $category=Category::findorfail($id);
        return view('admin.category/viewCategory',compact('category'));
    }
      public function edit($id){
          $category=Category::findorfail($id);
        return view('admin.category.editCategory',compact('category'));
    }
      public function updateCategory(Request $request, $id){
          $category=Category::findorfail($id);
          $category->category_name=$request->category_name;
          $category->category_description=$request-> category_description;
          $category->update();
          if ($category) {
              $notification=array(
                  'messege'=>'Successfully Data Updated !',
                  'alert-type'=>'success'
              );

              return Redirect()->route('admin.category/allCategory')->with($notification);

          }else{
              $notification=array(
                  'messege'=>'Something went wrong !',
                  'alert-type'=>'error'
              );
              return Redirect()->route('admin.category/allCategory')->with($notification);
          }

    }
    public function active($id){
        $category=DB::table('categories')
            ->where('id',$id)
            ->update(['status'=>1]);
        if ($category) {
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
        $category= DB::table('categories')
            ->where('id',$id)
            ->update(['status'=>0]);
        if ($category) {
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
