@if( app()->getLocale() == 'ru' )
  <link rel="alternate" href="{{config('app.url')}}/uk{{$_SERVER['REQUEST_URI']}}" hreflang="uk-ua" />
@else
  <link rel="alternate" href="{{config('app.url')}}{{substr($_SERVER['REQUEST_URI'], 3)}}" hreflang="ru-ua" />
@endif
<link rel="alternate" href="{{url()->current()}}" hreflang="{{app()->getLocale()}}-ua" />
