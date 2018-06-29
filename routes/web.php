<?php
Route::get('warehouse/purchase','WarehouseController@purchase');
Route::get('warehouse/showItems/{itemid}/{wid}', 'WarehouseController@showItems');;
Route::resource('/warehouse', 'WarehouseController')->middleware('auth');
Route::post('warehouse/search', 'WarehouseController@search');
Route::post('warehouse/inventory_in_out/{id}', 'WarehouseController@inventory_in_out');
Route::resource('/category','CategoryController');
Route::post('category/search','CategoryController@search');
Route::resource('items','ItemController')->except(['show']);
Route::post('items/search','ItemController@search');
Auth::routes();

Route::get('/items.index', 'ItemController@index')->name('item');

