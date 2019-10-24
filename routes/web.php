<?php
Route::get('/store/create', 'StoreController@create');
Route::get('/selectSeller', 'SellerController@selectSeller')->name('selectSeller');
Route::get('/selectStore', 'StoreController@selectStore')->name('selectStore');
Route::get('/selectTechnical', 'SellerController@selectTechnical')->name('selectTechnical');

Route::get('/store/{id}', 'StoreController@show')->name('store');

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
    Route::get('/product', 'ProductController@index')->name('product')->middleware('role');
    // Route employee
    Route::resource('/employee', 'SellerController');
    Route::get('/employee', 'SellerController@index')->name('employee')->middleware('role');
    // Route provider
    Route::resource('/provider', 'ProviderController');
    Route::get('/provider', 'ProviderController@index')->name('provider')->middleware('role');
    // Route store
    Route::resource('/store', 'StoreController');
    Route::get('/store', 'StoreController@index')->name('store')->middleware('role');
    // Route activity id
    Route::get('/activity', 'ActivityController@index')->middleware('role');
    Route::get('/activity/{id}', 'ActivityController@show')->name('activity')->middleware('role');
    // Route::resource('/store', 'StoreController');
    // Route bill
    Route::resource('/bill', 'BillController');
    Route::get('/bill', 'BillController@index')->name('bill');
    // Route bill_temporal
    Route::resource('/bill-temporal', 'BillTemporalController');
    // Route bill_detail
    Route::resource('/bill-details', 'BillDetailsController');
    // Route empleados

    // Route printed-invoice
    Route::get('/printed-invoice/{id}', 'PrintedInvoiceController@index')->name('printedinvoice');
    // Route::resource('/printed-invoice', 'PrintedInvoiceController');
    Route::get('/imprimir/{id}', 'PrintedInvoiceController@imprimir')->name('printed');
    Route::put('/productQuantity/{id}', 'ProductController@updateQuantity')->name('productQuantity');
    // Route::get('/register', function(){return view('auth.login');})->name('register');
});

