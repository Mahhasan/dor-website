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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <!--Favicon-->
  <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
  <link rel="icon" href="images/favicon.ico" type="image/x-icon">
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v4.0"></script>
</head>

<body>
  <div class="page-wrapper">
    <!-- Preloader -->
    <!-- <div class="preloader"></div> -->
    <!-- Preloader -->


<!--header top-->

<!--Header Upper-->

@include('layouts.header')
<!--Main Header-->

<section class="gallery bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center">
                    <h3>Erasmus Lab</h3>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="gallery-item">
                    <img src="https://campuslife.daffodil.university/gallery/december-2022/344a85b56a6f56ec9ed673be8de3ac13.webp" class="img-responsive" style="width:360px; height:250px;" alt="gallery-image">
                    <a data-fancybox="images" href="https://campuslife.daffodil.university/gallery/december-2022/344a85b56a6f56ec9ed673be8de3ac13.webp"></a>
                    <p></p>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="gallery-item">
                    <img src="https://campuslife.daffodil.university/gallery/december-2022/fdb6e569bcbaa31df165a753f7963a6f.webp" class="img-responsive" style="width:360px; height:250px;" alt="gallery-image">
                    <a data-fancybox="images" href="https://campuslife.daffodil.university/gallery/december-2022/fdb6e569bcbaa31df165a753f7963a6f.webp"></a>
                    <p></p>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="gallery-item">
                    <img src="https://campuslife.daffodil.university/gallery/december-2022/995c091403aee7c9092d749b35e21e2d.webp" class="img-responsive" style="width:360px; height:250px;" alt="gallery-image">
                    <a data-fancybox="images" href="https://campuslife.daffodil.university/gallery/december-2022/995c091403aee7c9092d749b35e21e2d.webp"></a>
                    <p></p>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="gallery-item">
                    <img src="https://campuslife.daffodil.university/gallery/december-2022/4231ff2d8d8a472f8d375b56c93f0596.webp" class="img-responsive" style="width:360px; height:250px;" alt="gallery-image">
                    <a data-fancybox="images" href="https://campuslife.daffodil.university/gallery/december-2022/4231ff2d8d8a472f8d375b56c93f0596.webp"></a>
                    <p></p>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="gallery-item">
                    <img src="https://campuslife.daffodil.university/gallery/december-2022/d610a1913e2a406ff7663f9dec2456b4.webp" class="img-responsive" style="width:360px; height:250px;" alt="gallery-image">
                    <a data-fancybox="images" href="https://campuslife.daffodil.university/gallery/december-2022/d610a1913e2a406ff7663f9dec2456b4.webp"></a>
                    <p></p>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="gallery-item">
                    <img src="https://campuslife.daffodil.university/gallery/december-2022/67a2073164e62e6a2c72d2099e4c5103.webp" class="img-responsive" style="width:360px; height:250px;" alt="gallery-image">
                    <a data-fancybox="images" href="https://campuslife.daffodil.university/gallery/december-2022/67a2073164e62e6a2c72d2099e4c5103.webp"></a>
                    <p></p>
                </div>
            </div>
        </div>
    </div>
</section>

@extends('layouts.footer')

<!--End footer-main-->

</div>
<!--End pagewrapper-->


<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target=".header-top">
  <span class="icon fa fa-angle-up">dd</span>
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
</body>

</html>