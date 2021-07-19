@extends('app')

@section('head')
@component('components.meta')

  @slot('title') Tutor-Math @endslot
  @slot('description') Desc  @endslot
  @slot('image') /contacts.jpg @endslot
  @slot('date') {{config('app.startdate')}} @endslot

@endcomponent
@endsection

@section('main')

  @include('layouts.partials.firstscreen', [
    'img' => "/contacts.jpg",
    'h1' => __('site.contacts'),
    'desc' => null,
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
        <div class="w-full xl:w-8/12 px-8 md:px-24">

          @component('components.breadcrumbs', [
            'crumbs' => [
                ['', __('site.contacts')]
              ],
            ])
          @endcomponent

          @foreach ($cityes as $city)
            <div class="w-full px-0 text-center">
              <div
                class="relative flex flex-col min-w-0 break-words bg-yellow-100 w-full mb-8 shadow-lg rounded-lg"
              >
                <div class="px-4 py-5 flex-auto">
                  <div
                    class="text-white p-3 text-center inline-flex items-center justify-center w-26 h-26 mb-5 shadow-lg rounded-full bg-green-400"
                  >
                    <svg width="35" height="35" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd" fill="currentColor"><path d="M11.467 8.444l.871 3.431 2.596-6.861-6.934 2.573 3.467.857zm.533-8.444c-4.418 0-8 3.479-8 7.77 0 4.358 3.5 7.337 8 11.23 4.5-3.893 8-6.872 8-11.23 0-4.291-3.582-7.77-8-7.77zm0 13.723c-3.241 0-5.866-2.6-5.866-5.806s2.625-5.806 5.866-5.806 5.866 2.6 5.866 5.806-2.625 5.806-5.866 5.806zm8 2.277h-1.801c-.629.673-1.316 1.335-2.041 2h2.605l.5 1h-4.218l-1.146 1h1.025l.858 2h-7.487l.858-2h.947c-.389-.336-.772-.669-1.147-1h-1.995l-1.011-1h1.895c-.725-.664-1.41-1.327-2.039-2h-1.803l-4 8h24l-4-8zm-12.794 6h-3.97l1.764-3.528 1.516 1.528h1.549l-.859 2zm8.808-2h3.75l1 2h-3.892l-.858-2z"/></svg>
                  </div>
                  <h6 class="text-xl font-semibold">{{$city->getTranslatedAttribute('name')}}</h6>
                  <p class="mt-2 mb-4 text-gray-600">
                    {{$city->getTranslatedAttribute('address')}}
                  </p>
                  <p class="mt-2 text-xl text-gray-800 font-bold flex justify-center">
                    <span class="mr-3">
                      <a href="tel:+{{preg_replace("/[^0-9]/", '', $city->phone)}}">{{$city->phone}}</a>

                    </span>
                    <span class="ml-2 text-purple-600">
                      <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd" fill="currentColor"><path d="M12.892 13.745s.427.038.656-.247l.448-.563c.216-.28.738-.458 1.249-.174.676.382 1.55.982 2.149 1.541.33.278.407.688.182 1.121l-.002.009c-.232.408-.541.791-.932 1.148l-.009.006c-.44.367-.946.58-1.487.404l-.01-.014c-.972-.275-3.304-1.464-4.79-2.649-2.431-1.918-4.159-5.082-4.637-6.778l-.015-.01c-.176-.543.039-1.049.404-1.488l.007-.008c.357-.391.739-.701 1.148-.932l.009-.002c.432-.225.842-.149 1.121.182.367.379 1.056 1.291 1.54 2.149.284.51.106 1.033-.173 1.248l-.564.448c-.284.23-.247.657-.247.657s.834 3.156 3.953 3.952zm4.907-2.616c-.167 0-.303-.135-.304-.302-.014-1.83-.564-3.288-1.634-4.332-1.072-1.045-2.427-1.581-4.027-1.592-.168-.001-.303-.138-.301-.306.001-.167.136-.301.303-.301h.002c1.762.012 3.258.606 4.447 1.764 1.19 1.162 1.802 2.765 1.817 4.763.001.167-.133.304-.301.306h-.002zm-1.595-.624h-.007c-.168-.004-.301-.143-.297-.31.024-1.038-.273-1.878-.906-2.569-.63-.689-1.495-1.065-2.645-1.149-.167-.013-.293-.158-.281-.325.013-.167.158-.293.325-.281 1.294.095 2.32.548 3.049 1.345.733.8 1.092 1.807 1.065 2.992-.004.165-.139.297-.303.297zm-1.558-.522c-.161 0-.295-.126-.303-.289-.051-1.03-.537-1.534-1.527-1.588-.168-.009-.296-.152-.287-.319.009-.168.151-.296.319-.287 1.308.07 2.034.819 2.101 2.164.009.167-.12.31-.288.318l-.015.001zm6.817 3.469c-.605 4.877-4.172 5.185-4.83 5.396-.28.09-2.882.737-6.152.524 0 0-2.438 2.94-3.199 3.705-.119.119-.258.167-.352.145-.131-.032-.167-.188-.165-.414l.02-4.016v-.001c-4.762-1.323-4.485-6.295-4.431-8.898.054-2.603.543-4.736 1.996-6.17 2.61-2.364 7.987-2.011 7.987-2.011 4.541.02 6.717 1.387 7.222 1.845 1.675 1.434 2.528 4.867 1.904 9.895zm-.652-11.113c-.597-.548-3.007-2.298-8.375-2.322 0 0-6.33-.382-9.416 2.45-1.718 1.718-2.322 4.231-2.386 7.348-.063 3.118-.146 8.958 5.484 10.542l.006.002-.004 2.416s-.035.979.609 1.179c.779.241 1.236-.502 1.981-1.304.408-.44.971-1.086 1.397-1.58 3.851.322 6.812-.417 7.149-.526.777-.253 5.177-.816 5.893-6.657.738-6.022-.358-9.83-2.338-11.548z"/></svg>
                    </span>
                    <span class="ml-2 text-blue-400">
                      <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd" fill="currentColor"><path d="M18.384,22.779c0.322,0.228 0.737,0.285 1.107,0.145c0.37,-0.141 0.642,-0.457 0.724,-0.84c0.869,-4.084 2.977,-14.421 3.768,-18.136c0.06,-0.28 -0.04,-0.571 -0.26,-0.758c-0.22,-0.187 -0.525,-0.241 -0.797,-0.14c-4.193,1.552 -17.106,6.397 -22.384,8.35c-0.335,0.124 -0.553,0.446 -0.542,0.799c0.012,0.354 0.25,0.661 0.593,0.764c2.367,0.708 5.474,1.693 5.474,1.693c0,0 1.452,4.385 2.209,6.615c0.095,0.28 0.314,0.5 0.603,0.576c0.288,0.075 0.596,-0.004 0.811,-0.207c1.216,-1.148 3.096,-2.923 3.096,-2.923c0,0 3.572,2.619 5.598,4.062Zm-11.01,-8.677l1.679,5.538l0.373,-3.507c0,0 6.487,-5.851 10.185,-9.186c0.108,-0.098 0.123,-0.262 0.033,-0.377c-0.089,-0.115 -0.253,-0.142 -0.376,-0.064c-4.286,2.737 -11.894,7.596 -11.894,7.596Z"/></svg>
                    </span>

                  </p>
                </div>
              </div>
            </div>

          @endforeach



    			</div>

        </div>
      </div>

    </div>
  </section>



@endsection
