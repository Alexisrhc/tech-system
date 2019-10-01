<?php

Auth::routes();
Route::middleware(['guest'])->group(function () {
    Route::get('/', function () {return view('auth.login');});
    Route::get('/login', function(){return view('auth.login');})->name('login');
    // Route::get('/register', function(){
    //     return view('auth.login');
    // })->name('login');
});
Route::middleware(['auth'])->group(function () {
    // Home
    Route::get('/home', 'HomeController@index')->name('home');
    // Client
    Route::resource('/client', 'ClientController');
    Route::get('/client', 'ClientController@index')->name('client');
    // Route Products
    Route::resource('/product', 'ProductController');
    Route::get('/listproduct', 'ProductController@listProduct');
    Route::get('/product', 'ProductController@index')->name('product');
    // Route employee
    Route::resource('/employee', 'SellerController');
    Route::get('/employee', 'SellerController@index')->name('employee');

    // Route provider
    Route::resource('/provider', 'ProviderController');
    Route::get('/provider', 'ProviderController@index')->name('provider');

    // Route::get('/register', function(){return view('auth.login');})->name('register');
});