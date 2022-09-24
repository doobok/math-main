<?php

namespace App\Http\Controllers;

use App\Services\WayForPay;
use Illuminate\Http\Request;
use App\Models\Lead;
use App\Models\Price;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Notification;

class PaysController extends Controller
{
    public function index(Request $request)
    {
        $deal = Lead::findOrFail($request->deal);

        abort_if($deal->status != 'new', 400);

        if ($deal->priceId > 0) {
            $price = Price::where('id', $deal->priceId)->first()->translate(App::currentLocale());
            $productName = 'Пакет «' . $price->name . '»';
        } else {
            $productName = $deal->marker;
        }

        $orderId = time() . '--' . $deal->id;
        $amount = $deal->total;

        $client = [
            'firstname' => $deal->firstname,
            'lastname' => $deal->lastname,
            'phone' => $deal->phone,
        ];

        $widget = (new WayForPay(
            $orderId,
            $amount,
            $client,
            $productName)
        )->getWidget(
            $buttonText = __('site.pay'),
            $buttonClass = 'bg-green-400 hover:bg-yellow-400 text-white p-4 px-10 text-sm font-bold uppercase rounded shadow outline-none shadow hover:shadow-lg'
        );

        return view('pays.index', [
            'deal' => $deal,
            'widget' => $widget,
            'productName' => $productName,

        ]);
    }

    public function successful()
    {
        return view('pays.successful');
    }

    public function webhook(Request $request)
    {
        // отримуємо вміст запиту
        $bodyContent = $request->getContent();
        // декодуємо рядок
        $obj = json_decode($bodyContent, true);
        // якщо статус Підтверджений
        if ($obj['transactionStatus'] === 'Approved') {
            // отримуємо ІД замовлення в системі
            $explode = explode('--', $obj['orderReference']);
            $id = end($explode);
            // шукаємо заявку
            $deal = Lead::where('id', $id)->first();
            // змінюємо статус заявки
            if ($deal->status != 'prepayed') {
                $deal->status = 'prepayed';
                $deal->save();

                // відправляємо сповіщення
                if (setting('services.telegram_notify')) {
                    Notification::send('', new \App\Notifications\TelegramSimpleMSG('Замовлення id:' . $deal->id . ' оплачене'));
                }
            }
        }
        // збираємо змінні для відповіді
        $orderReference = $obj['orderReference'];
        $status = "accept";
        $time = time();

        return response()->json(['orderReference' => $orderReference, 'status' => $status, 'time' => $time, 'signature' => '']);
    }
}
