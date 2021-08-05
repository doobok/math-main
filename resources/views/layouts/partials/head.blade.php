{{-- Global site tag (gtag.js) - Google Analytics --}}
<script async src="https://www.googletagmanager.com/gtag/js?id={{config('app.gacode')}}"></script>
<script>
 window.dataLayer = window.dataLayer || [];
 function gtag(){dataLayer.push(arguments);}
 gtag('js', new Date());

 gtag('config', '{{config('app.gacode')}}');
</script>

@include('layouts.partials.hreflang')

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="ie=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">

<!--[if IE]><link rel="shortcut icon" href="path/to/favicon.ico"><![endif]-->
<link rel="shortcut icon" href="{{asset('favicon.ico')}}" type="image/x-icon" />
<link rel="shortcut icon" sizes="180x180" href="{{asset('apple-touch-icon.png')}}" />
<link rel="apple-touch-icon" sizes="180x180" href="{{asset('apple-touch-icon.png')}}">
<link rel="icon" type="image/png" sizes="32x32" href="{{asset('favicon-32x32.png')}}">
<link rel="icon" type="image/png" sizes="16x16" href="{{asset('favicon-16x16.png')}}">
<link rel="manifest" href="{{asset('site.webmanifest')}}">
<link rel="mask-icon" href="{{asset('safari-pinned-tab.svg')}}" color="#5bbad5">
<meta name="msapplication-TileColor" content="#2b5797">
<meta name="theme-color" content="#ffffff">

<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/site.webmanifest">

<link href="{{ mix('css/app.css')}}" rel="stylesheet">
<link href='{{ route('sitemap') }}' rel='alternate' title='Sitemap' type='application/rss+xml'/>
