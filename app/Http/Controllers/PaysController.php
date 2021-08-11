<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lead;

class PaysController extends Controller
{
    public function index(Request $request)
    {
      $deal = Lead::where('id', $request->deal)->first();

      return view('pays.index', [
        'deal' => $deal,

      ]);
    }
}
