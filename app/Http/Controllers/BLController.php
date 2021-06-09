<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;

class BLController extends Controller
{
    //Get cities
    public function getCityes()
    {
      $cityes = City::where('active', 1)->orderBy('order')->get()->translate(\App::getLocale());
      return $cityes;
    }
    //Get main city
    public function getCity()
    {
      $city = City::where('active', 1)->orderBy('order')->first()->translate(\App::getLocale());
      return $city;
    }
    //Get main city by ID
    public function getCityById(Request $request)
    {
        $city = City::where('active', 1)->where('id', $request->id)->first();
        if (!$city) {
          //получаем город по умолчанию
          return self::getCity();
        }

      return $city->translate(\App::getLocale());
    }
}
