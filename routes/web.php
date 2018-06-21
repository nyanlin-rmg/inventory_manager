<?php
Route::get('warehouse/','WarehouseController@index');
Route::get('warehouse/create', 'WarehouseController@create');
Route::post('warehouse/store', 'WarehouseController@store');
Route::get('warehouse/show/{id}', 'WarehouseController@show');
Route::get('warehouse/edit/{id}', 'WarehouseController@edit');
Route::post('warehouse/update/{id}', 'WarehouseController@update');
Route::get('warehouse/destroy/{id}', 'WarehouseController@destroy');
Route::post('warehouse/search', 'WarehouseController@search');

/*Route::get('category','CategoryController@index');
Route::post('category/store','CategoryController@store');
Route::get('category/create','CategoryController@create');
Route::get('category/edit/{id}','CategoryController@edit');
Route::post('category/update/{id}','CategoryController@update');*/

Route::resource('/category','CategoryController');

Route::post('category/search','CategoryController@search');
Route::resource('item','ItemController');
Route::post('item/search','ItemController@search');




