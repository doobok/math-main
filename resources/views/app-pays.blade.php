<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    @include('layouts.partials.head')
    <title>Tutor-Pay - payments for teaching</title>
    <meta name="description" content="Payment orders for tutoring services training center Tutor-Math">
    <meta name="robots" content="noindex, nofollow">
  </head>
  <body class="text-gray-800 antialiased">
  <div id="app">

    @include('layouts.partials.topnav')

    <main>
      <div
        class="relative pt-16 pb-32 flex content-center items-center justify-center"
        style="min-height: 15vh;"
      >
        <div
          class="absolute top-0 w-full h-full bg-green-500"
        >
        </div>
        <div class="container relative mx-auto">
          <div class="items-center flex flex-wrap">
            <div class="w-full lg:w-6/12 px-4 ml-auto mr-auto text-center">
              <div>
                <h1 class="text-white font-semibold text-3xl md:text-5xl pt-12 md:pt-0 pb-12 flex justify-center">
                  <span>Tutor-Pay</span>
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-14 ml-4" viewBox="0 0 24 24" fill="currentColor"><path d="M0 8v-2c0-1.104.896-2 2-2h20c1.104 0 2 .896 2 2v2h-24zm24 3v7c0 1.104-.896 2-2 2h-20c-1.104 0-2-.896-2-2v-7h24zm-15 5h-6v1h6v-1zm3-2h-9v1h9v-1zm9 0h-3v1h3v-1z"/></svg>
                </h1>

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


      <section class="pb-12 relative block bg-white">
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
        <div class="container mx-auto px-0 md:px-4 py-12">
          <div class="flex justify-center">
            <div class="w-full xl:w-10/12 px-8 md:px-24">
              <article>

                @yield('main')
                
              </article>

            </div>
          </div>

        </div>
      </section>
    </main>

    @include('layouts.partials.footer')
    {{-- форма захвата лидов --}}
    <lead-form></lead-form>

  </div>
  @include('layouts.partials.js')

  </body>
</html>
