<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class RevirewController extends Controller
{
    public function getRevMP()
    {
      // return Review::where('active', 1)->where('order', true)->orderBy('order')->get();
      return Review::where('active', 1)->orderBy('order')->get();
    }
}
