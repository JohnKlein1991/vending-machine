<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/user', function (Request $request) {
    return \Illuminate\Support\Str::random(60);
    dd($request->user());
    return $request->user();
});

Route::middleware('auth:api')->get('/get-vm-coins', 'ApiController@getVMCoins');
Route::middleware('auth:api')->get('/get-vm-temp-sum', 'ApiController@getVMTempSum');
Route::middleware('auth:api')->get('/get-user-coins', 'ApiController@getUserCoins');
Route::middleware('auth:api')->get('/get-products-info', 'ApiController@getProductsInfo');


Route::middleware('auth:api')->get('/insert-coin', 'ApiController@insertCoin');
