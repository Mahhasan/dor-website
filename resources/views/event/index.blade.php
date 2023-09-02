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
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Sl. No</th>
                            <th scope="col">Events</th>
                
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td><a href="{{url('/event/seven')}}" target="_blank">Launching Ceremony of Research Update-2022</a></td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td><a href="{{url('/event/six')}}" target="_blank">Research Award Giving Ceremony-2022</a></td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td><a href="{{url('/event/eight')}}" target="_blank">Meeting with Research Coordinators</a></td>
                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td><a href="{{url('/event/nine')}}" target="_blank">Webinar on: Students' Engagement and Opportunities in Research & Publications at DIU</a></td>
                        </tr
                        ><tr>
                            <th scope="row">5</th>
                            <td><a href="{{url('/event/ten')}}" target="_blank">Webinar on: Research Ethics & Plagiarism and Google Scholar Profile</a></td>
                        </tr>
                        <tr>
                            <th scope="row">6</th>
                            <td><a href="{{url('/event/eleven')}}" target="_blank">Workshop on Quantitative Research: Data Analysis and Interpretation using SPSS</a></td>
                        </tr>
                        <tr>
                            <th scope="row">7</th>
                            <td><a href="{{url('/event/twelve')}}" target="_blank">Workshop on "Qualitative Paradigm: Data Collection Methods and Data Analysis</a></td>
                        </tr>
                        <tr>
                            <th scope="row">8</th>
                            <td><a href="{{url('/event/thirteen')}}" target="_blank">Workshop on "Qualitative Research Methods: Problem Identification & Critical Literature Review</a></td>
                        </tr>
                        <tr>
                            <th scope="row">9</th>
                            <td><a href="{{url('/event/fourteen')}}" target="_blank">Workshop on Enhancement of Research among the faculty members of GED</a></td>
                        </tr>
                        
                        <!----------------->
                        
                        <tr>
                            <th scope="row">10</th>
                            <td><a href="{{url('/event/one')}}" target="_blank"> Workshop on the "Use of Scopus and ScienceDirect, and Bibliographic Management System Mendeley for Research and Publications" held at DIU </a></td>
                        </tr>
                        <tr>
                            <th scope="row">11</th>
                            <td><a href="{{url('/event/two')}}" target="_blank">Workshop with Research Coordinators on Research Plan of Fall Semester-2018</a></td>
                        </tr>
                        <tr>
                            <th scope="row">12</th>
                            <td><a href="{{url('/event/three')}}" target="_blank"> Workshop on Building a Sustainable Research Culture at the Entity Level of Daffodil International University </a></td>
                        </tr>
                        <tr>
                            <th scope="row">13</th>
                            <td><a href="{{url('/event/four')}}" target="_blank"> Research Division of DIU organized workshop on “Formalizing Research Culture at DIU” </a></td>
                        </tr>
                        <tr>
                            <th scope="row">14</th>
                            <td><a href="{{url('/event/five')}}" target="_blank"> Author Workshop on ‘Writing a Great Paper and Getting It Published in Research Journal’ held at DIU </a></td>
                        </tr>
                    </tbody>
                    </table>
                </div>
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
