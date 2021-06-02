<section class="pb-20 relative block bg-gray-900">
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
        class="text-gray-900 fill-current"
        points="2560 0 2560 100 0 100"
      ></polygon>
    </svg>
  </div>
  <div class="container mx-auto px-4 lg:pt-24 lg:pb-24">
    <div class="flex flex-wrap text-center justify-center">
      <div class="w-full lg:w-6/12 px-4">
        <h2 class="text-4xl font-semibold text-white">Наші учні поступають до таких престижних ВУЗів, як:</h2>
      </div>
    </div>
    <div class="flex flex-wrap mt-4">
    @for ($i=0; $i < 5; $i++)
        <div class="lg:pt-12 pt-6 w-full md:w-1/5 px-4 text-center">
          <div
            class="flex flex-col min-w-0 break-words w-full items-center justify-center mb-8"
          >
          <div class="relative w-46 h-46 mb-4">
            <img class="shadow-sm" src="/univer/1.png" alt="user image" />
          </div>
          <h6 class="text-lg text-gray-700 font-semibold">Киевский национальный университет имени Тараса Шевченко</h6>
          </div>
        </div>
    @endfor
  </div>


  </div>
</section>
