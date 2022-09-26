<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Subject;
use App\Models\Price;
use App\Models\Promo;
use App\Models\Lead;
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
      return City::where('active', 1)->orderBy('order')->get()->translate( $request->input('locale') );
    }
    //Get main city
    public function getCity(Request $request)
    {
      $city = City::where('active', 1)->orderBy('order')->first()->translate( $request->input('locale') );
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

      return $city->translate( $request->input('locale') );
    }

    // Subjects BLOCK
    //
    // Get subjects labels
    public function getSubjectsNames(Request $request)
    {
      return Subject::where('active', 1)->select('id', 'h1', 'name')->get()->translate( $request->input('locale') );
    }

    // Price BLOCK
    //
    //Get prices
    //Get main city
    public function getPrices(Request $request)
    {
      $personal = Price::where('active', 1)->where('group', 1)->orderBy('count')->limit(3)->get()->translate( $request->input('locale') );
      $group = Price::where('active', 1)->where('group', 2)->orderBy('count')->limit(3)->get()->translate( $request->input('locale') );
      $online = Price::where('active', 1)->where('group', 3)->orderBy('count')->limit(3)->get()->translate( $request->input('locale') );

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
      return Price::where('active', 1)->orderBy('group')->orderBy('count')->get()->translate( $request->input('locale') );
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
       $lead->status = 'new';
       $lead->save();

       // формируем сообщение
        $phone = '+38' . $request->phone;
        $marker = $request->marker;
        $name = 'id: ' . $lead->id . ' ' . $request->firstname . ' ' . $request->lastname;
        $cityId = $request->cityId;
        if ($cityId) {
          $cityId = City::where('id', $cityId)->value('name');
        }
        $subjectId = $request->subjectId;
        if ($subjectId) {
          $subjectId = Subject::where('id', $subjectId)->value('name');
        }
        $priceId = $request->priceId;
        if ($priceId) {
          $priceId = Price::where('id', $priceId)->value('name');
        }
        $klass = $request->klass;
        $cost = $request->cost;
        $discount = $request->discount;
        $total = $cost - $discount;
        $promo = $request->promo;
        $promoStatus = $request->promoStatus;
        $fullForm = $request->fullForm;

        //telegram notification
        if (setting('services.telegram_notify')) {
          Notification::send('', new TelegramNewLead($marker, $phone, $name, $cityId, $subjectId, $priceId, $klass, $cost, $discount, $total, $promo, $promoStatus, $fullForm));
        }

//        // отправляем в retailCRM
//        if (setting('services.retailcrm_on') == true) {
//
//          $client = new \RetailCrm\ApiClient(
//              config('app.retailcrm_url'),
//              config('app.retailcrm_api'),
//              \RetailCrm\ApiClient::V4
//          );
//
//          try {
//              $response = $client->request->ordersCreate(array(
//                  // 'summ' => $request->price, //цена
//                  'externalId' => 'tm' . $lead->id, // Зовнішній ID заказа
//                  'phone' => $phone, // телефон
//                  'firstName' => $request->firstname, // Імʼя
//                  'lastName' => $request->lastname, // Прізвище
//                  'customerComment' => $subjectId . ' ' . $priceId, // тайтл кнопки
//                  'discount' => $discount, // скидка
//                  'items' => array(
//                    array(
//                      'initialPrice' => $cost, // цена заказа
//                    )
//                  ),
//                  'customFields' => array(
//                      'us_city' => $cityId,
//                      'us_class' => $klass
//                  )
//              ));
//          } catch (\RetailCrm\Exception\CurlException $e) {
//              // echo "Connection error: " . $e->getMessage();
//          }
//
//        }

       return response()->json(['success' => true, 'id' => $lead->id,  'total' => $lead->total,]);
    }

    public function getMenu(Request $request)
    {
      return menu('main_menu', '_json')->translate( $request->input('locale') );
    }


}
