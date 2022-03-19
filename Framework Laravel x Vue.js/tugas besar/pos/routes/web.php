<?php

use Illuminate\Support\Facades\Auth;
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


Route::resource('customers', App\Http\Controllers\CustomerController::class);
Route::get('/api/customers', [App\Http\Controllers\CustomerController::class, 'api']);

Route::resource('products', App\Http\Controllers\ProductController::class);
Route::get('/api/products', [App\Http\Controllers\ProductController::class, 'api']);

Route::resource('supliers', App\Http\Controllers\SuplierController::class);
Route::get('/api/supliers', [App\Http\Controllers\SuplierController::class, 'api']);

Route::resource('kategoris', App\Http\Controllers\KategoriController::class);
Route::get('/api/kategoris', [App\Http\Controllers\KategoriController::class, 'api']);

Route::resource('transactions', App\Http\Controllers\TransactionController::class);
Route::get('/api/transactions', [App\Http\Controllers\TransactionController::class, 'api']);

Route::resource('trans_details', App\Http\Controllers\TransDetailController::class);
Route::get('/api/trans_details', [App\Http\Controllers\TransDetailController::class, 'api']);

// POS
Route::get('pos', [App\Http\Controllers\PosController::class, 'index']);
Route::post('pos', [App\Http\Controllers\PosController::class, 'store']);
Route::get('products/ajax/{product_code}', [App\Http\Controllers\PosController::class, 'get_product']);
