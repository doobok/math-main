@extends('app')

@section('head')
@component('components.meta')

  @slot('title') {{__('seo.reviews-title')}} @endslot
  @slot('description') {{__('seo.reviews-desc', [
      'phone' => setting('info.phone')
    ])}} @endslot
  @slot('image') /reviews.jpg @endslot
  @slot('date') {{config('app.startdate')}} @endslot

@endcomponent
@endsection

@section('main')

  @include('layouts.partials.firstscreen', [
    'img' => "/reviews.jpg",
    'h1' => __('site.reviews'),
    'desc' => __('site.reviews-desc'),
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
                ['', __('site.reviews')]
              ],
            ])
          @endcomponent

          <div class="flex flex-wrap">

          @foreach ($reviews as $review)
            <div class="pt-6 px-4 text-center w-full md:w-1/2 lg:w-1/3">

                <div class="flex flex-col min-w-0 break-words bg-yellow-100 w-full mb-8 shadow-lg rounded-lg">
                  <div class="px-4 py-5 flex-auto">
                    <div class="text-white p-3 text-center inline-flex items-center justify-center w-26 h-26 mb-5 shadow-lg rounded-full bg-green-400">
                    <div class="relative w-24 h-24">
                      <img class="rounded-full border border-white shadow-sm w-full" src="
                      @if ($review->image)
                        {{ Voyager::image( $review->image ) }}                        
                      @else
                        /review-ava.png
                      @endif
                      " alt="{{__('site.review')}} {{$review->name}}" />
                    </div>
                    </div>
                    <h6 class="text-xl font-semibold">{{$review->name}}</h6>
                    <div class="flex space-x-2 text-yellow-400 justify-center">

                      @for ($i=0; $i < $review->stars; $i++)
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="currentColor"><path d="M12 .587l3.668 7.568 8.332 1.151-6.064 5.828 1.48 8.279-7.416-3.967-7.417 3.967 1.481-8.279-6.064-5.828 8.332-1.151z"/></svg>
                      @endfor

                    </div>
                    <p class="mt-2 mb-4 text-gray-600" >
                      {!! $review->text !!}
                    </p>
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
