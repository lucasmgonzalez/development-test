<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'AppController@index');

Route::get('products', 'AppController@products');
Route::get('product/create', 'AppController@createProduct');
Route::get('product/{product}/retrieve', 'AppController@retrieveProduct');

Route::get('orders', 'AppController@orders');

Route::post('product/create', 'ProductController@create');
Route::post('product/{product}/update', 'ProductController@update');
Route::post('product/{product}/delete', 'ProductController@delete');

