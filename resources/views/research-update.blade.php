<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title> Division of Research </title>

  
  <!-- mobile responsive meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link rel="stylesheet" href="{{asset('css/app.css')}}" />
  <!-- Slick Carousel -->
  <link rel="stylesheet" href="{{asset('js/slick/slick.css')}}">
  <link rel="stylesheet" href="{{asset('js/slick/slick-theme.css')}}">
  <!-- FancyBox -->
  <link rel="stylesheet" href="{{asset('js/fancybox/jquery.fancybox.min.css')}}">
  
  <!-- Stylesheets -->
  <link href="{{asset('css/style.css')}}" rel="stylesheet">
  
  <!--Favicon-->
  <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
  <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v4.0"></script>
</head>
<body>

<div class="page-wrapper">
      @include('layouts.header')

<section class="cta">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <h3 style="text-align: center">Research Update</h3><br>
                    <!--<p style="text-align: center; color: black; font-size: 20px; font-weight: bold;">The Research Update is a periodical published by the Division of Research will be available soon.</p>-->
               <iframe src="{{asset('pdf/research-update.pdf')}}" width="100%" height="700px">
                            </iframe>
                </div><br><br><br><br><br><br><br>
            </div>
        </div>
    </div>
</section>
@extends('layouts.footer')
</div>
<script src="{{asset('js/modernizr-2.6.2-respond-1.1.0.min.js')}}"></script>
<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<!-- <script src="{{asset('js/bootstrap-select.min.js')}}"></script> -->
<!-- Slick Slider -->
<script src="{{asset('js/slick/slick.min.js')}}"></script>
<!-- FancyBox -->
<script src="{{asset('js/fancybox/jquery.fancybox.min.js')}}"></script>
<!-- Google Map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCC72vZw-6tGqFyRhhg5CkF2fqfILn2Tsw"></script>
<script src="{{asset('js/google-map/gmap.js')}}"></script>

<script src="{{asset('js/validate.js')}}"></script>
<script src="{{asset('js/wow.js')}}"></script>
<script src="{{asset('js/jquery-ui.js')}}"></script>
<script src="{{asset('js/script.js')}}"></script>
</body>

</html>