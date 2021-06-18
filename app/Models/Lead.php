<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Promo;

class Lead extends Model
{
    use HasFactory;

    protected $fillable = ['firstname', 'lastname', 'cityId', 'phone', 'klass', 'subjectId', 'priceId', 'cost', 'discount', 'total', 'promoStatus', 'promo', 'marker', 'fullForm'];

    protected static function boot()
    {

        static::created(function($instance)
      {
          $promo = Promo::where('code', $instance->promo)->where('active', 1)->first();

          if ($promo) {
            $promo->count++;
            $promo->save();
          }

        });

        parent::boot();
    }

}
