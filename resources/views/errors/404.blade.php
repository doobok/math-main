@extends('app-simple')

@section('head')
  <title>404 - {{__('site.404')}}</title>
  <meta name="description" content="Payment orders for tutoring services training center Tutor-Math">
  <meta name="robots" content="noindex, nofollow">
@endsection

@section('h1')
  <span>404 - {{__('site.404')}}</span>
@endsection

@section('main')

<div class="flex justify-center">
  <div class="relative w-80 text-center">
    <img src="/404.jpg" alt="404" />
  </div>
</div>


  <h2 class="text-center mb-5">{{__('site.404')}}</h2>
  <div class="flex flex-wrap justify-center">
    <div class="w-full lg:w-2/3">
      <article>
        <p>{{__('site.404-desc')}}</p>
      </article>
    </div>

    <div class="w-full flex flex-wrap justify-center">
      <a href="{{route('mainpage')}}" class="bg-green-400 text-gray-700 p-3 m-3 text-sm font-bold uppercase rounded shadow hover:shadow-lg outline-none focus:outline-none flex flex-nowrap">
        <svg xmlns="http://www.w3.org/2000/svg" class="mr-2" width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M21 13v10h-6v-6h-6v6h-6v-10h-3l12-12 12 12h-3zm-1-5.907v-5.093h-3v2.093l3 3z"/></svg>
        {{__('site.mainpage')}}
      </a>
      <a href="{{route('page', 'contacts')}}" class="bg-green-400 text-gray-700 p-3 m-3 text-sm font-bold uppercase rounded shadow hover:shadow-lg outline-none focus:outline-none flex flex-nowrap">
        {{__('site.contacts')}}
        <svg xmlns="http://www.w3.org/2000/svg" class="ml-2" width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M0 3v18h24v-18h-24zm22 16l-6.526-6.618-3.445 3.483-3.418-3.525-6.611 6.66 5.051-8-5.051-6 10.029 7.446 9.971-7.446-4.998 6.01 4.998 7.99z"/></svg>
      </a>
    </div>


  </div>

@endsection
