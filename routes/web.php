<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\superAdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PaymentController;



//frontend
Route::get('/', [HomeController::class, 'index']);
Route::get('/productByCategory/{id}', [HomeController::class, 'show_product_category']);
Route::get('/productByBrand/{id}', [HomeController::class, 'show_product_brand']);
Route::get('/view_product_details/{id}', [HomeController::class, 'view_product_details']);

//cart
Route::post('/addToCart', [CartController::class, 'addToCart'])->name('/addToCart');
Route::post('/updateCart', [CartController::class, 'update'])->name('/updateCart');
Route::get('/showCart', [CartController::class, 'showCart']);
Route::get('/removeAnItem/{rowId}', [CartController::class, 'remove']);

//checkout
Route::get('/loginCustomer', [CheckoutController::class, 'login']);
Route::get('/logoutCustomer', [CheckoutController::class, 'logout']);
Route::get('/checkout', [CheckoutController::class, 'checkout']);
Route::post('/shipping', [CheckoutController::class, 'shipping'])->name('/shipping');

//payment
Route::get('/payment', [PaymentController::class, 'payment']);
Route::post('/orderPlace', [PaymentController::class, 'orderPlace'])->name('/orderPlace');
Route::get('/afterPayment', [PaymentController::class, 'afterPayment']);

//customer
Route::post('/registration', [CustomerController::class,'registration'])->name('/registration');
Route::post('/loginAccount', [CustomerController::class,'login'])->name('/loginAccount');



//backend
Route::get('/admin', [AdminController::class, 'index']);
Route::get('/logout', [superAdminController::class, 'logout']);
Route::get('/dashboard', [superAdminController::class, 'index']);
Route::post('/admin_dashboard', [AdminController::class, 'dashboard'])->name('/admin_dashboard');

//category
Route::get('/addCategory', [CategoryController::class, 'index'])->name('/addCategory');
Route::post('/insertCategory', [CategoryController::class, 'store'])->name('/insertCategory');
Route::get('/allCategory', [CategoryController::class, 'showCategory'])->name('/allCategory');

Route::get('deleteCategory/{id}', [CategoryController::class, 'destroy']);
Route::get('viewCategory/{id}', [CategoryController::class, 'viewCategory']);
Route::get('editCategory/{id}', [CategoryController::class, 'edit']);
Route::post('/updateCategory/{id}', [CategoryController::class, 'updateCategory']);

Route::get('/active/{id}', [CategoryController::class, 'active']);
Route::get('/inactive/{id}', [CategoryController::class, 'inactive']);


//Brand
Route::get('/addBrand', [BrandController::class, 'index'])->name('/addBrand');
Route::post('/insertBrand', [BrandController::class, 'store'])->name('/insertBrand');
Route::get('/allBrand', [BrandController::class, 'showBrand'])->name('/allBrand');

Route::get('deleteBrand/{id}', [BrandController::class, 'destroy']);
Route::get('viewBrand/{id}', [BrandController::class, 'viewBrand']);
Route::get('editBrand/{id}', [BrandController::class, 'edit']);
Route::post('/updateBrand/{id}}', [BrandController::class, 'updateBrand']);

Route::get('/active/{id}', [BrandController::class, 'active']);
Route::get('/inactive/{id}', [BrandController::class, 'inactive']);


//product
Route::get('/addProduct', [ProductController::class, 'index'])->name('/addProduct');
Route::post('/insertProduct', [ProductController::class, 'store'])->name('/insertProduct');
Route::get('/allProduct', [ProductController::class, 'showProduct'])->name('/allProduct');

Route::get('deleteProduct/{id}', [ProductController::class, 'destroy']);
Route::get('viewProduct/{id}', [ProductController::class, 'viewProduct']);
Route::get('editProduct/{id}', [ProductController::class, 'edit']);
Route::post('/updateProduct/{id}', [ProductController::class, 'updateProduct']);

Route::get('/active/{id}', [ProductController::class, 'active']);
Route::get('/inactive/{id}', [ProductController::class, 'inactive']);

//SLider
Route::get('/addSlider', [SliderController::class, 'index'])->name('/addSlider');
Route::post('/insertSlider', [SliderController::class, 'store'])->name('/insertSlider');
Route::get('/allSlider', [SliderController::class, 'showSlider'])->name('/allSlider');

Route::get('deleteSlider/{id}', [SliderController::class, 'destroy']);
Route::get('viewSlider/{id}', [SliderController::class, 'viewSlider']);
Route::get('editSlider/{id}', [SliderController::class, 'edit']);
Route::post('/updateSlider/{id}', [SliderController::class, 'updateSlider']);

Route::get('/active/{id}', [SliderController::class, 'active']);
Route::get('/inactive/{id}', [SliderController::class, 'inactive']);



//fronted route
