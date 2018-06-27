<?php

// Route::get('warehouse/','WarehouseController@index');
// Route::get('warehouse/create', 'WarehouseController@create');
// Route::post('warehouse/store', 'WarehouseController@store');
// Route::get('warehouse/show/{id}', 'WarehouseController@show');
// Route::get('warehouse/showItems/{itemid}/{wid}', 'WarehouseController@showItems');
// Route::get('warehouse/edit/{id}', 'WarehouseController@edit');
// Route::post('warehouse/update/{id}', 'WarehouseController@update');
// Route::get('warehouse/destroy/{id}', 'WarehouseController@destroy');

Route::get('warehouse/showItems/{itemid}/{wid}', 'WarehouseController@showItems');;

Route::resource('/warehouse', 'WarehouseController');
Route::post('warehouse/search', 'WarehouseController@search');
Route::post('warehouse/inventory_in', 'WarehouseController@inventory_in');
Route::post('warehouse/inventory_out', 'WarehouseController@inventory_out');

Route::resource('/category','CategoryController');
Route::post('category/search','CategoryController@search');
Route::resource('items','ItemController')->except(['show']);
Route::post('items/search','ItemController@search');
Route::get('item/in','ItemController@in');
Route::get('item/out','ItemController@out');




