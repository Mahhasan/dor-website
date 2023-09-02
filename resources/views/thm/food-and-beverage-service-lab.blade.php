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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <!-- Stylesheets -->
  <link href="{{asset('css/style.css')}}" rel="stylesheet">
  
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
                    <h3>Food and Beverage Service lab</h3>
                    <b>Assigned Person Details</b><br>
                    <b>Mohammad Nurul Afchar</b><br>
                    <b>Lecturer</b><br>
                    <p><i class="fa fa-phone" aria-hidden="true"></i> <a href="tel:01554319150">01554319150</a>&nbsp;&nbsp;<i class="fa fa-envelope" aria-hidden="true"></i> <a href = "mailto: nurul.thm0013.c@diu.edu.bd">nurul.thm0013.c@diu.edu.bd</a> </p>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="gallery-item">
                    <img src="https://daffodilvarsity.edu.bd/labGallery/23d8cab8ad362039ac49cecd9c6aab6f.webp" class="img-responsive" style="width:360px; height:250px;" alt="gallery-image">
                    <a data-fancybox="images" href="https://daffodilvarsity.edu.bd/labGallery/23d8cab8ad362039ac49cecd9c6aab6f.webp"></a>
                    <p>Food and Beverage Service lab</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="gallery-item">
                    <img src="https://daffodilvarsity.edu.bd/labGallery/c5b65d509254bbfb19f7fac679e25089.webp" class="img-responsive" style="width:360px; height:250px;" alt="gallery-image">
                    <a data-fancybox="images" href="https://daffodilvarsity.edu.bd/labGallery/c5b65d509254bbfb19f7fac679e25089.webp"></a>
                    <p>Food and Beverage Service lab</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="gallery-item">
                    <img src="https://daffodilvarsity.edu.bd/labGallery/b98750f89c33eec0f9f4c34520cd6b1a.webp" class="img-responsive" style="width:360px; height:250px;" alt="gallery-image">
                    <a data-fancybox="images" href="https://daffodilvarsity.edu.bd/labGallery/b98750f89c33eec0f9f4c34520cd6b1a.webp"></a>
                    <p>Food and Beverage Service lab</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="gallery-item">
                    <img src="https://daffodilvarsity.edu.bd/labGallery/5454e67e392a82d7f27175a3f781d8a7.webp" class="img-responsive" style="width:360px; height:250px;" alt="gallery-image">
                    <a data-fancybox="images" href="https://daffodilvarsity.edu.bd/labGallery/5454e67e392a82d7f27175a3f781d8a7.webp"></a>
                    <p>Food and Beverage Service lab</p>
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