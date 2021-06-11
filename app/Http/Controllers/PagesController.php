<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class PagesController extends Controller
{
    public function index()
    {
        $reviews = Review::where('active', 1)->orderBy('order')->get();

          return view('pages.index', [
            'reviews' => $reviews,
          ]);
    }
}
