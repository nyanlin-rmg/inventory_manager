<?php
Route::get('warehouse/showItems/{itemid}/{wid}', 'WarehouseController@showItems');;
Route::resource('/warehouse', 'WarehouseController');
Route::post('warehouse/search', 'WarehouseController@search');
Route::post('warehouse/inventory_in_out/{id}', 'WarehouseController@inventory_in_out');

Route::resource('/category','CategoryController');
Route::post('category/search','CategoryController@search');
Route::resource('item','ItemController');
Route::post('item/search','ItemController@search');





