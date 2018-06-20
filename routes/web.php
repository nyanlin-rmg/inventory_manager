<?php
Route::get('warehouse/','WarehouseController@index');
Route::get('warehouse/create', 'WarehouseController@create');
Route::post('warehouse/store', 'WarehouseController@store');
Route::get('warehouse/show/{id}', 'WarehouseController@show');
Route::get('warehouse/showItems/{itemid}', 'WarehouseController@showItems');
Route::get('warehouse/edit/{id}', 'WarehouseController@edit');
Route::post('warehouse/update/{id}', 'WarehouseController@update');
Route::get('warehouse/destroy/{id}', 'WarehouseController@destroy');

/*Route::get('category','CategoryController@index');
Route::post('category/store','CategoryController@store');
Route::get('category/create','CategoryController@create');
Route::get('category/edit/{id}','CategoryController@edit');
Route::post('category/update/{id}','CategoryController@update');*/

Route::resource('/category','CategoryController');

Route::get('item/','ItemController@index');
Route::get('item/create', 'ItemController@create');
Route::post('item/store', 'ItemController@store');
Route::get('item/show/{id}', 'ItemController@show');
Route::get('item/edit/{id}', 'ItemController@edit');
Route::post('item/update/{id}', 'ItemController@update');
Route::get('item/destroy/{id}', 'ItemController@destroy');
