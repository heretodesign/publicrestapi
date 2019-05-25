<?php

use Illuminate\Http\Request;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/products', 'ProductsController@index');
Route::post('/products', 'ProductsController@store');
Route::patch('/products/{product}', 'ProductsController@update');
Route::delete('/products/{product}', 'ProductsController@destroy');


Route::group(['prefix'=>'products'],function(){
	Route::apiResource('/{products}/buyers', 'BuyersController');
});