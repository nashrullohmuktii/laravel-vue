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
Route::get('/authors', 'AuthorController@index');
Route::get('/books', 'BookController@index');
Route::get('/members', 'MemberController@index');
Route::get('/transactions', 'TransactionController@index');
Route::get('/transaction_ditails', 'TransactionDitailController@index');

Route::get('/catalogs', 'CatalogController@index');
Route::get('/catalogs/create', 'CatalogController@create');
Route::post('/catalogs', 'CatalogController@store');
Route::get('/catalogs/{catalog}/edit', 'CatalogController@edit');
Route::put('/catalogs/{catalog}', 'CatalogController@update');
Route::delete('/catalogs/{catalog}', 'CatalogController@destroy');

Route::get('/publishers', 'PublisherController@index');
Route::get('/publishers/create', 'PublisherController@create');
Route::post('/publishers', 'PublisherController@store');
Route::get('/publishers/{publisher}/edit', 'PublisherController@edit');
Route::put('/publishers/{publisher}', 'PublisherController@update');
Route::delete('/publishers/{publisher}', 'PublisherController@destroy');

Route::get('/authors/create', 'AuthorController@create');
