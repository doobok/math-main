<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use Illuminate\Support\Facades\App;

class BLController extends Controller
{
    //Get cities
    public function getCityes(Request $request)
    {
      return City::where('active', 1)->orderBy('order')->get()->translate( $request->locale );
    }
    //Get main city
    public function getCity(Request $request)
    {
      $city = City::where('active', 1)->orderBy('order')->first()->translate( $request->locale );
      return $city;
    }
    //Get main city by ID
    public function getCityById(Request $request)
    {
        $city = City::where('active', 1)->where('id', $request->id)->first();
        if (!$city) {
          //получаем город по умолчанию
          return self::getCity($request);
        }

      return $city->translate( $request->locale );
    }
}
