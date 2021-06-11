<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Tutor;
use Illuminate\Support\Facades\App;

class PagesController extends Controller
{
    public function index()
    {
        $reviews = Review::where('active', 1)->where('order', '>', 0)->orderBy('order')->get();
        $tutors = Tutor::where('active', 1)->orderBy('order')->get()->translate( App::currentLocale() );

          return view('pages.index', [
            'reviews' => $reviews,
            'tutors' => $tutors,
          ]);
    }
}
