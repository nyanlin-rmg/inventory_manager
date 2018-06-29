<?php
Route::get('/', function () {
	return view('index');
});
Route::get('warehouses/purchase','WarehouseController@purchase');
Route::resource('warehouses', 'WarehouseController');
Route::post('warehouses/search', 'WarehouseController@search');
Route::get('warehouses/showItems/{itemid}/{wid}', 'WarehouseController@showItems');
Route::post('warehouses/save','WarehouseController@save');
Route::post('warehouses/showItems/{itemid}/{wid}', 'WarehouseController@showItems');

Route::resource('/categories','CategoryController')->except(['show']);
Route::post('categories/search','CategoryController@search');

Route::resource('items','ItemController')->except(['show']);
Route::post('items/search','ItemController@search');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

