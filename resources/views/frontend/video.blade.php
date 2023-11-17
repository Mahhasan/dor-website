@extends('frontend.layouts.master')
@section('content')
<section class="video-gallery">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center">
                    <h3>Video Gallery</h3>
                </div>
            </div>
            @foreach($videos as $key=>$video)
                @if($video->video_links)
                    @foreach(json_decode($video->video_links, true) as $videoLink)
                        <div class="col-md-6">
                            <div class="video-gallery-item">
                                <div class="video-iframe">
                                    <iframe width="100%" height="350" allow="autoplay" src="{{ $videoLink }}" frameborder="0" allowfullscreen></iframe>
                                    <h3>{{ $video->title }} - {{ $video->year }}</h3>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    No Videos Available
                @endif
            @endforeach
        </div>
    </div>
</section>
@endsection