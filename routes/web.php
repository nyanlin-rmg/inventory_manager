<?php
Route::get('warehouse/','WarehouseController@index');
Route::get('warehouse/create', 'WarehouseController@create');
Route::post('warehouse/store', 'WarehouseController@store');
Route::get('warehouse/show/{id}', 'WarehouseController@show');
Route::get('warehouse/edit/{id}', 'WarehouseController@edit');
Route::post('warehouse/update', 'WarehouseController@update');
Route::get('warehouse/destroy/{id}', 'WarehouseController@destroy');