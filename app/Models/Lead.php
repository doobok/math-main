<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Promo;
use Illuminate\Support\Facades\Log;

class Lead extends Model
{
    use HasFactory;

    protected $fillable = ['firstname', 'lastname', 'cityId', 'phone', 'klass', 'subjectId', 'priceId', 'cost', 'discount', 'total', 'promoStatus', 'promo', 'marker', 'fullForm'];

    protected static function boot()
    {

        static::created(function($instance)
      {
          // маніпуляції з промокодом
          $promo = Promo::where('code', $instance->promo)->where('active', 1)->first();

          if ($promo) {
            $promo->count++;
            $promo->save();
          }

        });

        // Обновляем  поиск при изменении
        static::updating(function($instance)
        {
            $item = Lead::where('id', $instance->id)->first();

            if ($item->status != $instance->status) {
              Log::info('do someting');

              // змінюємо статус замовлення в retailCRM
              if (setting('services.retailcrm_on') == true) {

                $client = new \RetailCrm\ApiClient(
                    config('app.retailcrm_url'),
                    config('app.retailcrm_api'),
                    \RetailCrm\ApiClient::V4
                );
                try {
                    $response = $client->request->ordersEdit(array(
                        'externalId' => 'tm' . $instance->id, // Зовнішній ID
                        'status' => $instance->status,

                    ));
                } catch (\RetailCrm\Exception\CurlException $e) {
                    // echo "Connection error: " . $e->getMessage();
                }

              }

            }

        });

        parent::boot();
    }

}
