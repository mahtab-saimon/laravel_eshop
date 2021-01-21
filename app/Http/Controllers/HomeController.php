<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{


    public function index()
    {
        $all_publish_product = DB::table('products')
            ->join('categories', 'products.catId', '=', 'categories.id')
            ->join('brands', 'products.brandId', '=', 'brands.id')
            ->select('categories.category_name', 'products.*', 'brands.brand_name')
            ->where('products.status',1)
            ->limit(9)
            ->get();
        return view('pages.home_content',compact('all_publish_product'));

        //return view('pages.home_content');
    }

    public function show_product_category($id){


        $show_product_category = DB::table('products')
            ->join('categories', 'products.catId', '=', 'categories.id')
            ->select('categories.category_name', 'products.*')
            ->where('products.catId',$id)
            ->where('products.status',1)
            ->limit(18)
            ->get();
        return view('pages.productByCategory',compact('show_product_category'));

    }
    public function show_product_brand($id){
        $show_product_brand = DB::table('products')
            ->join('brands', 'products.brandId', '=', 'brands.id')
            ->select('products.*', 'brands.brand_name')
            ->where('products.brandId',$id)
            ->where('products.status',1)
            ->limit(18)
            ->get();
        return view('pages.productByBrand',compact('show_product_brand'));

    }
    public function view_product_details($id){
        $view_product_details = DB::table('products')
            ->join('categories', 'products.catId', '=', 'categories.id')
            ->join('brands', 'products.brandId', '=', 'brands.id')
            ->select('categories.category_name', 'products.*', 'brands.brand_name')
            ->where('products.id',$id)
            ->where('products.status',1)
            ->limit(18)
            ->first();
        return view('pages.productDetails',compact('view_product_details'));

    }
}
