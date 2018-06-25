<?php
Route::get('warehouse/showItems/{itemid}/{wid}', 'WarehouseController@showItems');;
Route::resource('/warehouse', 'WarehouseController');
Route::post('warehouse/search', 'WarehouseController@search');

Route::resource('/category','CategoryController');
Route::post('category/search','CategoryController@search');
Route::resource('item','ItemController');
Route::post('item/search','ItemController@search');




