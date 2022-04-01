<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Super gestão - @yield('title')</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    </head>

    <body>
        @include('app.layouts._partials.top')
        @yield('content')
    </body>
</html>