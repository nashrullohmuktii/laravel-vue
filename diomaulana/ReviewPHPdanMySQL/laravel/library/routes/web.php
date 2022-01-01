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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/books', [App\Http\Controllers\BookController::class, 'index']);
Route::get('/transactions', [App\Http\Controllers\TransactionController::class, 'index']);
Route::get('/transaction-details', [App\Http\Controllers\TransactionDetailController::class, 'index']);

// Route::resource("catalogs", App\Http\Controllers\CatalogController::class);
Route::resources([
	"catalogs" => App\Http\Controllers\CatalogController::class,
    'publishers' => App\Http\Controllers\PublisherController::class,
    'authors' => App\Http\Controllers\AuthorController::class,
    'members' => App\Http\Controllers\MemberController::class,
]);
Route::get('/api/authors', [App\Http\Controllers\AuthorController::class, 'api']);
Route::get('/api/publishers', [App\Http\Controllers\PublisherController::class, 'api']);
Route::get('/api/members', [App\Http\Controllers\MemberController::class, 'api']);

// Route::get('/catalogs', [App\Http\Controllers\CatalogController::class, 'index']);
// Route::get('/catalogs/create', [App\Http\Controllers\CatalogController::class, 'create']);
// Route::post('/catalogs', [App\Http\Controllers\CatalogController::class, 'store']);
// Route::get('/catalogs/{catalog}/edit', [App\Http\Controllers\CatalogController::class, 'edit']);
// Route::put('/catalogs/{catalog}', [App\Http\Controllers\CatalogController::class, 'update']);
// Route::delete('/catalogs/{catalog}', [App\Http\Controllers\CatalogController::class, 'destroy']);

// Route::get('/publishers', [App\Http\Controllers\PublisherController::class, 'index']);