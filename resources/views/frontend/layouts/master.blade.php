<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title> Division of Research </title>
        <!-- mobile responsive meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <!--Favicon-->
        <link rel="icon" href="images/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" />
        <!-- Slick Carousel -->
        <link rel="stylesheet" href="{{asset('js/slick/slick.css')}}">
        <link rel="stylesheet" href="{{asset('js/slick/slick-theme.css')}}">
        <!-- FancyBox -->
        <link rel="stylesheet" href="{{asset('js/fancybox/jquery.fancybox.min.css')}}">
        <link src="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css" rel="stylesheet">
        <!-- Stylesheets -->
        <link href="{{asset('css/style.css')}}" rel="stylesheet">
        
    </head>
    <body>
        <div class="page-wrapper">
            @include('frontend.layouts.header')

            @yield('content')

            @extends('frontend.layouts.footer')
        </div>
        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
        <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('js/slick/slick.min.js')}}"></script>
        <!-- FancyBox -->
        <script src="{{asset('js/fancybox/jquery.fancybox.min.js')}}"></script>
        <script src="{{asset('js/validate.js')}}"></script>
        <script src="{{asset('js/wow.js')}}"></script>
        <script src="{{asset('js/jquery-ui.js')}}"></script>
        <script src="{{asset('js/script.js')}}"></script>
        <script src="{{asset('js/mouse.js')}}"></script>
    </body>

</html>