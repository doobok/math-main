<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Tutor;
use App\Models\Subject;
use Illuminate\Support\Facades\App;

class PagesController extends Controller
{
    public function index()
    {
        $reviews = Review::where('active', 1)->where('order', '>', 0)->orderBy('order')->get();
        $subjects = Subject::where('active', 1)->orderBy('order')->select('id', 'h1', 'name', 'promodesc', 'svg')->get()->translate( App::currentLocale() );
        $tutors = Tutor::where('active', 1)->orderBy('order')->get()->translate( App::currentLocale() );

        $tutors_with_tags = collect();
        foreach ($tutors as $tutor) {
          $tut = Tutor::find($tutor->id);
          $tutor->tgs = $tut->tags->where('active', 1)->translate( App::currentLocale() );
          $tutors_with_tags->push($tutor);
        }

          return view('pages.index', [
            'reviews' => $reviews,
            'tutors' => $tutors_with_tags,
            'subjects' => $subjects,
          ]);
    }

    public function page($slug)
    {
      // check Subject
      $subject = Subject::where('slug', $slug)->first();
      if ($subject != null) {
        return view('pages.subject-page', [
          'page' => $subject,
        ]);
      }


      return view('pages.page', [
        'slug' => $slug,
      //   'tutors' => $tutors,
      //   'subjects' => $subjects,
      ]);
    }
}
