<!DOCTYPE html>
<html lang="en">
<head>
    @section('meta_fields')
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    @show

    @section('css')
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">
    @show

    <title>@yield('title')</title>

    <!-- Fonts -->

    <!-- Styles -->
     <link href="{{ elixir('css/app.css') }}" rel="stylesheet">
</head>
<body id="app-layout">
    @include('layouts.partials.nav')

    @include('layouts.partials.flash')

    @yield('content')

    <!-- JavaScripts -->
     <script src="{{ elixir('js/app.js') }}"></script>
</body>
</html>
