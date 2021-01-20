<?php

namespace App\Http\Controllers;
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
}
