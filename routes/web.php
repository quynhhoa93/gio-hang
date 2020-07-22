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

Route::get('/','CartController@index');
Route::get('/add-cart/{id}','CartController@AddCart');
Route::get('/delete-item-cart/{id}','CartController@DeleteItemCart');

Route::get('/list-cart','CartController@listCart');
Route::get('/delete-item-list-cart/{id}','CartController@DeleteItemListCart');
Route::get('/save-item-list-cart/{id}/{quantity}','CartController@SaveItemListCart');
