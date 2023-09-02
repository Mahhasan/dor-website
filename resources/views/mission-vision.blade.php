<!DOCTYPE html>
<html>

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  
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
  
  <!--data table-->
  
  
  <link href="{{asset('css/dataTables.bootstrap.css')}}" rel="stylesheet">

    <link href="{{asset('css/dataTables.responsive.css')}}" rel="stylesheet">
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v4.0"></script>
</head>


<body>
  <div class="page-wrapper">



<!--Main Header-->
@include('layouts.header')
<!--End Main Header -->

<!--End Page Title-->

<!-- Our Story -->
<section class="cta">
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="background-color:#f2f2f2">
              <h3 style="text-align:center;padding: 12px;">Vision</h3>
              
                        
                <div class="cta-block">
                      <h3 style="text-align:justify;font-family: Century Gothic">
                            The vision of Daffodil International University research is to help improve quality of life of people and develop society through discovery of knowledge and innovation.
                      </h3>
                </div>
                <h3 style="text-align:center;padding: 12px;">Mission</h3>
                <div class="cta-block">
                      •	Establish a sustainable research culture academically in a collaborative manner <br>
•	Enhance research networking with foreign university faculty to improve quality of research and publications <br>
•	Identify current issues and problems of different disciplines and resolve them through fundamental, experimental and applied research jointly with the local and foreign stakeholders<br>
•	Undertake research projects in practical contexts to solve national and international problems and fulfill the demands of the society. <br>

                </div>
            </div>
        </div>
    </div>
</section> 

<!--footer-main-->
@extends('layouts.footer')
<!--End footer-main-->

</div>
<!--End pagewrapper-->


<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target=".header-top">
  <span class="icon fa fa-angle-up"></span>
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
