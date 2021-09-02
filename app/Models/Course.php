<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;
use Illuminate\Support\Facades\Notification;
use App\Notifications\TelegramPubNewCource;

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

      static::saving(function($instance)
      {
        if ($instance->active && $instance->published) {
          //telegram notification
          if (setting('services.telegram_notify') == true) {
            $title = $instance->h1;
            $subtitle = $instance->title;
            $text = $instance->meta;
            $url = config('app.url') . '/' . $instance->slug;
            $date = $instance->next_start;

            Notification::send('', new TelegramPubNewCource($title, $subtitle, $text, $url, $date));

            $instance->published = null;
          }
        }

      });

      parent::boot();
  }

}
