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

Route::get('/categories', 'CategoryController@index')->name('categories.index');
Route::get('/categories/create', 'CategoryController@create')->name('categories.create');
Route::get('/categories/{id}', 'CategoryController@show')->name('categories.category');
Route::get('/categories/{id}/edit', 'CategoryController@edit')->name('category.edit');
Route::post('/categories/{id}/edit', 'CategoryController@update')->name('categories.index');
Route::post('/categories/store', 'CategoryController@store')->name('categories.index');
Route::delete('/categories/{id}', 'CategoryController@delete')->name('category.index');

Route::resource('products', 'ProductController');



