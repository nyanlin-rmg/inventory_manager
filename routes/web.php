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

Route::resource('/category','CategoryController');
Route::post('category/search','CategoryController@search');
Route::resource('item','ItemController');
Route::post('item/search','ItemController@search');
Route::get('item/in','ItemController@in');
Route::get('item/out','ItemController@out');




