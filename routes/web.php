<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\MensParfumeController;
use App\Http\Controllers\WomensParfumeController;
use App\Http\Controllers\SweetsParfumeController;
use App\Http\Controllers\CasualsParfumeController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CategoryProductController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\ProductController;
use App\Models\CategoryProduct;
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

Route::get('/', [FrontEndController::class, 'index']);

Route::get('/about', [FrontEndController::class, 'about']);

Route::get('/collections', [FrontEndController::class, 'collections']);

Route::prefix('collection/{id}')->group(function () {
    Route::get('/', [FrontEndController::class, 'collection']);
    Route::get('/detail/{parfume_id}/{type}', [FrontEndController::class, 'collectionDetail']);
});


//Route Login & Logout

Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');

Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout']);

//Route Dashboard

Route::get('/dashboard', [CategoryProductController::class, 'index'])->middleware('auth')->name('login');

//Route Categories

Route::get('/dashboard', [CategoriesController::class, 'result']);

Route::get('/dashboard', [CategoryProductController::class, 'result']);

Route::get('/dashboard/kategori', [CategoriesController::class, 'index']);

// Route::get('/dashboard/detail', [CategoriesController::class, 'detail_batch']);

Route::get('/dashboard/kategori/create', [CategoriesController::class, 'create']);

Route::post('/dashboard/kategori', [CategoriesController::class, 'store']);

Route::get('dashboard/kategori/{id}/edit', [CategoriesController::class, 'edit']);

Route::post('dashboard/kategori/{id}', [CategoriesController::class, 'update']);

Route::get('dashboard/kategori/{id}', [CategoriesController::class, 'destroy']);

//Route Category Parfume
Route::get('/dashboard/jenis', [CategoryProductController::class, 'show']);
Route::get('/dashboard/jenis/create', [CategoryProductController::class, 'create']);
Route::post('/dashboard/jenis', [CategoryProductController::class, 'store']);
Route::get('/dashboard/jenis/{id}/edit', [CategoryProductController::class, 'edit']);
Route::post('/dashboard/jenis/{id}', [CategoryProductController::class, 'update']);
Route::get('/dashboard/jenis/{id}', [CategoryProductController::class, 'destroy']);

//Route Product
Route::get('/dashboard/product', [ProductController::class, 'index']);

Route::get('/dashboard/product/create', [ProductController::class, 'create']);

Route::post('/dashboard/product', [ProductController::class, 'store']);

Route::get('/dashboard/product/{id}/edit', [ProductController::class, 'edit']);

Route::post('/dashboard/product/{id}', [ProductController::class, 'update']);

Route::get('/dashboard/product/{id}', [ProductController::class, 'destroy']);


Route::prefix('dt')->group(function () {
    Route::get('/kategori-parfume', [CategoriesController::class, 'listParfume']);
    Route::get('/jenis-parfume', [CategoryProductController::class, 'listParfume']);
    Route::get('/product', [ProductController::class, 'listParfume']);
});

Route::prefix('ajax')->group(function () {
    Route::get('/product-preview', [ProductController::class, 'ajaxParfume']);
});
