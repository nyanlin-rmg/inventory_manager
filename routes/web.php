<?php
Route::get('warehouse/','WarehouseController@index');
Route::get('warehouse/create', 'WarehouseController@create');
Route::post('warehouse/store', 'WarehouseController@store');
Route::get('warehouse/show/{id}', 'WarehouseController@show');
Route::get('warehouse/edit/{id}', 'WarehouseController@edit');
Route::post('warehouse/update', 'WarehouseController@update');
Route::get('warehouse/destroy/{id}', 'WarehouseController@destroy');

Route::get('category','CategoryController@index');
Route::get('category/store','CategoryController@store');
Route::get('category/create','CategoryController@create');
Route::get('category/edit/{id}','CategoryController@edit');
Route::get('category/update/{id}','CategoryController@update');