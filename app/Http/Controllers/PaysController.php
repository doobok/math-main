<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lead;
use App\Models\Price;
use Maksa988\WayForPay\Facades\WayForPay;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;

class PaysController extends Controller
{
    public function index(Request $request)
    {
      $deal = Lead::where('id', $request->deal)->select('id', 'firstname', 'lastname', 'cost', 'total', 'priceId', 'created_at', 'status')->first();
      // Якщо заявка не знайдена або її статус не нова - віддаємо 404
      if (!$deal) { return abort(404); }
      if ($deal->status != 'new') { return abort(404); }

      $price = Price::where('id', $deal->priceId)->first()->translate( App::currentLocale() );
      $productName = 'Пакет «' . $price->name . '»';

      $order_id = time() . '--' . $deal->id; // Payment`s order ID
      $amount = $deal->total; // Payment`s amount
      // $amount = 1; // Payment`s amount
      $currency = 'UAH';

      $client = new \Maksa988\WayForPay\Domain\Client(
        $deal->firstname, $deal->lastname
      );

      $products = new \Maksa988\WayForPay\Collection\ProductCollection([
          new \WayForPay\SDK\Domain\Product(
            $productName, $deal->total, 1
          ),
      ]);

      //

      // $data = WayForPay::purchase($order_id, $amount, $client, $products)->getData(); // Array of data for using to create your own form.
      // $form = WayForPay::purchase($order_id, $amount, $client, $products)->getAsString($submitText = 'Pay', $buttonClass = 'btn btn-primary'); // Get html form as string

      $widget = WayForPay::purchase($order_id, $amount, $client, $products, $currency)->getWidget($callbackJsFunction = null, $buttonText = __('site.pay'), $buttonClass = 'bg-green-400 hover:bg-yellow-400 text-white p-4 px-10 text-sm font-bold uppercase rounded shadow outline-none shadow hover:shadow-lg'); // Get html form as string

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
            if (setting('services.telegram_notify') == true) {
              \Illuminate\Support\Facades\Notification::send('', new \App\Notifications\TelegramSimpleMSG('Замовлення id:' . $deal->id . ' оплачене'));
            }
          }
          // Log::info('Aproved');


        }
        // збираємо змінні для відповіді
        $orderReference = $obj['orderReference'];
        $status = "accept";
        $time = time();

        // $data = WayForPay::handleServiceUrl($request);
        // return self::handle($request);


        return response()->json(['orderReference' => $orderReference, 'status' => $status, 'time' => $time, 'signature' => '']);

    }

    // public function handle(Request $request)
    // {
    //     return WayForPay::handleServiceUrl($request, function (\WayForPay\SDK\Domain\Transaction $transaction, $success) {
    //         if($transaction->getReason()->isOK()) {
    //
    //             // Payment confirmation process and etc...
    //
    //             return $success();
    //         }
    //
    //         return "Error: ". $transaction->getReason()->getMessage();
    //     });
    // }
}
