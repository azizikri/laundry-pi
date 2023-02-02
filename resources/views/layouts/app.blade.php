<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script>
        document.getElementsByTagName("html")[0].className += " js";
    </script>
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,700;1,400;1,700&display=swap"
        rel="stylesheet">
    <!-- end google fonts -->
    <link rel="icon" type="image/svg+xml" href="{{ asset('img/favicon.svg') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/output.css') }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

</head>

<body>
    @if (Route::currentRouteName() == 'client.index')
        @include('layouts.header-index')
    @else
        @include('layouts.header')
    @endif

    {{ $slot }}

    @include('layouts.footer')

    <script src="https://unpkg.com/codyhouse-framework/main/assets/js/util.js"></script>
    <script src="{{ asset('js/components.js') }}"></script>
    @stack('scripts')
</body>

</html>
