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

Route::get('get-tag-state', 'App\Http\Controllers\Admin\TagsController@getTagsState');
Route::post('set-tag', 'App\Http\Controllers\Admin\TagsController@setTag');
Route::post('rem-tag', 'App\Http\Controllers\Admin\TagsController@remTag');


// V1 API
Route::group(['prefix' => 'v1'], function () {
  Route::get('get-city', 'App\Http\Controllers\BLController@getCity');
  Route::get('get-citybyid', 'App\Http\Controllers\BLController@getCityById');
  Route::get('get-cityes', 'App\Http\Controllers\BLController@getCityes');
  Route::get('get-prices', 'App\Http\Controllers\BLController@getPrices');
  Route::get('get-prices-list', 'App\Http\Controllers\BLController@getPricesList');
  Route::get('get-subjects-names', 'App\Http\Controllers\BLController@getSubjectsNames');
  Route::get('check-promo', 'App\Http\Controllers\BLController@checkPromo');
  Route::post('send-lead', 'App\Http\Controllers\BLController@sendLead');
  Route::get('get-menu', 'App\Http\Controllers\BLController@getMenu');
  Route::get('get-rating', 'App\Http\Controllers\RatingController@getRating');
  Route::post('set-rating', 'App\Http\Controllers\RatingController@setRating');
  Route::post('send-vacancy', 'App\Http\Controllers\VacancyController@sendVacancy');
  Route::get('check-refer-balance', 'App\Http\Controllers\RefersController@checkBalance');
  Route::get('blog-load', 'App\Http\Controllers\BlogController@loader');
});

// Public API
Route::group(['prefix' => 'public'], function () {
  Route::get('pr-data', 'App\Http\Controllers\API\PromoDataController@globalData');
  Route::get('prices-data', 'App\Http\Controllers\API\PromoDataController@pricesData');
});
