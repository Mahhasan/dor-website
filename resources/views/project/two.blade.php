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
                    <div class="panel-heading" style="font-family:Century Gothic;"><b>Numerical analysis of natural convective heat transport of copper oxide-water nanofluid flow inside a quadrilateral vessel</b></div>
                    <div class="panel-body">
                        <b>Authors: M.J. Uddin, S.K. Rasel</b> <br>
                        <p></p>
                        <h4>ABSTRACT</h4>
                        <p></p>
                        <p>
                            Nanofluid based heat transfer approaches have a tremendous prospect to develop novel cost-effective cooling
                            technologies. In response to this potential development, a problem of unsteady copper oxide-water nanofluid flow
                            and natural convective heat transfer within a quadrilateral vessel with uniform heating of bottom wall using
                            modified Buongiorno model are investigated. The sloping wall of the vessel is maintained at constant low temperature
                            and the uniform thermal condition on the bottom heated wall is considered, whereas the upper horizontal
                            wall is regarded as adiabatic. The governing equations along with boundary conditions are solved using the
                            Galerkin finite element method. Partial differential equation solver COMSOL Multiphysics with Matlab interface
                            is used in the simulation. The results of the present problem of a certain situation as a special case have been
                            verified by the previously published standard numerical investigations. The flow, thermal and concentration
                            fields, local and average Nusselt number for various pertinent parameters entered into the problem have been
                            analyzed. The time evolutions for a steady-state solution are also examined. The results show that the adjustment
                            factor with the optimal nanoparticle volume fraction and the thermal Rayleigh number controls the optimal heat
                            transfer. The trapezoidal vessel having higher sloping angles with the vertical axis exhibits higher heat transfer.
                            Heat transfer decreases rapidly in 1–10 nm size nanoparticles for a nanofluid solution.
                        </p>
                        Source: <a href="https://www.sciencedirect.com/science/article/pii/S2405844019320432" target="_blank">https://www.sciencedirect.com/science/article/pii/S2405844019320432</a>
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
