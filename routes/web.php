<?php

Route::get('warehouse/purchase','WarehouseController@purchase');
Route::resource('warehouse', 'WarehouseController');
Route::post('warehouse/search', 'WarehouseController@search');

Route::get('warehouse/showItems/{itemid}/{wid}', 'WarehouseController@showItems');
Route::post('warehouse/save','WarehouseController@save');
Route::post('warehouse/showItems/{itemid}/{wid}', 'WarehouseController@showItems');


Route::resource('/category','CategoryController')->except(['show']);
Route::post('category/search','CategoryController@search');

Route::resource('item','ItemController')->except(['show']);
Route::post('item/search','ItemController@search');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

