<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Tutor;
use App\Models\Subject;
use App\Models\City;
use App\Models\Page;
use App\Models\Rating;
use App\Models\Course;
use App\Models\Price;
use Illuminate\Support\Facades\App;
use Carbon\Carbon;

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
      // get rating
      $rating = Rating::where('slug', $slug)->first();
        if ($rating === null) {
            $rating = collect();
            $rating->rating = 5;
            $rating->count = 1;
          }
      // знаходимо мінімальну ціну
      $min_multipl = Price::orderBy('multipl')->value('multipl');
      $index = City::where('active', 1)->orderBy('money_index')->value('money_index');
        $price = collect();
        $price->min = $min_multipl * $index;
        // визначаємо дату до якої діє ціна
        $price->date = Carbon::today()->endOfMonth()->toDateString();

      switch ($slug) {
        // check contacts
        case 'contacts':
          return view('pages.contacts-page', ['cityes' => City::where('active', 1)->get()]);
        break;
        // check reviews
        case 'reviews':
          return view('pages.reviews-page', ['reviews' => Review::where('active', 1)->orderBy('order')->get()]);
        break;
        // check services
        case 'services':
          return view('pages.services-page', ['services' => Subject::where('active', 1)->orderBy('order')->get()->translate( App::currentLocale() )]);
        break;
        // check courses
        case 'courses':
          return view('pages.courses-page', ['courses' => Course::where('active', 1)->get()->translate( App::currentLocale() )]);
        break;
        // check online
        case 'online':
          return view('pages.online-page', [
            'page' => Page::where('slug', 'online')->first(),
            'rating' => $rating,
            'price' => $price,
          ]);
        break;
        // check groups
        case 'groups':
          return view('pages.groups-page', [
            'page' => Page::where('slug', 'groups')->first(),
            'rating' => $rating,
            'price' => $price,
          ]);
        break;
        // check trial-lesson
        case 'trial-lesson':
          $price->current = $index * 6;
          $price->discount = ($price->current/100) * 90;
          return view('pages.trial-lesson-page', [
            'page' => Page::where('slug', 'trial-lesson')->first(),
            'rating' => $rating,
            'price' => $price,
          ]);
        break;
        // check refer
        case 'refer':
          return view('pages.refer-page', [
            'page' => Page::where('slug', 'refer')->first(),
            'rating' => $rating,
          ]);
        break;

        default:
          // check Subject
          $subject = Subject::where('slug', $slug)->first();
          if ($subject != null) {
            $tutors = Tutor::where('active', 1)->orderBy('order')->get()->translate( App::currentLocale() );
            $reviews = Review::where('active', 1)->where('order', '>', 0)->orderBy('order')->get();

            $tutors_with_tags = collect();
            foreach ($tutors as $tutor) {
              $tut = Tutor::find($tutor->id);
              $tutor->tgs = $tut->tags->where('active', 1)->translate( App::currentLocale() );
              $tutors_with_tags->push($tutor);
            }
            return view('pages.subject-page', [
              'page' => $subject,
              'reviews' => $reviews,
              'tutors' => $tutors_with_tags,
              'rating' => $rating,
              'price' => $price,
            ]);
          };

          // check Course
          $course = Course::where('slug', $slug)->first();
          if ($course != null) {

            // $today = Carbon::today();
            // $start = Carbon::createFromDate($course->next_start);

            $start_date = Carbon::today();
            $days = $start_date->diffInDays($course->next_start, false);

            return view('pages.course-page', [
              'page' => $course,
              'rating' => $rating,
              'days' => $days,
            ]);
          };

          $page = Page::where('slug', $slug)->firstOrFail();

            return view('pages.page', [
              'page' => $page,
              'rating' => $rating,
            ]);

          break;
      }


    }
}
