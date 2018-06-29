<?php
Route::get('/', function () {
	return view('index');
});
Route::get('warehouse', function () {
	return view('warehouse');	
});
Route::get('category', function () {
	return view('category');	
});
Route::get('item', function () {
	return view('item');	
});
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




