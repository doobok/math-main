@extends('app-pays')

@section('main')

  <h2 class="text-center mb-5">{{__('pay.successful')}}!</h2>
  <div class="flex flex-wrap justify-center">
    <div class="w-full lg:w-2/3">
      <article>
        <p>{{__('pay.successful-desc')}}</p>
        <blockquote>
          <p>{{__('pay.successful-desc-bq')}}</p>
        </blockquote>
      </article>
    </div>
    <div class="w-full flex justify-center">
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


  {{-- <h2 class="text-center mb-5">{{__('site.pay-order')}}</h2> --}}
  {{-- <div class="flex flex-wrap text-gray-600 rounded-2xl border-4 border-yellow-400 bg-yellow-100 border-dashed shadow hover:shadow-lg p-5 justify-center">
    <div class="text-base md:text-xl w-full text-center">
      {{__('site.order-from')}}: <span class="font-bold">{{$deal->created_at}}</span>
    </div>
    <div class="text-base md:text-xl w-full text-center">
      {{__('site.to-order')}}: <span class="font-bold">{{$productName}}</span>
    </div>
    <div class="text-green-400 text-4xl font-bold pt-2 flex flex-wrap">
      <span class="text-base md:text-lg text-gray-700 m-1 mr-2">{{__('site.to-pay')}}:</span>
      <span class="flex flex-wrap justify-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 m-1 mr-3" viewBox="0 0 24 24" fill="currentColor"><path d="M22 2h-14c-1.104 0-2 .896-2 2v4h16v3.5c0 .276-.224.5-.5.5h-1.5v2h2c1.104 0 2-.896 2-2v-8c0-1.104-.896-2-2-2zm0 3h-14v-.5c0-.276.224-.5.5-.5h13c.276 0 .5.224.5.5v.5zm-6 5h-14c-1.104 0-2 .896-2 2v8c0 1.104.896 2 2 2h14c1.104 0 2-.896 2-2v-8c0-1.104-.896-2-2-2zm-11 10h-2v-1h2v1zm3 0h-2v-1h2v1zm.32-3.377c-.383.239-.836.377-1.32.377-1.381 0-2.5-1.119-2.5-2.5s1.119-2.5 2.5-2.5c.484 0 .937.138 1.32.377-.531.552-.857 1.3-.857 2.123 0 .824.326 1.571.857 2.123zm3.68 3.377h-2v-1h2v1zm-1-3c-1.381 0-2.5-1.119-2.5-2.5s1.119-2.5 2.5-2.5 2.5 1.119 2.5 2.5-1.119 2.5-2.5 2.5zm4 3h-2v-1h2v1z"/></svg>
        {{number_format($deal->total, 2, '.', ' ')}}
        <span class="text-lg text-gray-700 m-1 ml-2">грн.</span>
      </span>

    </div>

    <div class="w-full mt-7 flex justify-center">
        {!! $widget !!}
    </div>

  </div> --}}


@endsection
