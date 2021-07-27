@extends('app')

@section('head')
@component('components.meta')

  @slot('title') {{__('seo.services-title')}} @endslot
  @slot('description') {{__('seo.services-desc', [
      'phone' => setting('info.phone')
    ])}} @endslot
  @slot('image') /services.jpg @endslot
  @slot('date') {{config('app.startdate')}} @endslot

@endcomponent
@endsection

@section('main')

  @include('layouts.partials.firstscreen', [
    'img' => "/services.jpg",
    'h1' => __('site.services'),
    'desc' => __('site.services-desc'),
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

  <section class="pb-20 relative block bg-white">
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
        <div class="w-full xl:w-10/12 px-8 md:px-24">

          @component('components.breadcrumbs', [
            'crumbs' => [
                ['', __('site.services')]
              ],
            ])
          @endcomponent

          <article>
            <div class="bg-white w-full text-xl md:text-2xl text-gray-800 leading-normal" style="font-family:Georgia,serif;">
              <blockquote>
                {!! __('site.services-pre-text') !!}
              </blockquote>
            </div>
          </article>

          <div class="flex flex-wrap">

          @foreach ($services as $subject)
            <div class="pt-6 px-4 text-center w-full">

              <div
                class="relative flex flex-col min-w-0 break-words bg-blue-100 w-full mb-1 lg:mb-8 shadow-lg rounded-lg"
              >
                <div class="px-4 py-5 flex-auto">
                  <div class="text-gray-600 flex justify-center p-3 mb-5">
                    <svg class="h-16" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd" fill="currentColor">
                      {!!$subject->svg!!}
                    </svg>
                  </div>
                  <h6 class="text-xl font-semibold">
                    <a href="{{route('page', $subject->slug)}}" title="{{$subject->name}}">
                      {{$subject->h1}}
                    </a>
                  </h6>
                  <p class="mt-2 mb-4 text-gray-600">
                    {{$subject->promodesc}}
                  </p>
                  {{-- tags --}}
                  <div class="flex flex-wrap justify-center p-4 space-x-1">
                    @foreach ($subject->tags->where('active', 1) as $tag)
                      <a href="{{route('page', $tag->url)}}" class="rounded-full p-1 bg-gray-700 text-white hover:bg-yellow-400 hover:text-gray-900 text-xs mb-1" title="{{$tag->getTranslatedAttribute('name')}}">{{$tag->getTranslatedAttribute('name')}}</a>
                    @endforeach
                  </div>
                  {{-- tags end --}}
                </div>
              </div>

              </div>

            @endforeach
          </div>

    			</div>

        </div>
      </div>

    </div>
  </section>



@endsection
