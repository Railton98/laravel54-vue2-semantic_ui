<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('counties/listing', 'CountriesController@listing');

Route::get('states/listing', 'StatesController@listing');

Route::get('cities/listing/{city}', 'CitiesController@listing');

Route::resource('countries', 'CountriesController', ['only' => ['index']]);
Route::resource('states', 'StatesController', ['only' => ['index']]);
Route::resource('cities', 'CitiesController', ['only' => ['index']]);
