<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Price;
use App\Models\Tutor;
use App\Models\City;

class PromoDataController extends Controller
{
    // Глобальные данные для лендингов
    public function globalData()
    {

        $social = collect([
            "f" => setting('social.fb'),
            "i" => setting('social.instagram'),
            "y" => setting('social.youtube'),
            "t" => setting('social.telegram'),
        ]);

        $prices = Price::where('active', 1)->select('id', 'name', 'group', 'multipl', 'count')->get();

        $tutors = Tutor::where('active', 1)->select('name', 'image', 'text')->orderBy('order')->limit(4)->get();

        // global variables
        $mindex = City::where('id', 1)->value('money_index');

        $global = collect([
            "mindex" => $mindex,
        ]);

        $data = collect([
            'social' => $social,
            'prices' => $prices,
            'tutors' => $tutors,
            'global' => $global,
        ]);

        return response()->json($data);
    }
//    пакеты услуг с глобальным множителем на украинском
    public function pricesData(){
        $prices = Price::where('active', 1)->select('id', 'name', 'group', 'multipl', 'count')->orderBy('group')->orderBy('multipl', 'desc')->get()->translate('uk');
        // global variables
        $mindex = City::where('id', 1)->value('money_index');
        $global = collect([
            "mindex" => $mindex,
        ]);

        $data = collect([
            'prices' => $prices,
            'global' => $global,
        ]);
        return response()->json($data);
    }

}
