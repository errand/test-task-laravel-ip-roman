<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    @vite('resources/css/app.css')

</head>
<body>
<div id="app">
    <main class="py-4">
        @yield('content')
    </main>
</div>
@yield('footer')
@stack('scripts')
@vite('resources/js/app.js')
</body>
</html>
