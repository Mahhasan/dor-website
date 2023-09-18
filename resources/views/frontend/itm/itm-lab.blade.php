@extends('frontend.layouts.master')
@section('content')
<section class="gallery bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center">
                    <h3>Photo Gallery</h3>
                    <p><br></p>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="gallery-item">
                    <img src="images/gallery/01.JPG" class="img-responsive" style="width:360px; height:250px;" alt="gallery-image">
                    <a data-fancybox="images" href="images/gallery/01.JPG"></a>
                    <p>Launching Ceremony of Research Update 2022</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="gallery-item">
                    <img src="images/gallery/10.JPG" class="img-responsive" style="width:360px; height:250px;" alt="gallery-image">
                    <a data-fancybox="images" href="images/gallery/10.JPG"></a>
                    <p>Launching Ceremony of Research Update 2022</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="gallery-item">
                    <img src="images/gallery/04.JPG" class="img-responsive" style="width:360px; height:250px;" alt="gallery-image">
                    <a data-fancybox="images" href="images/gallery/04.JPG"></a>
                    <p>Launching Ceremony of Research Update 2022</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection