<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Subject;
use App\Models\Price;
use Illuminate\Support\Facades\App;

class BLController extends Controller
{
    // City BLOCK
    //
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

    // Subjects BLOCK
    //
    // Get subjects labels
    public function getSubjectsNames(Request $request)
    {
      return Subject::where('active', 1)->select('id', 'h1')->get()->translate( $request->locale );
    }

    // Price BLOCK
    //
    //Get prices
    //Get main city
    public function getPrices(Request $request)
    {
      $personal = Price::where('active', 1)->where('group', 1)->orderBy('count')->limit(3)->get()->translate( $request->locale );
      $group = Price::where('active', 1)->where('group', 2)->orderBy('count')->limit(3)->get()->translate( $request->locale );
      $online = Price::where('active', 1)->where('group', 3)->orderBy('count')->limit(3)->get()->translate( $request->locale );

      $data = [
        'personal' => $personal,
        'group' => $group,
        'online' => $online
          ];

      return $data;
    }

}
