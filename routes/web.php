<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ContactController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\ProductController;

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

// Route::get('/{any}', 'App\Http\Controllers\PagesController@index')->where('any', '.*');



Route::get('/products-page', function () {
  return view('products.index');
});

Route::get('/form', function () {
  return view('products.form');
});


Route::get('/edit/{id}', [ProductController::class, 'edit']);


// Route::get('/products', 'ProductController@index');


Route::resource('contacts', ContactController::class);
Route::resource('addresses', AddressController::class);
Route::resource('products', ProductController::class);