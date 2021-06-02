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
  <div class="container mx-auto px-4 lg:pt-24 lg:pb-24">
    <div class="flex flex-wrap text-center justify-center">
      <div class="w-full lg:w-6/12 px-4">
        <h2 class="text-4xl font-semibold">Наші репетитори</h2>
        <p class="text-lg leading-relaxed mt-4 mb-4 text-gray-500">
          Put the potentially record low maximum sea ice extent tihs year
          down to low ice. According to the National Oceanic and
          Atmospheric Administration, Ted, Scambos.
        </p>
      </div>
    </div>
    <div class="flex flex-wrap mt-4">

      @for ($i=0; $i < 3; $i++)

        <div class="lg:pt-12 pt-6 w-full md:w-4/12 px-4 text-center">
          <div
            class="relative flex flex-col min-w-0 break-words bg-green-400 w-full mb-8 shadow-lg rounded-lg"
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

              <p class="mt-2 mb-4 text-gray-900">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
              </p>
            </div>
            <div class="flex flex-wrap p-4 space-x-1">
              <a href="#" class="rounded-full p-2 bg-gray-700 text-white hover:bg-yellow-400 hover:text-gray-900 text-xs mb-1">репетитор з математики</a>
              <a href="#" class="rounded-full p-2 bg-gray-700 text-white hover:bg-yellow-400 hover:text-gray-900 text-xs mb-1">репетитор з англійської мови</a>
              <a href="#" class="rounded-full p-2 bg-gray-700 text-white hover:bg-yellow-400 hover:text-gray-900 text-xs mb-1">репетитор з фізики</a>
              <a href="#" class="rounded-full p-2 bg-gray-700 text-white hover:bg-yellow-400 hover:text-gray-900 text-xs mb-1">репетитор онлайн</a>

            </div>
            <button
              class="bg-yellow-400 text-gray-700 active:bg-gray-700 text-sm font-bold uppercase my-6 py-4 px-8 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1"
              type="button"
              style="transition: all 0.15s ease 0s;"
            >
              Обрати репетитора
            </button>
          </div>
        </div>

      @endfor



    </div>
  </div>
</section>
