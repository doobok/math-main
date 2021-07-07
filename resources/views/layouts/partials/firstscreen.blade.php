<div
  class="relative pt-16 pb-32 flex content-center items-center justify-center"
  style="min-height: 75vh;"
>
  <div
    class="absolute top-0 w-full h-full bg-center bg-cover"
    style='background-image: url({{$img}});'
  >
    <span
      id="blackOverlay"
      class="w-full h-full absolute opacity-75 bg-black"
    ></span>
  </div>
  <div class="container relative mx-auto">
    <div class="items-center flex flex-wrap">
      <div class="w-full lg:w-6/12 px-4 ml-auto mr-auto text-center">
        <div>
          <h1 class="text-white font-semibold text-2xl md:text-5xl pt-12 md:pt-0">
            {{$h1}}
          </h1>
          <p class="mt-4 text-lg text-gray-300">
            {{$desc}}
          </p>

        </div>
      </div>
    </div>
  </div>
  <div
    class="top-auto bottom-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden"
    style="height: 70px;"
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
</div>

<section class="bg-gray-300 -mt-24">
  <div class="container mx-auto px-4">

  </div>
</section>
@include('layouts.partials.mainmenu')
