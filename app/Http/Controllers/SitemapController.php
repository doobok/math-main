<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Subject;
use App\Models\City;
use App\Models\Course;

class SitemapController extends Controller
{
    public function index()
    {
        $mainpage_date = Page::orderBy('updated_at', 'DESC')->value('updated_at');
        $contacts_date = City::where('active', 1)->orderBy('updated_at', 'DESC')->value('updated_at');
        $all = collect();
        $pages= Page::orderBy('created_at', 'DESC')->select('id', 'slug', 'updated_at')->get();
        $subjects = Subject::orderBy('created_at', 'DESC')->select('id', 'slug', 'updated_at')->get();
        $courses = Course::orderBy('created_at', 'DESC')->select('id', 'slug', 'updated_at')->get();
        // $pages->merge($pagesall);


        return response()->view('sitemap', [
                'pages' => $all->merge($subjects)->merge($pages)->merge($courses),
                'mainpage_date' => $mainpage_date,
                'contacts_date' => $contacts_date,

        ])->header('Content-Type', 'text/xml');
    }
}
