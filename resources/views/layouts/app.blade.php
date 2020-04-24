<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Page info -->
    <title>Medquad</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('fa/css/all.css') }}" rel="stylesheet">

    <link rel="shortcut icon" type="image/png" href="{{url('/favicon.png')}}"/>
</head>
<body>
    <div id="app">
        
        @include('inc.navbar')
        
        <div class='pt-5 pb-5'>
            @yield('content')
        </div>

        @include('inc.footer')

    </div>
</body>
</html>
