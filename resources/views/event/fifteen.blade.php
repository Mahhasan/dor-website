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
<style>
body{
    font-family:Century Gothic;
}
    .center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;
}
</style>
</head>
<body>

<div class="page-wrapper">
    
@include('layouts.header')

<section class="cta">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row" >
                <div class="panel panel-primary">
                            <div class="panel-heading" style="font-family:Century Gothic;"><b>
                                workshop on "Patent Filing and Application"</b>
                            </div>
                            <div class="panel-body">
                                <img src="{{url('images/event/fifteen.jpg')}}" class="center">
                                <p style="font-family:Century Gothic; font-size: 15px; padding-top: 15px">A 3-day-long workshop on "Patent Filing and Application" was organized jointly by the Faculty of Graduate Studies (FGS) and Office of the International Affairs, DIU of Daffodil International University recently at the Prof. Aminul Islam Seminar Hall, Daffodil Smart City.</p>
                                <p style="font-family:Century Gothic; font-size: 15px;">Mr. Akarsh Sharma, Business Analyst, Shoolini University, India, conducted the 3-day workshop sessions as the Resource Person. Mr. Sharma has twenty patents registered in India, and he shared his experience and knowledge on filing patents. The sessions offered valuable insights into the process of designing and filing patents that helped to inspire and motivate participants to pursue their own innovative ideas while protecting their intellectual property. Four groups of faculties, officials, and students brainstormed their patentable ideas and interacted with the resource person and DIU dignitaries.</p>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</section>
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

</body>

</html>
