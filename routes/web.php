<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productcontroller;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/product', [productcontroller::class, 'index'])->name('products.index'); 
Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
Route::post('/product', [ProductController::class, 'store'])->name('product.store');
Route::get('/product/{product}/edit', [productcontroller::class, 'edit'])->name('product.edit'); 
Route::put('/product/{product}/update', [productcontroller::class, 'update'])->name('product.update'); 
Route::delete('/product/{product}/delete', [productcontroller::class, 'destroy'])->name('product.destroy');