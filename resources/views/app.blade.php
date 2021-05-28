<!DOCTYPE html>
<html>
  <head>
    @include('layouts.partials.head')
    @yield('head')
  </head>
  <body class="text-gray-800 antialiased">
    @include('layouts.partials.topnav')

    <main>
    @yield('main')    
    </main>

    @include('layouts.partials.footer')
    @include('layouts.partials.js')

  </body>
</html>
