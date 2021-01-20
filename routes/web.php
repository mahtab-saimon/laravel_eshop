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

//frontend

Route::get('/', [HomeController::class, 'index']);


//backend
Route::get('/logout', [superAdminController::class, 'logout']);
Route::get('/admin', [AdminController::class, 'index']);
Route::get('dashboard', [superAdminController::class, 'index']);
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