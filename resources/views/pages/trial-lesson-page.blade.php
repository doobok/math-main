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

  <section id="prices" class="pb-20 relative block bg-green-300">
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
          class="text-green-300 fill-current"
          points="2560 0 2560 100 0 100"
        ></polygon>
      </svg>
    </div>
    <div class="container mx-auto px-4 pt-16 md:pb-12 lg:pt-24 lg:pb-24">

      <div class="flex flex-wrap text-center justify-center">
        <div class="w-full lg:w-6/12 px-4">
          <h2 class="text-4xl font-semibold">{{__('site.trial-price')}}</h2>
          <p class="text-lg leading-relaxed mt-4">
            {{__('site.trial-price-desc')}} *
          </p>
        </div>
      </div>

      <div class="flex flex-col sm:flex-row justify-center my-4 md:my-10">

      <div class="flex flex-col bg-white lg:w-1/3 w-full mx-auto lg:mx-0 rounded-lg lg:rounded-l-lg mt-4 shadow hover:shadow-lg">
        <div class="flex-1 bg-white text-gray-600 rounded-t rounded-b-none overflow-hidden shadow">
          <div class="p-8 text-3xl font-bold text-center border-b-4 flex flex-wrap justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 mr-2" viewBox="0 0 24 24" fill="currentColor">
              <path d="M23.334 11.96c-.713-.726-.872-1.829-.393-2.727.342-.64.366-1.401.064-2.062-.301-.66-.893-1.142-1.601-1.302-.991-.225-1.722-1.067-1.803-2.081-.059-.723-.451-1.378-1.062-1.77-.609-.393-1.367-.478-2.05-.229-.956.347-2.026.032-2.642-.776-.44-.576-1.124-.915-1.85-.915-.725 0-1.409.339-1.849.915-.613.809-1.683 1.124-2.639.777-.682-.248-1.44-.163-2.05.229-.61.392-1.003 1.047-1.061 1.77-.082 1.014-.812 1.857-1.803 2.081-.708.16-1.3.642-1.601 1.302s-.277 1.422.065 2.061c.479.897.32 2.001-.392 2.727-.509.517-.747 1.242-.644 1.96s.536 1.347 1.17 1.7c.888.495 1.352 1.51 1.144 2.505-.147.71.044 1.448.519 1.996.476.549 1.18.844 1.902.798 1.016-.063 1.953.54 2.317 1.489.259.678.82 1.195 1.517 1.399.695.204 1.447.072 2.031-.357.819-.603 1.936-.603 2.754 0 .584.43 1.336.562 2.031.357.697-.204 1.258-.722 1.518-1.399.363-.949 1.301-1.553 2.316-1.489.724.046 1.427-.249 1.902-.798.475-.548.667-1.286.519-1.996-.207-.995.256-2.01 1.145-2.505.633-.354 1.065-.982 1.169-1.7s-.135-1.443-.643-1.96zm-12.584 5.43l-4.5-4.364 1.857-1.857 2.643 2.506 5.643-5.784 1.857 1.857-7.5 7.642z"/>
            </svg>
            <span>{{__('site.trial-lesson')}}</span>
          </div>
          <ul class="w-full text-center text-sm">
            <div class="w-full pt-6 text-4xl text-gray-600 font-bold text-center py-4 flex justify-center">
                <div class="rounded-full bg-yellow-200 py-4 px-10">
                  <span class="text-2xl line-through text-red-400 align-top leading-3">{{$price->current}}</span>
                  {{ number_format($price->discount, 0, ',', ' ')}}
                  <span class="text-base">грн.</span>
                </div>
            </div>
            <li class="py-4 border-b mx-4 text-base">
              {{__('site.trial-lesson-desc')}}
            </li>
          </ul>
        </div>
        <div class="flex-none mt-auto bg-white rounded-b rounded-t-none overflow-hidden shadow p-6">
          <div class="flex items-center justify-center relative">
            @if (setting('info.payment'))
              <img class="top-0 right-0 h-8 absolute" src="/pays.png" alt="installment plan" />
            @endif
            <smpl-buttoncrs price="{{$price->discount}}" txt="{{__('site.service')}} «{{__('site.trial-lesson')}}»"></smpl-buttoncrs>
          </div>
        </div>
      </div>

      </div>
      <div class="text-sm pt-4 text-center">
        * {{__('site.trial-price-post-desc')}}
      </div>
    </div>
  </section>

  @include('layouts.partials.mainpage.pricing')

  @include('layouts.partials.mainpage.todo-block')

{{-- schema --}}
  @include('layouts.schema.product', [
    'name' => $page->getTranslatedAttribute('h1'),
    'description' => $page->getTranslatedAttribute('title'),
    'image' => Voyager::image( $page->image ),
    'price' => $price->current,
    'date' => $price->date,
    'sku' => $page->slug,
    'mpn' => $page->slug
  ])
@endsection
