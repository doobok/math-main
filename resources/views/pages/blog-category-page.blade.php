@extends('app')

@section('head')
    @component('components.meta')

        @slot('title') {{__('seo.blog-title')}} @endslot
        @slot('description') {{__('seo.blog-desc', [
      'phone' => setting('info.phone')
    ])}} @endslot
        @slot('image') /blog.jpg @endslot
        @slot('date') {{config('app.startdate')}} @endslot

    @endcomponent
@endsection

@section('main')

    @include('layouts.partials.firstscreen', [
      'img' => "/blog.jpg",
      'h1' => 'B L O G',
      'desc' => __('site.blog-desc'),
    ])

    <section class="pb-4 md:pb-8 relative block bg-green-500">
        <div
            class="bottom-auto top-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden -mt-20"
            style="height: 80px;"
        >
            <svg
                class="absolute bottom-0 overflow-hidden"
                xmlns="http://www.w3.org/2000/svg"
                preserveAspectRatio="none"
                version="1.1"
                viewBox="0 0 2560 100"
                x="0"
                y="0"
            >
                <polygon
                    class="text-green-500 fill-current"
                    points="2560 0 2560 100 0 100"
                ></polygon>
            </svg>
        </div>

    </section>

    <section class="pb-12 relative block bg-gray-100">
        <div
            class="bottom-auto top-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden -mt-20"
            style="height: 80px;"
        >
            <svg
                class="absolute bottom-0 overflow-hidden"
                xmlns="http://www.w3.org/2000/svg"
                preserveAspectRatio="none"
                version="1.1"
                viewBox="0 0 2560 100"
                x="0"
                y="0"
            >
                <polygon
                    class="text-gray-100 fill-current"
                    points="2560 0 2560 100 0 100"
                ></polygon>
            </svg>
        </div>
        <div class="container mx-auto px-0 md:px-4 md:pb-12">
            <div class="flex justify-center">
                <div class="w-full xl:w-10/12 px-4 md:px-24">

                    @component('components.breadcrumbs', [
                      'crumbs' => [
                          ['', __('site.blog')],
                        ],
                      ])
                    @endcomponent

                    <blog-list lang="{{app()->getLocale()}}"></blog-list>

                </div>
            </div>
        </div>
    </section>

    @include('layouts.partials.mainpage.todo-block')

@endsection
