<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Refer extends Model
{
    use HasFactory;

    protected static function boot()
    {

        static::creating(function($instance)
        {
            $instance->code = strtoupper($instance->code);

            $promo = new \App\Models\Promo;
            $promo->name = 'ref ' . $instance->name;
            $promo->code = $instance->code;
            $promo->description = 'Реферальний промокод';
            $promo->discount = 5;
            $promo->active = true;
            $promo->save();
        });

        parent::boot();
    }
}
