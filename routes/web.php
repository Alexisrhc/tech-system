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

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//cliente
Route::middleware(['auth'])->group(function () {
    Route::get('/client', 'ClientController@index')->name('client');
    Route::post('/client', 'ClientController@store')->name('client');
    Route::get('/client/create', 'ClientController@create')->name('client-create');
    Route::get('/client/edit/{id}', 'ClientController@edit')->name('client-edit');
});