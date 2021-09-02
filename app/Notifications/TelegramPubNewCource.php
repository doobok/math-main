<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;

use NotificationChannels\Telegram\TelegramChannel;
use NotificationChannels\Telegram\TelegramMessage;


class TelegramPubNewCource extends Notification
{
    use Queueable;

    public function __construct($title, $subtitle, $text, $url, $date)
    {
        //
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->text = $text;
        $this->date = date('d-m-Y', strtotime($date));
        $this->url = $url;
    }

    public function via($notifiable)
    {
        return [TelegramChannel::class];
    }

    public function toTelegram($notifiable)
    {

        return TelegramMessage::create()
            ->to(config('app.telegram_public'))
            ->content("📢 *Запускаем курс: $this->title* \n*$this->subtitle* \n$this->text \n\n*📅 Дата старта: $this->date* \n🏃‍♀️ *Спешите, количество мест ограничено!* \n\n $this->url");
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
