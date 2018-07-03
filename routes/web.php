<?php
Route::get('/', function () {
	return view('index');
})->middleware('auth');
Route::get('warehouses/purchase','WarehouseController@purchase')->middleware('auth');
Route::resource('warehouses', 'WarehouseController')->middleware('auth');
Route::post('warehouses/search', 'WarehouseController@search')->middleware('auth');
Route::get('warehouses/showItems/{itemid}/{wid}', 'WarehouseController@showItems')->middleware('auth');
Route::post('warehouses/save','WarehouseController@save')->middleware('auth');
Route::post('warehouses/showItems/{itemid}/{wid}', 'WarehouseController@showItems')->middleware('auth');



Route::resource('/categories','CategoryController')->except(['show'])->middleware('auth');
Route::post('categories/search','CategoryController@search')->middleware('auth');

Route::resource('items','ItemController')->except(['show'])->middleware('auth');
Route::post('items/search','ItemController@search')->middleware('auth');






Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
