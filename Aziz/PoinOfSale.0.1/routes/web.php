<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//resource
Route::resource('/baskets',App\Http\Controllers\BasketController::class);
Route::resource('/checkouts',App\Http\Controllers\CheckoutController::class);
Route::resource('/customers',App\Http\Controllers\CustomerController::class);
Route::resource('/konfirmations',App\Http\Controllers\KonfirmationController::class);
Route::resource('/products',App\Http\Controllers\ProductController::class);
Route::resource('/types',App\Http\Controllers\TypeController::class);
Route::resource('/supliers',App\Http\Controllers\SuplierController::class);

//api
Route::get('/api/baskets', [App\Http\Controllers\BasketController::class, 'api']);
Route::get('/api/checkouts', [App\Http\Controllers\CheckoutController::class, 'api']);
Route::get('/api/customers', [App\Http\Controllers\CustomerController::class, 'api']);
Route::get('/api/konfirmations', [App\Http\Controllers\KonfirmationController::class, 'api']);
Route::get('/api/products', [App\Http\Controllers\ProductController::class, 'api']);
Route::get('/api/types', [App\Http\Controllers\TypeController::class, 'api']);
Route::get('/api/supliers', [App\Http\Controllers\SuplierController::class, 'api']);


