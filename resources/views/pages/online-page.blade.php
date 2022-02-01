@extends('app')

@section('head')
@component('components.meta')

  @slot('title') {{$page->getTranslatedAttribute('title')}} @endslot
  @slot('description') {{$page->getTranslatedAttribute('description')}} {{__('seo.desc-tail', ['phone' => setting('info.phone')])}}  @endslot
  @slot('image') {{ Voyager::image( $page->image ) }} @endslot
  @slot('date') {{$page->created_at}} @endslot

@endcomponent
@endsection

@section('main')

  @include('layouts.partials.firstscreen', [
    'img' => Voyager::image( $page->image ),
    'h1' => $page->getTranslatedAttribute('h1'),
    'desc' => $page->getTranslatedAttribute('subtitle'),
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
    <div class="container mx-auto px-0 md:px-4 md:pb-12 lg:pb-24">
      <div class="flex justify-center">
        <div class="w-full xl:w-8/12 px-8 md:px-24">

          @component('components.breadcrumbs', [
            'crumbs' => [
                ['', $page->getTranslatedAttribute('h1')]
              ],
            ])
          @endcomponent

          @include('layouts.partials.page-price-nav')

          <article>
            <div class="bg-white w-full text-lg md:text-2xl text-gray-800 leading-normal" style="font-family:Georgia,serif;">

              {!! $page->getTranslatedAttribute('text') !!}

            </div>
          </article>

          <star-rating
          slug="{{$page->slug}}"
          ></star-rating>

        </div>
      </div>

    </div>
  </section>

  <section id="prices" class="pb-20 relative block bg-blue-300">
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
          class="text-blue-300 fill-current"
          points="2560 0 2560 100 0 100"
        ></polygon>
      </svg>
    </div>
    <div class="container mx-auto px-4 pt-16 md:pb-12 lg:pt-24 lg:pb-24">

      <div class="flex flex-wrap text-center justify-center">
        <div class="w-full lg:w-6/12 px-4">
          <h2 class="text-4xl font-semibold">{{__('main.h2-prices')}}</h2>
          <p class="text-lg leading-relaxed mt-4 mb-4">
            {{__('main.desc-prices')}}
          </p>
        </div>
      </div>

      <prices-cards category="online" pays="{{setting('info.payment')}}"></prices-cards>

      <div class="text-sm pt-4 text-center">
        {{__('main.footnote-prices')}}
      </div>

      <div class="flex justify-center pt-6">
        @include('layouts.partials.trial-button')
      </div>

    </div>
  </section>

  @include('layouts.partials.mainpage.todo-block')

{{-- schema --}}
  @include('layouts.schema.product', [
    'name' => $page->getTranslatedAttribute('h1'),
    'description' => $page->getTranslatedAttribute('title'),
    'image' => Voyager::image( $page->image ),
    'price' => $price->minimal,
    'date' => $price->date,
    'sku' => $page->slug,
    'mpn' => $page->slug
  ])
@endsection
