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
  <div class="container flex flex-wrap mx-auto px-4 pt-16 md:pb-12 lg:pt-24 lg:pb-24">
    <div class="flex justify-center w-full md:w-2/4 lg:w-4/12 ml-auto mr-auto mb-2 px-4">
      <img
        alt="{{__('main.todo-title')}}"
        class="max-w-full"
        src="/idea.png"
      />
    </div>


    <div class="w-full md:w-1/2 text-center justify-center lg:mt-12">
        <h2 class="text-4xl font-semibold mb-4 text-white">
          {{__('main.todo-title')}}
        </h2>
        <p class="text-2xl font-semibold text-white">
          {{__('main.todo-subtitle')}}
        </p>
        <p class="text-lg leading-relaxed mt-8 mb-8 text-gray-100">
          {{__('main.todo-desc')}}
        </p>

        <smpl-button clr="red" txt="👉 {{__('main.todo-btn')}}"></smpl-button>

        <p class="text-base leading-relaxed mt-8 mb-4 text-gray-100">{{__('main.todo-aftertext')}}</p>
    </div>



  </div>
</section>
