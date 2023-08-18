<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.partials.head')
    @yield('head')
</head>
<body class="text-gray-800 antialiased">
<div id="app">

    <lang-detector></lang-detector>

    @include('layouts.partials.topnav')

    <main>
        @yield('main')
    </main>

    @include('layouts.partials.footer')
    {{-- форма захвата лидов --}}
    <lead-form></lead-form>

</div>
@include('layouts.partials.js')

</body>
</html>
