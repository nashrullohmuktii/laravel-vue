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
Route::get('/members', 'MemberController@index');
Route::get('/transactions', 'TransactionController@index');
Route::get('/transaction_ditails', 'TransactionDitailController@index');

Route::resource('/catalogs', CatalogController::class);
Route::resource('/authors', AuthorController::class);
Route::resource('/publishers', PublisherController::class);
Route::resource('/books', BookController::class);

Route::get('/api/authors', 'AuthorController@api');
Route::get('/api/publishers', 'PublisherController@api');
Route::get('/api/books', 'BookController@api');