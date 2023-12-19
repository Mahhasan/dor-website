@extends('frontend.layouts.master')
@section('content')
<section class="cta">
    <div class="container">
        @foreach($missionVisions as $missionVision)
            <div class="row p-4" style="background-color:#f2f2f2">
                <h3 class="text-center pt-5 pb-4">Vision</h3>
                <div class="cta-block">
                    <h3 style="text-align:justify;font-family: Century Gothic">
                        {!! $missionVision->vision !!}
                    </h3>
                </div>
                <h3 class="text-center pt-5 pb-4">Mission</h3>
                {!! $missionVision->mission !!}
            </div>
        @endforeach
    </div>
</section> 
@endsection