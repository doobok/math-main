<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Tutor;
use App\Models\Subject;
use App\Models\City;
use App\Models\Page;
use Illuminate\Support\Facades\App;

class PagesController extends Controller
{
    public function index()
    {
        $reviews = Review::where('active', 1)->where('order', '>', 0)->orderBy('order')->get();
        $subjects = Subject::where('active', 1)->orderBy('order')->select('id', 'h1', 'name', 'promodesc', 'svg', 'slug')->get()->translate( App::currentLocale() );
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
      switch ($slug) {
        // check contacts
        case 'contacts':
          return view('pages.contacts-page', ['cityes' => City::where('active', 1)->get()]);
        break;
        // check reviews
        case 'reviews':
          return view('pages.reviews-page', ['reviews' => Review::where('active', 1)->orderBy('order')->get()]);
        break;
        // check online
        case 'online':
          return view('pages.online-page', ['page' => Page::where('slug', 'online')->first()]);
        break;
        // check groups
        case 'groups':
          return view('pages.groups-page', ['page' => Page::where('slug', 'groups')->first()]);
        break;

        default:
          // check Subject
          $subject = Subject::where('slug', $slug)->first();
          if ($subject != null) {
            $tutors = Tutor::where('active', 1)->orderBy('order')->get()->translate( App::currentLocale() );

            $tutors_with_tags = collect();
            foreach ($tutors as $tutor) {
              $tut = Tutor::find($tutor->id);
              $tutor->tgs = $tut->tags->where('active', 1)->translate( App::currentLocale() );
              $tutors_with_tags->push($tutor);
            }
            return view('pages.subject-page', [
              'page' => $subject,
              'tutors' => $tutors_with_tags,
            ]);
          };

          $page = Page::where('slug', $slug)->firstOrFail();

            return view('pages.page', [
              'page' => $page,
            ]);

          break;
      }


    }
}
