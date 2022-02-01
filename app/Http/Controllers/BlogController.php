<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Rating;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function blog($slug)
    {
        // get rating
        $rating = Rating::where('slug', $slug)->first();
        if ($rating === null) {
            $rating = collect();
            $rating->rating = 5;
            $rating->count = 1;
        }
        $blog = Blog::where('slug', $slug)->firstOrFail();
        $blog->views++;
        $blog->save();

        return view('pages.blog-page', [
            'page' => $blog,
            'rating' => $rating,
        ]);
    }

    public function loader(Request $request)
    {
        return Blog::with('ratings')
            ->where('active', 1)
            ->orderBy('id', 'desc')
            ->skip( $request->skip )->take(10)->get()
            ->translate( $request->lang );
    }
}
