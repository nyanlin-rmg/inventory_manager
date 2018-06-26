<?php

Route::resource('/warehouse', 'WarehouseController');
Route::post('warehouse/search', 'WarehouseController@search');

Route::resource('/category','CategoryController');
Route::post('category/search','CategoryController@search');


Route::get('item/','ItemController@index');
Route::get('item/create', 'ItemController@create');
Route::post('item/store', 'ItemController@store');
Route::get('item/show/{id}', 'ItemController@show');
Route::get('item/edit/{id}', 'ItemController@edit');
Route::post('item/update/{id}', 'ItemController@update');
Route::get('item/destroy/{id}', 'ItemController@destroy');

