<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Refer;
use App\Models\Promo;

class RefersController extends Controller
{
    public function checkBalance(Request $request)
    {
      $refer = Refer::where('code', '=', $request->code)->first();
      $promo = Promo::where('code', '=', $request->code)->first();
      if (!$refer) {
        return __('site.refer-code-invalid');
      } elseif (!$promo->active) {
        return __('site.refer-code-blocked');
      } else {
        return 'баланс: ' . $refer->balance . ' грн.';
      }
    }
}
