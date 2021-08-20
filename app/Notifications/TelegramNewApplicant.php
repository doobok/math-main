<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;

use NotificationChannels\Telegram\TelegramChannel;
use NotificationChannels\Telegram\TelegramMessage;

class TelegramNewApplicant extends Notification
{
    use Queueable;

    public function __construct($phone, $name, $comment)
    {
      $this->phone = $phone;
      $this->name = $name;
      $this->comment = $comment;
    }

     public function via($notifiable)
     {
         return [TelegramChannel::class];
     }

     public function toTelegram($notifiable)
     {

         return TelegramMessage::create()
             ->to(config('app.telegramchat'))
             ->content("🩸 *Заявка від кандидата: $this->name* \n $this->comment \n ```$this->phone```");
     }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
