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
      @include('layouts.header')

<section class="cta">
    <div class="container">
        <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Scopus Indexed Paper
                </div>
                            <!-- /.panel-heading -->
                <div class="panel-body">
                    <div>
                        <h4>Paper Details </h4>
                    </div>
                    <hr>
                    <dl class="row">
                        <dt class="col-sm-2">Title</dt>
                        <dd class="col-sm-10" style="margin-left: 135px;margin-top: -20px;">{{$articles['title']}}</dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-2">Abstract</dt>
                        <dd class="col-sm-10" style="margin-left: 135px;margin-top: -20px;text-align:justify;">{{$articles['abstract']}}</dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-2">Keywords</dt>
                        <dd class="col-sm-10" style="margin-left: 135px;margin-top: -20px;">{{$articles['keywords']}}</dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-2">Authors</dt>
                        <dd class="col-sm-10" style="margin-left: 135px;margin-top: -20px;">{{$articles['authors']}}</dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-2">Phone</dt>
                        <dd class="col-sm-10" style="margin-left: 135px;margin-top: -20px;">{{$articles['phone']}}</dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-2">Journal or Conference Name</dt>
                        <dd class="col-sm-10" style="margin-left: 135px;margin-top: -20px;"> <a href="{{$articles['journal_link']}}" >{{$articles['journal_name']}}</a> </dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-2">Publish Year</dt>
                        <dd class="col-sm-10" style="margin-left: 135px;margin-top: -20px;">{{$articles['publish_year']}}</dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-2">Indexing</dt>
                        <dd class="col-sm-10" style="margin-left: 135px;margin-top: -20px;">{{$articles['indexing']}}</dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
@extends('layouts.footer')
</div>

<!--data table-->



<!--data table-->
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<!--<script src="{{asset('js/modernizr-2.6.2-respond-1.1.0.min.js')}}"></script>-->
<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<!--<script src="{{asset('js/bootstrap-select.min.js')}}"></script>-->
<!-- Slick Slider -->
<script src="{{asset('js/slick/slick.min.js')}}"></script>
<!-- FancyBox -->
<script src="{{asset('js/fancybox/jquery.fancybox.min.js')}}"></script>
<!-- Google Map -->
<!--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCC72vZw-6tGqFyRhhg5CkF2fqfILn2Tsw"></script>
<script src="{{asset('js/google-map/gmap.js')}}"></script>-->

<script src="{{asset('js/validate.js')}}"></script>
<script src="{{asset('js/wow.js')}}"></script>
<script src="{{asset('js/jquery-ui.js')}}"></script>
<script src="{{asset('js/script.js')}}"></script>

<script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('js/dataTables.responsive.js')}}"></script>

</body>

</html>

