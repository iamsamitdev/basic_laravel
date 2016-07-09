<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@section('title_page')@show</title>
        <link rel="stylesheet" type="text/css" href="{{asset('resources/assets/css/app.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('resources/assets/css/sweetalert.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('resources/assets/css/custom.css')}}">
    </head>
    <body>

        @include('includes.header')

        @yield('content')

        @include('includes.footer')

        <script src="{{asset('resources/assets/js/jquery-2.2.4.min.js')}}"></script>
        <script src="{{asset('resources/assets/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('resources/assets/js/jquery.validate.min.js')}}"></script>
        <script src="{{asset('resources/assets/js/additional-methods.min.js')}}"></script>
        <script src="{{asset('resources/assets/js/sweetalert.min.js')}}"></script>
        <script src="{{asset('resources/assets/js/custom.js')}}"></script>
    </body>
</html>