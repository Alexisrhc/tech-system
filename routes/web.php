<?php

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
    return view('auth.login');
});
Auth::routes();


Route::middleware(['auth'])->group(function () {
    // Home
    Route::get('/home', 'HomeController@index')->name('home');
    // Client
    Route::resource('/client', 'ClientController');
    Route::get('/client', 'ClientController@index')->name('client');
    // Route Products
    Route::resource('/product', 'ProductController');
    Route::get('/product', 'ProductController@index')->name('product');
    // Route Seller
    Route::resource('/seller', 'SellerController');
    Route::get('/seller', 'SellerController@index')->name('seller');
});