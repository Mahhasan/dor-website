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
                    <h3>Chemistry laby</h3>
                    <b>Assigned Person Details</b><br>
                    <b>Tahmina Nasrin</b><br>
                    <b>Technical officer</b><br>
                    <p><i class="fa fa-phone" aria-hidden="true"></i> <a href="tel:01731221027">01731221027</a>&nbsp;&nbsp;<i class="fa fa-envelope" aria-hidden="true"></i> <a href = "mailto: tnasrin@daffodilvarsity.edu.bd">tnasrin@daffodilvarsity.edu.bd</a> </p>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="gallery-item">
                    <img src="https://daffodilvarsity.edu.bd/labGallery/e5ddbb81b83e35edb9bb37da38c5ea2c.webp" class="img-responsive" style="width:360px; height:250px;" alt="gallery-image">
                    <a data-fancybox="images" href="https://daffodilvarsity.edu.bd/labGallery/e5ddbb81b83e35edb9bb37da38c5ea2c.webp"></a>
                    <p></p>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="gallery-item">
                    <img src="https://daffodilvarsity.edu.bd/labGallery/bb36183ee9f0a704991aefa9f9ae8838.webp" class="img-responsive" style="width:360px; height:250px;" alt="gallery-image">
                    <a data-fancybox="images" href="https://daffodilvarsity.edu.bd/labGallery/bb36183ee9f0a704991aefa9f9ae8838.webp"></a>
                    <p></p>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="gallery-item">
                    <img src="https://daffodilvarsity.edu.bd/labGallery/bb36183ee9f0a704991aefa9f9ae8838.webp" class="img-responsive" style="width:360px; height:250px;" alt="gallery-image">
                    <a data-fancybox="images" href="https://daffodilvarsity.edu.bd/labGallery/bb36183ee9f0a704991aefa9f9ae8838.webp"></a>
                    <p></p>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="gallery-item">
                    <img src="https://daffodilvarsity.edu.bd/labGallery/6b50696b10a21a2d6007ef807300045a.webp" class="img-responsive" style="width:360px; height:250px;" alt="gallery-image">
                    <a data-fancybox="images" href="https://daffodilvarsity.edu.bd/labGallery/6b50696b10a21a2d6007ef807300045a.webp"></a>
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