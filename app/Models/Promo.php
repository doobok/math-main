<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    use HasFactory;

    protected static function boot()
  {

      static::saving(function($instance)
      {
          $instance->code = strtoupper($instance->code);
      });

      parent::boot();
  }
}
