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
Route::get('/transaction_ditails', 'TransactionDitailController@index');

//--//
Route::resource('/catalogs', CatalogController::class);
Route::resource('/authors', AuthorController::class);
Route::resource('/publishers', PublisherController::class);
Route::resource('/books', BookController::class);
Route::resource('/members', MemberController::class);
Route::resource('/transactions', TransactionController::class);

//api
Route::get('/api/authors', 'AuthorController@api');
Route::get('/api/publishers', 'PublisherController@api');
Route::get('/api/books', 'BookController@api');
Route::get('/api/members', 'MemberController@api');
Route::get('/api/transactions', 'TransactionController@api');

//Route::get('/test_spatie', HomeController::class, 'test_spatie');
Route::get('/test_spatie/home', 'HomeController@test_spatie');

//Route::get('/transactions/{transaction}/edit', [App\Http\Controllers\TransactionController::class, 'edit']);
//Route::put('/transactions/{transaction}', [App\Http\Controllers\TransactionController::class, 'update']);

//Catalogs
// Route::get('/catalogs', [App\Http\Controllers\CatalogController::class, 'index']);
// Route::get('/catalogs/create', [App\Http\Controllers\CatalogController::class, 'create']);
// Route::post('/catalogs', [App\Http\Controllers\CatalogController::class, 'store']);
// Route::get('/catalogs/{catalog}/edit', [App\Http\Controllers\CatalogController::class, 'edit']);
// Route::put('/catalogs/{catalog}', [App\Http\Controllers\CatalogController::class, 'update']);
// Route::delete('/catalogs/{catalog}', [App\Http\Controllers\CatalogController::class, 'destroy']);
//--//

//Publishers
// Route::get('/publishers', [App\Http\Controllers\PublisherController::class, 'index']);
// Route::get('/publishers/create', [App\Http\Controllers\PublisherController::class, 'create']);
// Route::Post('/publishers', [App\Http\Controllers\PublisherController::class, 'store']);
// Route::get('/publishers/{publisher}/edit', [App\Http\Controllers\PublisherController::class, 'edit']);
// Route::put('/publishers/{publisher}', [App\Http\Controllers\PublisherController::class, 'update']);
// Route::delete('/publishers/{publisher}', [App\Http\Controllers\PublisherController::class, 'destroy']);
//--//