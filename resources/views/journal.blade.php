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
  <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v4.0"></script>
</head>
<body>

<div class="page-wrapper">

@include('layouts.header')

<!-- Our Story -->
<section class="cta">
    <div class="container">
        <div class="row">
            <div class="panel panel-primary">
                <div class="panel-heading">DIU Journals</div>
                <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Sl. No</th>
                                <th scope="col">Journal Name</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>
                                   <p></p>
                                   <a href="http://diujst.daffodilvarsity.edu.bd" target="_blank">DIU Journal of Science and Technology</a>
                                </td>
                                <td>
                                    <a href="http://diujst.daffodilvarsity.edu.bd" target="_blank"><img src="images/diujst.jpg" style="display: block;margin-left: auto;margin-right: auto;max-width: 300px;"></a>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>
                                    <p></p>
                                    <a href="http://diujbe.daffodilvarsity.edu.bd" target="_blank">DIU Journal of Business & Entrepreneurship</a>
                                </td>
                                <td><a href="http://diujbe.daffodilvarsity.edu.bd/" target="_blank"><img src="images/diujbe.png" style="display: block;margin-left: auto;margin-right: auto;max-width: 300px;"></a></td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>
                                    <p></p>
                                    <a href="http://diujhss.daffodilvarsity.edu.bd" target="_blank">DIU Journal of Humanities & Social Science</a>
                                </td>
                                <td><a href="http://diujhss.daffodilvarsity.edu.bd" target="_blank"><img src="images/diujhss.jpg" style="display: block;margin-left: auto;margin-right: auto;max-width: 300px;"></a></td>
                            </tr>
                            
                            <tr>
                                <th scope="row">4</th>
                                <td>
                                    <p></p>
                                    <a href="https://diujahs.daffodilvarsity.edu.bd" target="_blank">DIU Journal of Allied Health Sciences</a>
                                </td>
                                <td><a href="https://diujahs.daffodilvarsity.edu.bd" target="_blank"><img src="images/diujahs.jpg" style="display: block;margin-left: auto;margin-right: auto;max-width: 300px;"></a></td>
                            </tr>
                        </tbody>
                </table>
            </div>
		</div>
    </div>
</section> 

<!--footer-main-->
@extends('layouts.footer')
<!--End footer-main-->

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
