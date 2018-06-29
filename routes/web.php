<?php


Route::get('warehouse/purchase','WarehouseController@purchase')->middleware('auth');
Route::resource('warehouse', 'WarehouseController')->middleware('auth');

Route::post('warehouse/search', 'WarehouseController@search')->middleware('auth');
Route::get('warehouse/showItems/{itemid}/{wid}', 'WarehouseController@showItems')->middleware('auth');
Route::post('warehouse/save','WarehouseController@save')->middleware('auth');
Route::post('warehouse/showItems/{itemid}/{wid}', 'WarehouseController@showItems')->middleware('auth');

Route::resource('/category','CategoryController')->except(['show'])->middleware('auth');
Route::post('category/search','CategoryController@search')->middleware('auth');

Route::resource('item','ItemController')->except(['show'])->middleware('auth');
Route::post('item/search','ItemController@search')->middleware('auth');





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/',function()
{
	return view('index');
});