<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboardController;

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');
Route::get('/dashbaord', function () {
    return view('Dashboard.index');
})->name('dashboard');
Route::get('/dashboard',[App\Http\Controllers\dashboardController::class, 'index'])->name('dashboard');
Route::get('/dashbaord/products', [App\Http\Controllers\dashboardController::class, 'GetProducts'])->name('products');
Route::post('/dashbaord/create_product', [App\Http\Controllers\dashboardController::class, 'createProduct'])->name('create_product');
Route::get('/delete-product/{id}',[dashboardController::class,'deleteProduct'])->name('deleteProduct');
Route::post('/edit-product/',[dashboardController::class,'editProduct'])->name('editProduct');
Route::post('/dashbaord/add_details', [App\Http\Controllers\dashboardController::class, 'addProductDetails'])->name('addDetails');
Route::post('/dashbaord/update_details', [App\Http\Controllers\dashboardController::class, 'updateProductDetails'])->name('updateDetails');

Route::get('/dashbaord/products/search', [App\Http\Controllers\dashboardController::class, 'search'])->name('search');
Route::get('/logout', [App\Http\Controllers\dashboardController::class, 'logout'])->name('logout');
Auth::routes();
Route::get('/unpack', [App\Http\Controllers\dashboardController::class, 'unpack_DB'])->name('unpack_DB');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/view-products',[App\Http\Controllers\HomeController::class,'getProducts'])->name('products_page');
