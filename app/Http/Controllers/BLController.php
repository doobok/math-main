<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Subject;
use App\Models\Price;
use App\Models\Promo;
use App\Models\Lead;
use Illuminate\Support\Facades\App;
use Carbon\Carbon;
use Illuminate\Support\Facades\Notification;
use App\Notifications\TelegramNewLead;

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
      return Subject::where('active', 1)->select('id', 'h1', 'name')->get()->translate( $request->locale );
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
    // get prices list
    public function getPricesList(Request $request)
    {
      return Price::where('active', 1)->orderBy('group')->orderBy('count')->get()->translate( $request->locale );
    }

    // PROMO code
    //
    // Check promo
    public function checkPromo(Request $request)
    {
      $promo = Promo::where('code', $request->promo)->where('active', 1)->first();

      $valid = 'no';
      $type = '';
      $value = 0;
      // якщо промокод знайдено
      if ($promo) {
        // перевіряємо наявність лімітів
        if ($promo->limit_count > 0 ||  $promo->limit_date) {
          // перевіряємо ліміт кількості
          if ($promo->limit_count > 0) {
            // якщо ліміт активний перевіряємо остачу
            if ($promo->limit_count > $promo->count) {
              $valid= 'yes';
            }
          }
          // перевіряємо ліміт дати
          if ($promo->limit_date) {
            if ($promo->limit_date > Carbon::today()->toDateString()) {
              $valid= 'yes';
            }
          }
        } else {
          $valid= 'yes';
        }
        // якщо перевірки успішні працюємо із дисконтом
        if ($valid === 'yes') {
          // якщо знижка < 100 знижка вважаэться відсотковою
          if ($promo->discount < 100) {
            $type = 'percent';
          } else {
            $type = 'cash';
          }
          // задаємо значення
          $value = $promo->discount;
        }
      }
      // збираємо масив
      $data = [
        'valid' => $valid,
        'type' => $type,
        'value' => $value,
          ];

      return $data;
    }

    // LEAD code
    //
    // SEnd Lead
    public function sendLead(Request $request)
    {
       $lead = Lead::create($request->all());

       $lead->total = $lead->cost - $lead->discount;
       $lead->save();

       // формируем сообщение
        $phone = '+38' . $request->phone;
        $marker = $request->marker;
        $name = $request->firstname . ' ' . $request->lastname;
        $cityId = $request->cityId;
        $subjectId = $request->subjectId;
        $priceId = $request->priceId;
        $klass = $request->klass;
        $cost = $request->cost;
        $discount = $request->discount;
        $total = $cost - $discount;
        $promo = $request->promo;
        $promoStatus = $request->promoStatus;
        $fullForm = $request->fullForm;

        //telegram notification
        Notification::send('', new TelegramNewLead($marker, $phone, $name, $cityId, $subjectId, $priceId, $klass, $cost, $discount, $total, $promo, $promoStatus, $fullForm));

       return response()->json(['success' => true]);
    }

    public function getMenu(Request $request)
    {
      return menu('main_menu', '_json')->translate( $request->locale );
    }


}
