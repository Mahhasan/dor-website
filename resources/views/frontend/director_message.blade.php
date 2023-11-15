@extends('frontend.layouts.master')
@section('content')
<section class="cta">
    <div class="container">
        @foreach($directorMessages as $key=>$directorMessage)
            <div class="row p-4 bg" style="background-color:#f2f2f2">
                <h4 class="text-center pb-5" style="font-family: Century Gothic;">{{ $directorMessage->title }}</h4>
                <p>
                    @if($directorMessage->picture)
                        <img class="d-block mx-auto" src="{{ asset('uploads/director_message/' . $directorMessage->picture) }}"alt="">
                    @else
                        <img src="{{ asset('path_to_default_image.jpg') }}" class="card-img-top" alt="">
                    @endif
                </p>
                <p>{!! $directorMessage->message !!}</p>
            </div>
        @endforeach
    </div>
</section> 
@endsection