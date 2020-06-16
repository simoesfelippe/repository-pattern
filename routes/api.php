<?php

use Illuminate\Http\Request;


/**
* Routes Categories
*/
Route::get('categories', 'CategoryController@index');
Route::post('categories', 'CategoryController@store');
Route::get('categories/{id}', 'CategoryController@show');
Route::put('categories/{id}', 'CategoryController@update');
Route::delete('categories/{id}', 'CategoryController@destroy');


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
