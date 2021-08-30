<div class="max-w-4xl flex items-center h-auto flex-wrap mx-auto my-8">

  <!--Main Col-->
  <div class="w-full lg:w-3/5 rounded-lg lg:rounded-l-lg lg:rounded-r-none shadow-2xl bg-white opacity-75 mx-6 lg:mx-0">


    <div class="p-4 md:p-8 text-center lg:text-left">
      <!-- Image for mobile view-->
      <div class="block lg:hidden rounded-full shadow-xl mx-auto -mt-16 h-48 w-48 bg-cover bg-center" style="background-image: url({{ Voyager::image( $course->image ) }})"></div>

      <h2 class="text-2xl font-bold pt-8 lg:pt-0">{{$course->h1}}</h2>
      <div class="mx-auto lg:mx-0 w-4/5 pt-3 border-b-2 border-green-400 opacity-25"></div>
      <p class="pt-4 text-base font-bold flex items-center justify-center lg:justify-start"><svg class="h-4 fill-current text-green-400 pr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
          <path d="M20 12.875v5.068c0 2.754-5.789 4.057-9 4.057-3.052 0-9-1.392-9-4.057v-6.294l9 4.863 9-3.637zm-8.083-10.875l-12.917 5.75 12 6.5 11-4.417v7.167h2v-8.25l-12.083-6.75zm13.083 20h-4c.578-1 1-2.5 1-4h2c0 1.516.391 2.859 1 4z"/></svg> {{$course->lesson_count}} {{__('site.lessons')}}</p>
      <p class="pt-2 text-gray-600 text-sm flex items-center justify-center lg:justify-start"><svg class="h-4 fill-current text-green-400 pr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
          <path d="M18.513 7.119c.958-1.143 1.487-2.577 1.487-4.036v-3.083h-16v3.083c0 1.459.528 2.892 1.487 4.035l3.087 3.68c.566.677.57 1.625.009 2.306l-3.13 3.794c-.937 1.136-1.453 2.555-1.453 3.995v3.107h16v-3.107c0-1.44-.517-2.858-1.453-3.994l-3.13-3.794c-.562-.681-.558-1.629.009-2.306l3.087-3.68zm-.513-4.12c0 1.101-.363 2.05-1.02 2.834l-.978 1.167h-8.004l-.978-1.167c-.66-.785-1.02-1.736-1.02-2.834h12zm-.996 15.172c.652.791.996 1.725.996 2.829h-1.061c-1.939-2-4.939-2-4.939-2s-3 0-4.939 2h-1.061c0-1.104.344-2.039.996-2.829l3.129-3.793c.342-.415.571-.886.711-1.377h.164v1h2v-1h.163c.141.491.369.962.711 1.376l3.13 3.794zm-6.004-1.171h2v1h-2v-1zm0-2h2v1h-2v-1z"/></svg> {{__('site.let-start')}} {{$course->next_start}}</p>
      <p class="pt-4 text-sm">{{$course->meta}}</p>

      <div class="pt-4">
        <a href="{{route('page', $course->slug)}}">
          <button class="bg-green-400 hover:bg-yellow-400 text-white active:bg-gray-100 text-xs font-bold uppercase px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none">
            {{__('site.know-more')}}
          </button>
        </a>
      </div>

    </div>

  </div>

  <!--Img Col-->
  <div class="w-full lg:w-2/5 ">
    <div class="rounded-none lg:rounded-lg shadow-2xl hidden lg:block h-96 w-full bg-cover bg-center" style="background-image: url({{ Voyager::image( $course->image ) }})"></div>
  </div>
</div>
