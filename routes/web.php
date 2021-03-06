<?php

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

Route::post('/wayforpay-public', 'App\Http\Controllers\PaysController@webhook');

Route::group(['prefix' => App\Http\Middleware\LocaleMiddleware::getLocale()], function(){

  Route::get('/', 'App\Http\Controllers\PagesController@index')->name('mainpage');
  Route::get('/tutor-pay', 'App\Http\Controllers\PaysController@index')->name('pay');
  Route::get('/pay-successful', 'App\Http\Controllers\PaysController@successful')->name('pay-suc');
  Route::get('/sitemap.xml', 'App\Http\Controllers\SitemapController@index')->name('sitemap');
  Route::get('/blog/{slug}', 'App\Http\Controllers\BlogController@blog')->name('blog');
  Route::get('/{slug}', 'App\Http\Controllers\PagesController@page')->name('page');


});

//Переключение языков
Route::get('setlocale/{lang}', function ($lang) {

    $referer = Redirect::back()->getTargetUrl(); //URL предыдущей страницы
    $parse_url = parse_url($referer, PHP_URL_PATH); //URI предыдущей страницы

    //разбиваем на массив по разделителю
    $segments = explode('/', $parse_url);

    //Если URL (где нажали на переключение языка) содержал корректную метку языка
    if (in_array($segments[1], App\Http\Middleware\LocaleMiddleware::$languages)) {

        unset($segments[1]); //удаляем метку
    }

    //Добавляем метку языка в URL (если выбран не язык по-умолчанию)
    if ($lang != App\Http\Middleware\LocaleMiddleware::$mainLanguage){
        array_splice($segments, 1, 0, $lang);
    }

    //формируем полный URL
    $url = Request::root().implode("/", $segments);

    //если были еще GET-параметры - добавляем их
    if(parse_url($referer, PHP_URL_QUERY)){
        $url = $url.'?'. parse_url($referer, PHP_URL_QUERY);
    }
    return redirect($url); //Перенаправляем назад на ту же страницу

})->name('setlocale');
