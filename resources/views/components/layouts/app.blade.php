<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://apis.google.com/js/platform.js" async defer></script>

    <title>
        @if(Route::is('main') || empty($title))
            {{ config('app.name') }}
        @else
            {{ $title . ' - ' . config('app.name') }}
        @endif
    </title>
</head>
    <body>
        {{ $slot }}
    </body>
</html>
