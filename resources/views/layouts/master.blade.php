<!DOCTYPE html>
<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title> Division of Research </title>
        <!-- mobile responsive meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="icon" href="https://daffodilvarsity.edu.bd/images/diu/favicon.ico" type="image/gif">
        <link rel="stylesheet" href="{{asset('css/app.css')}}" />
        <!-- Slick Carousel -->
        <link rel="stylesheet" href="{{asset('js/slick/slick.css')}}">
        <link rel="stylesheet" href="{{asset('js/slick/slick-theme.css')}}">
        <!-- FancyBox -->
        <link rel="stylesheet" href="{{asset('js/fancybox/jquery.fancybox.min.css')}}">
        <link src="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
        <!-- Stylesheets -->
        <link href="{{asset('css/style.css')}}" rel="stylesheet">
        
        <!--Favicon-->
        <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
        <link rel="icon" href="images/favicon.ico" type="image/x-icon">
        <div id="fb-root"></div>
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v4.0"></script>
    </head>
    <body>
        <div class="page-wrapper">
            @include('layouts.header')

            @yield('content')

            @extends('layouts.footer')
        </div>
        <script src="{{asset('js/jquery.js')}}"></script>
        <script src="{{asset('js/bootstrap.min.js')}}"></script>
        <script src="{{asset('js/bootstrap-select.min.js')}}"></script>
        <!-- Slick Slider -->
        <script src="{{asset('js/slick/slick.min.js')}}"></script>
        <!-- FancyBox -->
        <script src="{{asset('js/fancybox/jquery.fancybox.min.js')}}"></script>
        <!-- Google Map -->
        <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCC72vZw-6tGqFyRhhg5CkF2fqfILn2Tsw"></script> 
        <script src="{{asset('js/google-map/gmap.js')}}"></script>
        -->
        <script src="{{asset('js/validate.js')}}"></script>
        <script src="{{asset('js/wow.js')}}"></script>
        <script src="{{asset('js/jquery-ui.js')}}"></script>
        <script src="{{asset('js/script.js')}}"></script>
        <script src="{{asset('js/mouse.js')}}"></script>
    </body>

</html>