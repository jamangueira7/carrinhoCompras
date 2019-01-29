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

Route::get('/', 'ProductController@index');
Route::get('product/{id}', 'ProductController@details');

Route::post('fill-modal/{id}', 'ProductController@fillModal');
Route::post('fill-cart', 'ProductController@fillCart');
