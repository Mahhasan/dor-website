@extends('frontend.layouts.master')
@section('content')
<section class="gallery bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center">
                    <h3>Photo Gallery </h3>
                </div>
            </div>
            @foreach($photos as $key=>$photo)
                @foreach(json_decode($photo->pictures, true) as $picture)
                    <div class="col-md-6 col-lg-4">
                        <div class="gallery-item">
                        <img src="{{ asset('uploads/photos/' . $picture) }}" alt="{{ $photo->title }} Image" width="100%">
                            <a data-fancybox="images" href="{{ asset('uploads/photos/' . $picture) }}"></a>
                            <p>{{ $photo->title }} - {{ $photo->year }}</p>
                        </div>
                    </div>
                @endforeach
                @foreach(json_decode($photo->links, true) as $link)
                    <div class="col-md-6 col-lg-4">
                        <div class="gallery-item">
                        <img src="{{ $link }}" alt="{{ $photo->title }} Image" width="100%">
                            <a data-fancybox="images" href="{{ $link }}"></a>
                            <p>{{ $photo->title }} - {{ $photo->year }}</p>
                        </div>
                    </div>
                @endforeach
            @endforeach
        </div>
    </div>
</section>
@endsection