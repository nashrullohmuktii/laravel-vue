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

Route::get('/home', 'HomeController@index');
Route::get('/author', 'AuthorController@index');
Route::get('/book', 'BookController@index');
Route::get('/catalog', 'CatalogController@index');
Route::get('/member', 'MemberController@index');
Route::get('/publisher', 'PublisherController@index');
Route::get('/transaction', 'TransactionController@index');
Route::get('/transaction_ditail', 'TransactionDitailController@index');