<?php
Route::get('/', 'HomeController@index')->middleware('auth');
Route::get('about', 'HomeController@about')->middleware('auth');
Route::get('testvue', 'HomeController@testvue')->middleware('auth');

Route::get('warehouses/history','WarehouseController@history')->middleware('auth');
Route::get('warehouses/purchase','WarehouseController@purchase')->middleware('auth');
Route::get('warehouses/sale','WarehouseController@sale')->middleware('auth');
Route::get('warehouses/transfer','WarehouseController@transfer')->middleware('auth');

Route::resource('warehouses', 'WarehouseController')->middleware('auth');

Route::post('warehouses/search', 'WarehouseController@search')->middleware('auth');
Route::get('warehouses/showItems/{itemid}/{wid}', 'WarehouseController@showItems')->middleware('auth');
Route::post('warehouses/save','WarehouseController@save')->middleware('auth');
Route::post('warehouses/transfer_save','WarehouseController@transfer_save')->middleware('auth');
Route::post('warehouses/sell_item','WarehouseController@sell_item')->middleware('auth');
Route::get('warehouses/purchase_item/{warehouse_id}','WarehouseController@purchase_item')->middleware('auth');
Route::post('warehouses/showItems/{itemid}/{wid}', 'WarehouseController@showItems')->middleware('auth');
Route::get('warehouses/sale_items/{warehouseid}', 'WarehouseController@sale_items')->middleware('auth');
Route::get('warehouses/transfer_items/{warehouseid}', 'WarehouseController@transfer_items')->middleware('auth');

Route::resource('/categories','CategoryController')->except(['show'])->middleware('auth');
Route::post('categories/search','CategoryController@search')->middleware('auth');
Route::get('histories/destroy/{id}', 'HistoryController@destroy')->middleware('auth');
Route::get('histories/destroy_all', 'HistoryController@destroy_all')->middleware('auth');
Route::get('histories/destroy_selected', 'HistoryController@destroy_selected')->middleware('auth');

Route::resource('items','ItemController')->except(['show'])->middleware('auth');
Route::post('items/search','ItemController@search')->middleware('auth');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
