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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// V1 API
Route::group(['prefix' => 'v1'], function () {
  Route::get('get-city', 'App\Http\Controllers\BLController@getCity');
  Route::get('get-citybyid', 'App\Http\Controllers\BLController@getCityById');
  Route::get('get-cityes', 'App\Http\Controllers\BLController@getCityes');
  Route::get('get-reviews-mp', 'App\Http\Controllers\RevirewController@getRevMP');
});
