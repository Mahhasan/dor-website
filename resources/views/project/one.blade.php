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
                    <div class="panel-heading" style="font-family:Century Gothic;"><b>Finite element computational procedure for convective flow of nanofluids in an annulus</b></div>
                    <div class="panel-body">
                        <b>Authors: M.J. Uddin, M.M. Rahman</b> <br>
                        <p></p>
                        <h4>ABSTRACT</h4>
                        <p></p>
                        <p>
                            In the present study, the detailed procedures of Galerkin weighted residual technique of finite element method
                            (FEM) for solving two-dimensional incompressible natural convective flow of nanofluids using nonhomogeneous
                            dynamic model are discussed for the first time. The physical domain is discretized by using unstructured triangular
                            elements. The governing partial differential equations of nanofluids are made dimensionless using the
                            suitable transformation of variables for weak formulations. The method of weighted residuals is used for obtaining
                            the approximate solutions. This approach typically leads to a sparse and indefinite matrix that is difficult
                            to solve efficiently. The formation of an indefinite matrix is avoided in the present work by introducing an
                            artificial compressibility term in the continuity equation. Unequal order interpolation functions are used for
                            pressure, velocity, temperature and concentration variables. The coefficient matrices are calculated using interpolation
                            functions. Assembling of triangular elements in the discretized domain is discussed elaborately. The
                            process of calculating boundary integrals is also discussed. The Newton-Raphson iteration technique along with
                            Euler-backward scheme is used to solve the global matrix. The sample results are obtained for the convective
                            flow of nanofluids in a concentric annulus. It shows that the annulus of having higher thickness is the best
                            performer enhancing convective heat transfer rates.
                        </p>
                        Source: <a href="https://www.sciencedirect.com/science/article/abs/pii/S2451904917300902" target="_blank">https://www.sciencedirect.com/science/article/abs/pii/S2451904917300902</a>
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
