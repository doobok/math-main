<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PaysController;
use App\Http\Controllers\SitemapController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::post('/wayforpay-public', [PaysController::class, 'webhook']);

Route::group(['prefix' => App\Http\Middleware\LocaleMiddleware::getLocale()], function(){

  Route::get('/', [PagesController::class, 'index'])->name('mainpage');
  Route::get('/tutor-pay', [PaysController::class, 'index'])->name('pay');
  Route::get('/pay-successful', [PaysController::class, 'successful'])->name('pay-suc');
  Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');
  Route::get('/blog/{slug}', [BlogController::class, 'blog'])->name('blog');
  Route::get('/{slug}', [PagesController::class, 'page'])->name('page');

});

Route::get('setlocale/{lang}', [LocaleController::class, 'setLocale'])->name('setlocale');
