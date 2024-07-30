@extends('frontend.layouts.master')
@section('content')
@include('frontend.layouts.slider')
<section class="service-section bg-gray section">
    <div class="container">
        <div class="section-title text-center">

            <h4 style="color: black;text-align:left; font-size: 29px;">Daffodil International University cultivates educational innovations, collaborations and knowledge sharing and conducts research for improvement of life of people and creating a sustainable environment for future generations </h4>
        </div>
        <div class="row items-container clearfix">
            <div class="item">
                <div class="inner-box">
                    <div class="img_holder">
                        <a href="{{url('/project/one')}}" target="_blank">
                            <img src="{{asset('images/project/1.PNG')}}" alt="images" class="img-responsive">
                        </a>
                    </div>
                    <div class="image-content text-center">
                        <a href="{{url('/project/one')}}" target="_blank">
                            <p style="color: green; text-align:left;"> <b>Finite element computational procedure for convective flow of nanofluids in an annulus</b></p>
                        </a>
                        <!--<small>M.J. Uddin</small>-->
                        <p style="text-align: justify;">In the present study, the detailed procedures of Galerkin weighted residual technique of finite element method (FEM)  <!--<a href="{{url('/project/one')}}" type="button" class="btn btn-success pull-right" target="_blank">Read More</a>-->
                        </p>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="inner-box">
                    <div class="img_holder">
                        <a href="{{url('/project/two')}}" target="_blank">
                            <img src="images/project/2.PNG" alt="images" class="img-responsive">
                        </a>
                    </div>
                    <div class="image-content text-center">
                        <a href="{{url('/project/two')}}" target="_blank">
                            <p style="color: green; text-align:left;"> <b>Numerical analysis of natural convective heat transport of copper oxide-water nanofluid flow inside a quadrilateral vessel</b></p>
                            <!--<h6>Biogas project</h6>-->
                        </a>
                        <p style="text-align: justify;">Nanofluid based heat transfer approaches have a tremendous prospect
                        <!--<a href="{{url('/project/two')}}" type="button" class="btn btn-success pull-right" target="_blank" >Read More</a>-->
                        </p>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="inner-box">
                    <div class="img_holder">
                        <a href="{{url('/project/one')}}" target="_blank">
                            <img src="images/project/1.PNG" alt="images" class="img-responsive">
                        </a>
                    </div>
                    <div class="image-content text-center">
                        <a href="{{url('/project/one')}}" target="_blank">
                            <p style="color: green; text-align:left;"> <b>Finite element computational procedure for convective flow of nanofluids in an annulus</b></p>
                        </a>
                        <!--<small>M.J. Uddin</small>-->
                        <p style="text-align: justify;">In the present study, the detailed procedures of Galerkin weighted residual technique of finite element method (FEM)  <!--<a href="{{url('/project/one')}}" type="button" class="btn btn-success pull-right" target="_blank">Read More</a>-->
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="popup-container">
        <div id="popup-content">
            <img src="images/mcu.png" alt="Popup Image">
            <div class="overlay-text">
                <p>We are excited to announce our signature of the Magna Charta Universitatum - MCU 2020: a global commitment to promote and support academic freedom, institutional autonomy, the connection between teaching and research, social responsibility and the core values of higher education.</p>
                <p>Join us by signing the 2020 MCU and become part of a community committed to continuously improving the future of higher education.</p>
                <p style="font-size:16px"><a href="https://www.magna-charta.org/magna-charta-universitatum/mcu2020" target="_blank">Apply now &#8594;</a></p>
                <p>#MCU2020 #ResponsibleUniversities #AcademicFreedom</p>
            </div>
            <span class="close-button" onclick="closePopup()">&times;</span>
        </div>
    </div>
</section>
@endsection
