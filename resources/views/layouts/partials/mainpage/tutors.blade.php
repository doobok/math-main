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
  <div class="container mx-auto px-4 pt-16 pb-12 lg:pt-24 lg:pb-24">
    <div class="flex flex-wrap text-center justify-center">
      <div class="w-full lg:w-6/12 px-4">
        <h2 class="text-4xl font-semibold">{{__('main.h2-tutors')}}</h2>
        <p class="text-lg leading-relaxed mt-4 mb-4 text-gray-500">
          {{__('main.desc-tutors')}}
        </p>
      </div>
    </div>

    <tutors-carousel :items="{{$tutors}}"></tutors-carousel>

    {{-- <div class="flex flex-wrap mt-4">

      @for ($i=0; $i < 3; $i++)
        <div class="lg:pt-12 pt-4 w-full md:w-4/12 px-4 text-center">
          <div
            class="relative flex flex-col min-w-0 break-words bg-green-400 w-full shadow-lg mb-2 rounded-lg"
          >
            <div class="px-4 py-5 flex-auto">
              <div
                class="text-white p-3 text-center inline-flex items-center justify-center w-26 h-26 mb-5 shadow-lg rounded-full bg-yellow-400"
              >
              <div class="relative w-42 h-42">
                <img class="rounded-full border border-gray-100 shadow-sm" src="https://randomuser.me/api/portraits/women/81.jpg" alt="user image" />
              </div>
              </div>

              <h6 class="text-xl font-semibold">Альона</h6>

              <p class="mt-2 text-gray-900 bg-green-100 p-2 shadow-lg rounded-lg relative">
                <svg class="block fill-current text-green-100 w-4 h-4 absolute left-0 top-0 ml-3 -mt-3 z-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path></svg>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
              </p>
            </div>
            <div class="flex flex-wrap justify-center p-4 space-x-1">
              <a href="#" class="rounded-full p-1 bg-gray-700 text-white hover:bg-yellow-400 hover:text-gray-900 text-xs mb-1">репетитор з математики</a>
              <a href="#" class="rounded-full p-1 bg-gray-700 text-white hover:bg-yellow-400 hover:text-gray-900 text-xs mb-1">репетитор з англійської мови</a>
              <a href="#" class="rounded-full p-1 bg-gray-700 text-white hover:bg-yellow-400 hover:text-gray-900 text-xs mb-1">репетитор з фізики</a>
              <a href="#" class="rounded-full p-1 bg-gray-700 text-white hover:bg-yellow-400 hover:text-gray-900 text-xs mb-1">репетитор онлайн</a>

            </div>
            <div class="p-4 flex justify-center">
              <button
                class="bg-yellow-400 text-white hover:text-gray-700 flex flex-nowrap active:bg-gray-700 text-sm font-bold uppercase mb-6 py-4 px-8 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1"
                type="button"
                style="transition: all 0.15s ease 0s;"
              >
              <svg class="mr-2 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M2.001 9.352c0 1.873.849 2.943 1.683 3.943.031 1 .085 1.668-.333 3.183 1.748-.558 2.038-.778 3.008-1.374 1 .244 1.474.381 2.611.491-.094.708-.081 1.275.055 2.023-.752-.06-1.528-.178-2.33-.374-1.397.857-4.481 1.725-6.649 2.115.811-1.595 1.708-3.785 1.661-5.312-1.09-1.305-1.705-2.984-1.705-4.695-.001-4.826 4.718-8.352 9.999-8.352 5.237 0 9.977 3.484 9.998 8.318-.644-.175-1.322-.277-2.021-.314-.229-3.34-3.713-6.004-7.977-6.004-4.411 0-8 2.85-8 6.352zm20.883 10.169c-.029 1.001.558 2.435 1.088 3.479-1.419-.258-3.438-.824-4.352-1.385-.772.188-1.514.274-2.213.274-3.865 0-6.498-2.643-6.498-5.442 0-3.174 3.11-5.467 6.546-5.467 3.457 0 6.546 2.309 6.546 5.467 0 1.12-.403 2.221-1.117 3.074zm-7.563-3.021c0-.453-.368-.82-.82-.82s-.82.367-.82.82.368.82.82.82.82-.367.82-.82zm3 0c0-.453-.368-.82-.82-.82s-.82.367-.82.82.368.82.82.82.82-.367.82-.82zm3 0c0-.453-.368-.82-.82-.82s-.82.367-.82.82.368.82.82.82.82-.367.82-.82z"/></svg>
              <span>Звʼязатись з репетитором</span>
              </button>
            </div>
          </div>
        </div>

      @endfor
    </div> --}}


  </div>
</section>
