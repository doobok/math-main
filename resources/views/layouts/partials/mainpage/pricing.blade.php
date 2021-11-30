<section id="prices" class="pb-20 relative block bg-gray-300">
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
        class="text-gray-300 fill-current"
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
