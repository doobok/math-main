<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;

use NotificationChannels\Telegram\TelegramChannel;
use NotificationChannels\Telegram\TelegramMessage;

class TelegramNewLead extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
     public function __construct($marker, $phone, $name, $cityId, $subjectId, $priceId, $klass, $cost, $discount, $total, $promo, $promoStatus, $fullForm)
     {
       $this->phone = $phone;
       $this->marker = $marker;
       $this->name = $name;
       $this->cityId = $cityId;
       $this->subjectId = $subjectId;
       $this->priceId = $priceId;
       $this->klass = $klass;
       $this->cost = $cost;
       $this->discount = $discount;
       $this->total = $total;
       $this->promo = $promo;
       $this->promoStatus = $promoStatus;
       $this->fullForm = $fullForm;

     }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [TelegramChannel::class];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */

     public function toTelegram($notifiable)
     {

         return TelegramMessage::create()
             ->to(config('app.telegramchat'))
             ->content("🧲 *Нова заявка на сайті!* \n *$this->name*  \n Клас: *$this->klass* \n Id міста: *$this->cityId* \n Id предмета: *$this->subjectId* \n Id пакета: *$this->priceId* \n Вартість: *$this->cost* \n Знижка: *$this->discount* \n Загалом: *$this->total* \n Промокод: *$this->promo* \n Промокод активовано: *$this->promoStatus* \n Повна форма: *$this->fullForm* \n мітка *$this->marker* \n ```$this->phone```");
     }


    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
