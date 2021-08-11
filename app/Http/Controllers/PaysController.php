<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lead;
use App\Models\Price;
use Maksa988\WayForPay\Facades\WayForPay;
use Illuminate\Support\Facades\App;

class PaysController extends Controller
{
    public function index(Request $request)
    {
      $deal = Lead::where('id', $request->deal)->select('id', 'firstname', 'lastname', 'total', 'priceId', 'created_at')->first();
      $price = Price::where('id', $deal->priceId)->first()->translate( App::currentLocale() );
      $productName = 'Пакет «' . $price->name . '»';

      $order_id = time() . '-' . $deal->id; // Payment`s order ID
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
}
