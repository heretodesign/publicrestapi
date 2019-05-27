<?php

use Illuminate\Http\Request;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/products', 'ProductsController@index');
Route::get('/products/{product}', 'ProductsController@show');
Route::post('/products', 'ProductsController@store');
Route::patch('/products/{product}', 'ProductsController@update');
Route::delete('/products/{product}', 'ProductsController@destroy');


Route::apiResource('/buyers', 'BuyersController');

Route::group(['prefix'=>'products'],function(){
	Route::apiResource('/{products}/auctions', 'AuctionController');
});