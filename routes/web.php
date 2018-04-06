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
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('admin');
Route::get('error', 'HomeController@error')->name('error');


Route::resource('categories', 'CategoryController')->middleware('admin');
Route::resource('products', 'ProductController')->middleware('admin'); 
Route::resource('services', 'ServiceController')->middleware('admin');
Route::resource('orders', 'OrderController', ['only' =>'index']);
Route::resource('orders', 'OrderController', ['except' =>'index'])->middleware('admin');

Route::post('orders/{id}/add/service',  'OrderController@addService')->name('orders.add.service')->middleware('admin');
Route::post('orders/{id}/add/product',  'OrderController@addProduct')->name('orders.add.product')->middleware('admin');

Route::delete('orders/{id}/delete',  'OrderController@deleteOrderItem')->name('orders.delete.item')->middleware('admin');

Route::get('search', 'SearchController@search')->name('search');