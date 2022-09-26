<?php

namespace App\Jobs;

use App\Models\City;
use App\Models\Lead;
use App\Models\Price;
use App\Models\Subject;
use App\Notifications\TelegramNewLead;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Notification;

class LeadJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected Lead $lead;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Lead $lead)
    {
        $this->lead = $lead;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //telegram notification
        if (setting('services.telegram_notify')) {
            $lead = $this->lead;

            $phone = '+38' . $lead->phone;
            $marker = $lead->marker;
            $name = 'id: ' . $lead->id . ' ' . $lead->firstname . ' ' . $lead->lastname;
            $cityId = $lead->cityId;
            if ($cityId) {
                $cityId = City::where('id', $cityId)->value('name');
            }
            $subjectId = $lead->subjectId;
            if ($subjectId) {
                $subjectId = Subject::where('id', $subjectId)->value('name');
            }
            $priceId = $lead->priceId;
            if ($priceId) {
                $priceId = Price::where('id', $priceId)->value('name');
            }
            $klass = $lead->klass;
            $cost = $lead->cost;
            $discount = $lead->discount;
            $total = $cost - $discount;
            $promo = $lead->promo;
            $promoStatus = $lead->promoStatus;
            $fullForm = $lead->fullForm;

            Notification::send('', new TelegramNewLead($marker, $phone, $name, $cityId, $subjectId, $priceId, $klass, $cost, $discount, $total, $promo, $promoStatus, $fullForm));
        }
    }
}
