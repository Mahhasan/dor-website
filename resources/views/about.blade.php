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
              <h4 style="text-align:center;padding: 12px;font-family: Century Gothic;">Message from The Director</h4>
              <p>
                <img style="display: block; margin-left: auto; margin-right: auto;" src="images/director.jpg" alt="">
              </p>
                        
                <div class="cta-block">
                      <p style="text-align:justify;font-family: Century Gothic;">
                            The Division of Research of DIU started its journey in July 2017. The goal of the research endeavor of Division of Research is to build a research culture at the department level and the university as a whole and consequently, establish DIU as a Research University in international arena. Managing and conducting collaborative research with national and foreign universities is an important part of our endeavors. Participation in world university rankings (especially THE and QS) and ensure a position in the ranking list in the future is the best way to be recognized DIU by the global community. Quality education and research are two most important ingredients of world university rankings. <br>
                            For achievement of the goals, we give priority on setting up a research infrastructure in the university, and creating an appropriate environment for research and publications through awareness and capacity building, motivation, inspiration and encouragement of the faculty. These initiatives reveal positive impacts in terms of increasing number of Scopus publications of our faculty. <br>
                            This site will be resourceful gradually in course of time. <br>
                            <br>
                            Professor Dr. Md Kabirul Islam <br>
                            Director, Division of Research<br>
                            Daffodil International University
                      </p>
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
