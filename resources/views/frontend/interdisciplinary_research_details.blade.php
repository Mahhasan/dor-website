@extends('frontend.layouts.master')
@section('content')
<section class="gallery bg-gray">
    <div class="container">
        <div class="row">
            @foreach($interdiscipline as $discipline)
                <div class="col-md-12">
                    <div class="section-title text-center">
                        <h3>{{$discipline->lab_name}}</h3>
                        <b>Assigned Person Details</b><br>
                        <b>{{$discipline->person_name}}</b><br>
                        <b>{{$discipline->designation}}</b><br>
                        <p><i class="fa fa-phone" aria-hidden="true"></i> <a href="tel: 0{{$discipline->cell}}">0{{$discipline->cell}}</a>&nbsp;&nbsp;<i class="fa fa-envelope" aria-hidden="true"></i> <a href = "mailto: {{$discipline->email}}">{{$discipline->email}}</a> </p>
                    </div>
                </div>
                @if($discipline->picture)
                    @foreach(json_decode($discipline->picture, true) as $picture)
                        <div class="col-md-4 col-sm-6">
                            <div class="gallery-item">
                                <img src="{{ asset('uploads/interdisciplinary_research/' . $picture) }}" alt="" class="img-responsive" width="100%" height="300">
                                <a data-fancybox="images" href="{{ asset('uploads/interdisciplinary_research/' . $picture) }}"></a>
                                <!-- <p>Computer Lab-101</p> -->
                            </div>
                        </div>
                    @endforeach
                @else
                    No Images Available
                @endif
            @endforeach
        </div>
    </div>
</section>
@endsection