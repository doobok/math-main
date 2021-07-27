<section class="pb-20 relative block bg-green-500">
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
  <div class="container mx-auto px-4 pt-16 lg:pt-24 lg:pb-24">

    <div class="flex flex-wrap text-center justify-center">
      <div class="w-full lg:w-6/12 px-4">
        <h2 class="text-4xl font-semibold text-white">{{__('main.h2-subjects')}}</h2>
        <p class="text-lg leading-relaxed mt-4 mb-4 text-gray-200">
          {{__('main.desc-subjects')}}
        </p>
      </div>
    </div>

    <div class="flex flex-wrap justify-center">

    @foreach ($subjects as $subject)
      <div class="lg:pt-8 pt-6 w-full md:w-4/12 px-4 text-center">
        <div
          class="relative flex flex-col min-w-0 break-words bg-white w-full mb-1 lg:mb-8 shadow-lg rounded-lg"
        >
          <div class="px-4 py-5 flex-auto">
            <div class="text-gray-600 flex justify-center p-3 mb-5">
              <svg class="h-16" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd" fill="currentColor">
                {!!$subject->svg!!}
              </svg>
            </div>
            <h6 class="text-xl font-semibold">
              <a href="{{route('page', $subject->slug)}}" title="{{$subject->name}}">
                {{$subject->name}}
              </a>
            </h6>
            <p class="mt-2 mb-4 text-gray-600">
              {{$subject->promodesc}}
            </p>
            {{-- tags --}}
            <div class="flex flex-wrap justify-center p-4 space-x-1">
              @foreach ($subject->tags->where('active', 1) as $tag)
                <a href="{{route('page', $tag->url)}}" class="rounded-full p-1 bg-gray-700 text-white hover:bg-yellow-400 hover:text-gray-900 text-xs mb-1" title="{{$tag->title}}">{{$tag->name}}</a>
              @endforeach
            </div>
            {{-- tags end --}}
          </div>
        </div>
      </div>
    @endforeach

    </div>
  </div>
</section>
