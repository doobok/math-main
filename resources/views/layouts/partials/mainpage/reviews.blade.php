<section class="pb-20 relative block bg-green-400">
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
        class="text-green-400 fill-current"
        points="2560 0 2560 100 0 100"
      ></polygon>
    </svg>
  </div>
  <div class="container mx-auto px-4 pt-16 md:pb-12 lg:pt-24 lg:pb-24">
    <div class="flex flex-wrap text-center justify-center">
      <div class="w-full lg:w-3/4 px-4">
        <h2 class="text-4xl font-semibold text-white">{{__('main.h2-reviews')}}</h2>
        <p class="text-lg leading-relaxed mt-4 mb-4 text-gray-100">
          {{__('main.desc-reviews')}}
        </p>
      </div>
    </div>
    {{-- <div class="flex flex-wrap mt-4"> --}}

      <reviews-carousel :items="{{$reviews}}"></reviews-carousel>

      {{-- @for ($i=0; $i < 3; $i++)
        <div class="lg:pt-12 pt-6 w-full md:w-4/12 px-4 text-center">
          <div
            class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg"
          >
            <div class="px-4 py-5 flex-auto">
              <div
                class="text-white p-3 text-center inline-flex items-center justify-center w-26 h-26 mb-5 shadow-lg rounded-full bg-green-400"
              >
              <div class="relative w-24 h-24">
                <img class="rounded-full border border-gray-100 shadow-sm" src="https://randomuser.me/api/portraits/women/81.jpg" alt="user image" />
              </div>
              </div>

              <h6 class="text-xl font-semibold">Альона</h6>

              <div class="flex space-x-2 text-yellow-400 justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="currentColor"><path d="M12 .587l3.668 7.568 8.332 1.151-6.064 5.828 1.48 8.279-7.416-3.967-7.417 3.967 1.481-8.279-6.064-5.828 8.332-1.151z"/></svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="currentColor"><path d="M12 .587l3.668 7.568 8.332 1.151-6.064 5.828 1.48 8.279-7.416-3.967-7.417 3.967 1.481-8.279-6.064-5.828 8.332-1.151z"/></svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="currentColor"><path d="M12 .587l3.668 7.568 8.332 1.151-6.064 5.828 1.48 8.279-7.416-3.967-7.417 3.967 1.481-8.279-6.064-5.828 8.332-1.151z"/></svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="currentColor"><path d="M12 .587l3.668 7.568 8.332 1.151-6.064 5.828 1.48 8.279-7.416-3.967-7.417 3.967 1.481-8.279-6.064-5.828 8.332-1.151z"/></svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="currentColor"><path d="M12 .587l3.668 7.568 8.332 1.151-6.064 5.828 1.48 8.279-7.416-3.967-7.417 3.967 1.481-8.279-6.064-5.828 8.332-1.151z"/></svg>

              </div>
              <p class="mt-2 mb-4 text-gray-600">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
              </p>
            </div>
          </div>
        </div>
      @endfor --}}

      <div class="text-sm pt-4 text-white text-center">
        <a href="{{route('page', 'reviews')}}">
          {{__('site.all-reviews')}}
        </a>
      </div>



    {{-- </div> --}}
    {{-- <div class="flex items-center mt-8 justify-center">
      <button
        class="bg-yellow-400 text-white active:bg-gray-700 text-sm font-bold uppercase my-6 py-4 px-8 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1"
        type="button"
        style="transition: all 0.15s ease 0s;"
      >
        Залишити відгук
      </button>
    </div> --}}
  </div>
</section>
