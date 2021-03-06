@extends('app')

@section('head')
@component('components.meta')

  @slot('title') {{$page->getTranslatedAttribute('title')}} @endslot
  @slot('description')
    @if (!$page->description)
      {{__('seo.subj-desc', [
        'text' => $page->getTranslatedAttribute('promodesc')
      ])}}
    @else
      {{$page->getTranslatedAttribute('description')}}
    @endif
  @endslot
  @slot('image') {{ Voyager::image( $page->image ) }} @endslot
  @slot('date') {{$page->created_at}} @endslot

@endcomponent
@endsection

@section('main')

  @include('layouts.partials.firstscreen', [
    'img' => Voyager::image( $page->image ),
    'h1' => $page->getTranslatedAttribute('h1'),
    'desc' => $page->getTranslatedAttribute('promodesc'),
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

  <section class="pb-12 relative block bg-white">
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
          class="text-white fill-current"
          points="2560 0 2560 100 0 100"
        ></polygon>
      </svg>
    </div>
    <div class="container mx-auto px-0 md:px-4 md:pb-12">
      <div class="flex justify-center">
        <div class="w-full xl:w-8/12 px-8 md:px-24">

          @component('components.breadcrumbs', [
            'crumbs' => [
                ['', $page->getTranslatedAttribute('h1')]
              ],
            ])
          @endcomponent

        @include('layouts.partials.subject-page-nav')

        <article>
          <div class="bg-white w-full text-lg md:text-2xl text-gray-800 leading-normal" style="font-family:Georgia,serif;">

            {!! $page->getTranslatedAttribute('text') !!}

    				{{-- <p class="text-2xl md:text-3xl mb-5">
    					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
    				</p> --}}
          </div>

          </article>

          <star-rating
          slug="{{$page->slug}}"
          ></star-rating>

        </div>
      </div>
    </div>
  </section>


  @include('layouts.partials.mainpage.reviews')
  @include('layouts.partials.mainpage.tutors')
  @include('layouts.partials.mainpage.pricing')
  @include('layouts.partials.mainpage.todo-block')



{{-- schema --}}
  @include('layouts.schema.product', [
    'name' => $page->getTranslatedAttribute('h1'),
    'description' => $page->getTranslatedAttribute('promodesc'),
    'image' => Voyager::image( $page->image ),
    'price' => $price->minimal,
    'date' => $price->date,
    'sku' => $page->slug,
    'mpn' => $page->slug
  ])
@endsection
