<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Course extends Model
{
    use HasFactory;
    use Translatable;

      protected $fillable = ['slug'];

    protected $translatable = ['title', 'description', 'h1', 'subtitle', 'skills', 'forwhom', 'program', 'text', 'finish_skills', 'meta', 'price_desc', 'price_extra_desc', 'price_vip_desc'];

    protected static function boot()
  {

      static::created(function($instance)
      {
          $instance->slug = 'crs-' . $instance->id;
          $instance->save();
      });

      parent::boot();
  }

}
