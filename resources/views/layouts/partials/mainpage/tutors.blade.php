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
            <div class="flex flex-wrap justify-center p-4 space-x-1">
              <a href="#" class="rounded-full p-1 bg-gray-700 text-white hover:bg-yellow-400 hover:text-gray-900 text-xs mb-1">репетитор з математики</a>
              <a href="#" class="rounded-full p-1 bg-gray-700 text-white hover:bg-yellow-400 hover:text-gray-900 text-xs mb-1">репетитор з англійської мови</a>
              <a href="#" class="rounded-full p-1 bg-gray-700 text-white hover:bg-yellow-400 hover:text-gray-900 text-xs mb-1">репетитор з фізики</a>
              <a href="#" class="rounded-full p-1 bg-gray-700 text-white hover:bg-yellow-400 hover:text-gray-900 text-xs mb-1">репетитор онлайн</a>

            </div>
            <div class="p-4 flex justify-center">
              <button
                class="bg-yellow-400 text-gray-700 flex flex-nowrap active:bg-gray-700 text-sm font-bold uppercase mb-6 py-4 px-8 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1"
                type="button"
                style="transition: all 0.15s ease 0s;"
              >
              <svg class="mr-2 text-gray-700 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M23.334 11.96c-.713-.726-.872-1.829-.393-2.727.342-.64.366-1.401.064-2.062-.301-.66-.893-1.142-1.601-1.302-.991-.225-1.722-1.067-1.803-2.081-.059-.723-.451-1.378-1.062-1.77-.609-.393-1.367-.478-2.05-.229-.956.347-2.026.032-2.642-.776-.44-.576-1.124-.915-1.85-.915-.725 0-1.409.339-1.849.915-.613.809-1.683 1.124-2.639.777-.682-.248-1.44-.163-2.05.229-.61.392-1.003 1.047-1.061 1.77-.082 1.014-.812 1.857-1.803 2.081-.708.16-1.3.642-1.601 1.302s-.277 1.422.065 2.061c.479.897.32 2.001-.392 2.727-.509.517-.747 1.242-.644 1.96s.536 1.347 1.17 1.7c.888.495 1.352 1.51 1.144 2.505-.147.71.044 1.448.519 1.996.476.549 1.18.844 1.902.798 1.016-.063 1.953.54 2.317 1.489.259.678.82 1.195 1.517 1.399.695.204 1.447.072 2.031-.357.819-.603 1.936-.603 2.754 0 .584.43 1.336.562 2.031.357.697-.204 1.258-.722 1.518-1.399.363-.949 1.301-1.553 2.316-1.489.724.046 1.427-.249 1.902-.798.475-.548.667-1.286.519-1.996-.207-.995.256-2.01 1.145-2.505.633-.354 1.065-.982 1.169-1.7s-.135-1.443-.643-1.96zm-12.584 5.43l-4.5-4.364 1.857-1.857 2.643 2.506 5.643-5.784 1.857 1.857-7.5 7.642z"/></svg>
              <span>Обрати репетитора</span>
              </button>
            </div>
          </div>
        </div>

      @endfor



    </div>
  </div>
</section>
