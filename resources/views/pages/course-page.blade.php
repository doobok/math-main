@extends('app')

@section('head')
@component('components.meta')

  @slot('title') {{$page->getTranslatedAttribute('title')}} @endslot
  @slot('description')
      {{__('seo.course-desc', [
        'text' => $page->getTranslatedAttribute('description'),
        'phone' => setting('info.phone'),
        'price' => $page->price,
      ])}}
  @endslot
  @slot('image') {{ Voyager::image( $page->image ) }} @endslot
  @slot('date') {{$page->created_at}} @endslot

@endcomponent
@endsection

@section('main')

  @include('layouts.partials.firstscreen', [
    'img' => Voyager::image( $page->image ),
    'h1' => $page->getTranslatedAttribute('h1'),
    'desc' => $page->getTranslatedAttribute('subtitle'),
  ])

  <section class="pb-4 md:pb-8 relative block bg-green-500">
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

  </section>

  <section class="pb-12 relative block bg-gray-100">
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
          class="text-gray-100 fill-current"
          points="2560 0 2560 100 0 100"
        ></polygon>
      </svg>
    </div>
    <div class="container mx-auto px-0 md:px-4 md:pb-12">
      <div class="flex justify-center">
        <div class="w-full xl:w-10/12 px-4 md:px-24">

          @component('components.breadcrumbs', [
            'crumbs' => [
                [route('page', 'courses'), __('site.courses')],
                ['', $page->getTranslatedAttribute('h1')]
              ],
            ])
          @endcomponent


        <article>
          <div class="w-full  text-gray-800 leading-normal" style="font-family:Verdana, Arial">

            <h2 class="mb-0">{{$page->getTranslatedAttribute('h1')}}</h2>

            <star-rating
            slug="{{$page->slug}}"
            ></star-rating>

            <blockquote>
              {{$page->getTranslatedAttribute('meta')}}
            </blockquote>

            {!! $page->getTranslatedAttribute('text') !!}


            @include('layouts.partials.course-page.lessons-match')

            <div class="bg-green-100 p-3 md:p-5 w-full border-l-4 border-green-400 my-2">
              <div class="flex space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="flex-none fill-current text-green-400 h-8 w-8">
                  <path d="M6 12c0 2.206 1.794 4 4 4 1.761 0 3.242-1.151 3.775-2.734l2.224-1.291.001.025c0 3.314-2.686 6-6 6s-6-2.686-6-6 2.686-6 6-6c1.084 0 2.098.292 2.975.794l-2.21 1.283c-.248-.048-.503-.077-.765-.077-2.206 0-4 1.794-4 4zm4-2c-1.105 0-2 .896-2 2s.895 2 2 2 2-.896 2-2l-.002-.015 3.36-1.95c.976-.565 2.704-.336 3.711.159l4.931-2.863-3.158-1.569.169-3.632-4.945 2.87c-.07 1.121-.734 2.736-1.705 3.301l-3.383 1.964c-.29-.163-.621-.265-.978-.265zm7.995 1.911l.005.089c0 4.411-3.589 8-8 8s-8-3.589-8-8 3.589-8 8-8c1.475 0 2.853.408 4.041 1.107.334-.586.428-1.544.146-2.18-1.275-.589-2.69-.927-4.187-.927-5.523 0-10 4.477-10 10s4.477 10 10 10c5.233 0 9.521-4.021 9.957-9.142-.301-.483-1.066-1.061-1.962-.947z"/></svg>
                <div class="flex-1 leading-tight">
                  <p class="font-bold text-left">{{__('site.course-for-who')}}</p>
                  <p>{{$page->getTranslatedAttribute('forwhom')}}</p>
                </div>
              </div>
            </div>

            <div class="bg-green-100 p-3 md:p-5 w-full border-l-4 border-green-400 my-2">
              <div class="flex space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="flex-none fill-current text-green-400 h-8 w-8">
                  <path d="M17 12.645v-2.289c-1.17-.417-1.907-.533-2.28-1.431-.373-.9.07-1.512.6-2.625l-1.618-1.619c-1.105.525-1.723.974-2.626.6-.9-.374-1.017-1.117-1.431-2.281h-2.29c-.412 1.158-.53 1.907-1.431 2.28h-.001c-.9.374-1.51-.07-2.625-.6l-1.617 1.619c.527 1.11.973 1.724.6 2.625-.375.901-1.123 1.019-2.281 1.431v2.289c1.155.412 1.907.531 2.28 1.431.376.908-.081 1.534-.6 2.625l1.618 1.619c1.107-.525 1.724-.974 2.625-.6h.001c.9.373 1.018 1.118 1.431 2.28h2.289c.412-1.158.53-1.905 1.437-2.282h.001c.894-.372 1.501.071 2.619.602l1.618-1.619c-.525-1.107-.974-1.723-.601-2.625.374-.899 1.126-1.019 2.282-1.43zm-8.5 1.689c-1.564 0-2.833-1.269-2.833-2.834s1.269-2.834 2.833-2.834 2.833 1.269 2.833 2.834-1.269 2.834-2.833 2.834zm15.5 4.205v-1.077c-.55-.196-.897-.251-1.073-.673-.176-.424.033-.711.282-1.236l-.762-.762c-.52.248-.811.458-1.235.283-.424-.175-.479-.525-.674-1.073h-1.076c-.194.545-.25.897-.674 1.073-.424.176-.711-.033-1.235-.283l-.762.762c.248.523.458.812.282 1.236-.176.424-.528.479-1.073.673v1.077c.544.193.897.25 1.073.673.177.427-.038.722-.282 1.236l.762.762c.521-.248.812-.458 1.235-.283.424.175.479.526.674 1.073h1.076c.194-.545.25-.897.676-1.074h.001c.421-.175.706.034 1.232.284l.762-.762c-.247-.521-.458-.812-.282-1.235s.529-.481 1.073-.674zm-4 .794c-.736 0-1.333-.597-1.333-1.333s.597-1.333 1.333-1.333 1.333.597 1.333 1.333-.597 1.333-1.333 1.333z"/></svg>
                <div class="flex-1 leading-tight">
                  <p class="font-bold text-left">{{__('site.course-start-skeels')}}</p>
                  <p>{{$page->getTranslatedAttribute('skills')}}</p>
                </div>
              </div>
            </div>



            <div class="p-4 md:p-8 mt-2 leading-normal rounded shadow bg-white">
              <h3 class="mt-0 text-gray-400 flex flex-nowrap text-lg">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="flex-none fill-current text-gray-400 h-5 w-5 mr-2 mt-1">
                  <path d="M4 22h-4v-4h4v4zm0-12h-4v4h4v-4zm0-8h-4v4h4v-4zm3 0v4h17v-4h-17zm0 12h17v-4h-17v4zm0 8h17v-4h-17v4z"/></svg>
                  {{__('site.course-program')}}:
              </h3>
                {!!$page->getTranslatedAttribute('program')!!}
            </div>

            <div class="bg-blue-100 p-3 md:p-5 w-full border-4 border-blue-400 rounded-2xl my-5">
              <div class="flex space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="flex-none fill-current text-green-400 h-8 w-8">
                  <path d="M8 0l5.958 8h-3.958l-6-8h4zm6.604 7.194l5.396-7.194h-4l-3.376 4.534 1.98 2.66zm-2.604 4.806c-2.762 0-5 2.239-5 5s2.238 5 5 5 5-2.239 5-5-2.238-5-5-5zm1.854 7.755l-1.854-.992-1.854.992.369-2.07-1.515-1.457 2.083-.287.917-1.892.917 1.892 2.083.287-1.516 1.457.37 2.07zm-1.854-9.755c-3.865 0-7 3.134-7 7s3.135 7 7 7 7-3.134 7-7-3.135-7-7-7zm0 13c-3.314 0-6-2.687-6-6s2.686-6 6-6 6 2.687 6 6-2.686 6-6 6z"/></svg>
                <div class="flex-1 leading-tight">{{$page->getTranslatedAttribute('finish_skills')}}</div>
              </div>
            </div>

            @include('layouts.partials.course-page.timing')

          </div>

          </article>

        </div>
      </div>
    </div>
  </section>
{{-- Ціни показуєм лише запущеним курсам --}}
@if ($days > 0)
  @include('layouts.partials.course-page.pricing')
@endif


  @include('layouts.partials.mainpage.todo-block')



  {{-- schema --}}
      @include('layouts.schema.post-rating')
@endsection
