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

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('categories', 'CategoryController');
Route::resource('products', 'ProductController'); 
Route::resource('services', 'ServiceController');
Route::resource('orders', 'OrderController');

Route::post('orders/{id}/add/service',  'OrderController@addService')->name('orders.add.service');
Route::post('orders/{id}/add/product',  'OrderController@addProduct')->name('orders.add.product');

Route::delete('orders/{id}/delete',  'OrderController@deleteOrderItem')->name('orders.delete.item');


