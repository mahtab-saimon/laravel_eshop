<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(){
        return view('admin.product.addProduct');
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'product_name' => 'required|max:200',
            'catId' => 'required',
            'brandId' => 'required|max:200',
            'productCode' => 'required|max:200',
            'productPlce' => 'required|max:200',
            'productRoute' => 'required|max:200',
            'productDescription' => 'required',
            'buyingPrice' => 'required|max:200',
            'sellingPrice' => 'required|max:200',
            'size' => 'required|max:200',
            'color' => 'required|max:200',
            'status' => 'required',
            'productImage' => 'required | mimes:jpeg,jpg,png,PNG | max:2000',
        ]);

        $product = new Product();
        $product->product_name=$request->product_name;
        $product->brandId=$request-> brandId;
        $product->catId=$request-> catId;
        $product->productCode=$request-> productCode;
        $product->productPlce=$request-> productPlce;
        $product->productRoute=$request-> productRoute;
        $product->productDescription=$request-> productDescription;
        $product->size=$request-> size;
        $product->color=$request-> color;
        $product->status=$request->status;
        $product->buyingPrice=$request->buyingPrice;
        $product->sellingPrice=$request->sellingPrice;
        $image=$product->productImage=$request->file('productImage');
        if ($image) {
            $image_name=hexdec(uniqid());
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/backend/image/product/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $product['productImage']=$image_url;
            $product->save();
            $notification=array(
                'messege'=>'Successfully Inserted',
                'alert-type'=>'success'
            );
            return Redirect()->route('/addProduct')->with($notification);
        }else{
            $product->save();
            $notification=array(
                'messege'=>'Successfully Inserted',
                'alert-type'=>'success'
            );
            return Redirect()->route('/addProduct')->with($notification);
        }

    }

    public function showProduct(){
        $product=product::all();
        return view('admin.product.allProduct',compact('product'));
    }
    public function viewProduct($id){
        $product = DB::table('products')
            ->join('categories', 'products.catId', '=', 'categories.id')
            ->join('brands', 'products.brandid', '=', 'brands.id')
            ->select('categories.category_name', 'products.*', 'brands.brand_name')
            ->where('products.id',$id)
            ->first();
        return view('admin.product.viewProduct',compact('product'));
    }

    public function edit($id){
        $product=product::findorfail($id);
        return view('admin.product.editProduct', compact('product'));
    }
    public function updateProduct(Request $request,$id)
    {
        $product=product::findorfail($id);
        $product->product_name=$request->product_name;
        $product->brandId=$request-> brandId;
        $product->catId=$request-> catId;
        $product->productCode=$request-> productCode;
        $product->productPlce=$request-> productPlce;
        $product->productRoute=$request-> productRoute;
        $product->productDescription=$request-> productDescription;
        $product->size=$request-> size;
        $product->color=$request-> color;
        $product->status=$request->status;
        $product->buyingPrice=$request->buyingPrice;
        $product->sellingPrice=$request->sellingPrice;
        $image=$product->productImage=$request->file('productImage');
        if ($image) {
            $image_name=hexdec(uniqid());
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/backend/image/product/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $product['productImage']=$image_url;
            unlink($request->old_photo);
            $product->update();
            $notification=array(
                'messege'=>'Successfully Data Updated',
                'alert-type'=>'success'
            );
            return Redirect()->route('/allProduct')->with($notification);

        } else{
            $product['productImage']=$request->old_photo;
            $product->update();
            $notification=array(
                'messege'=>'Successfully Data Updated',
                'alert-type'=>'success'
            );
            return Redirect()->route('/allProduct')->with($notification);
        }
    }
    public function destroy($id){

        $product=DB::table('products')->where('id',$id)->first();
        $image=$product->productImage;
        $delete=DB::table('products')->where('id',$id)->delete();
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
        $brand=DB::table('products')
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
        $brand= DB::table('products')
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

    public function importProduct(){
        return view('product.importProduct');

    }
    public function export()
    {
        return Excel::download(new productExport, 'products.xlsx');
    }
    public function import(Request $request)
    {

        $import= Excel::import(new ProductImport, $request->file('fileImport'));
        if ($import) {
            $notification=array(
                'messege'=>'Successfully Data Imported !',
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
