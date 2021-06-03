<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    @include('layouts.partials.head')
    @yield('head')
  </head>
  <body class="text-gray-800 antialiased">
  <div id="app">

    @include('layouts.partials.topnav')

    <main>
    @yield('main')
    </main>

    @include('layouts.partials.footer')

  </div>
  @include('layouts.partials.js')

  </body>
</html>
