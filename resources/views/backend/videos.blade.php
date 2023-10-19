@extends('backend.layouts.master')
@section('content')
<div class="container">
    <div class="row bg-aliceblue">
        <div class="custom-form col-md-10 mx-auto pt-5 pb-5">
            <h5>Videos</h5>
            @if(isset($video))
            <h6>Edit Record</h6>
            <form method="POST" action="{{ route('videos.update', $video->id) }}" enctype="multipart/form-data">
            @method('PATCH')
            @else
            <h6>Create New Record</h6>
            <form method="POST" action="{{ route('videos.store') }}" enctype="multipart/form-data">
                @endif
                @csrf
                <div class="row mt-5">
                    <div class="input-container col-sm-6 mb-4">
                        <input type="text" class="input" id="title" name="title" value="{{ old('title', isset($video) ? $video->title : '') }}" required placeholder=" "/>
                        <div class="cut"></div>
                        <label for="title" class="placeholder">Title</label>
                    </div>
                    <div class="input-container col-sm-6 mb-4">
                        <input type="number" class="input" id="year" name="year" value="{{ old('year', isset($video) ? $video->year : '') }}" required placeholder=" "/>
                        <div class="cut"></div>
                        <label for="year" class="placeholder">Year</label>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-12 mb-4">
                        <div class="video-links">
                            @if(isset($video) && $video->video_links)
                                @foreach(json_decode($video->video_links, true) as $index => $videoLink)
                                    <div class="row input-container mb-5">
                                        <div class="col-8 col-sm-10">
                                            <input type="text" class="input" name="video_links[]" value="{{ old('video_links.' . $index, $videoLink) }}" placeholder=" "/>
                                            <div class="cut"></div>
                                            <label for="video_links" class="placeholder">Video Link {{ $index + 1 }}</label>
                                            <div class="video-iframe mt-3">
                                                <iframe width="100%" height="300px" src="{{ $videoLink }}" frameborder="0" allowfullscreen></iframe>
                                            </div>
                                        </div>
                                        <button type="button" class="col-4 col-sm-2 btn btn-outline-danger remove-video-link">Remove</button>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <button type="button" class="btn btn-sm btn-outline-info" id="add-video-link">Insert Video Link</button>
                    </div>
                </div>
                @if(isset($video))
                    <button type="submit" class="btn btn-sm btn-primary">Save Changes</button>
                    <a href="{{ route('videos.index') }}" class="btn btn-sm btn-secondary">Cancel</a>
                @else
                    <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                @endif
            </form>
        </div>
    </div>
    
    <div class="mx-auto mt-5 mb-5">
        <h5 class="text-center pt-5">Video Gallery</h5>
    </div>

    <div class="row mb-5">
        @foreach($videos as $key=>$video)
            <div class="col-sm-12 mb-5 mx-auto">
                <div class="card border-0">
                    <div class="pt-3 text-center">
                        <h6 class="font-weight-bold">{{ $video->title }}</h6>
                        <p>Year: {{ $video->year }}</p>
                        <a href="{{ route('videos.edit', $video->id) }}" class="btn text-primary"><i class="fas fa-edit fa-sm"></i></a>
                        <form action="{{ route('videos.destroy', $video->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn text-danger" onclick="return confirm('Are you sure you want to delete this record?')"><i class="fa fa-trash fa-sm" aria-hidden="true"></i></button>
                        </form>
                    </div>
                    <hr>
                    @if($video->video_links)
                        <div class="row">
                            @foreach(json_decode($video->video_links, true) as $videoLink)
                                <div class="col-md-6 pb-3 mx-auto">
                                    <div class="video-iframe">
                                        <iframe width="100%" height="300px" src="{{ $videoLink }}" frameborder="0" allowfullscreen></iframe>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        No Videos Available
                    @endif
                </div>
            </div>
        @endforeach
        <div class="float-right">
            {!! $videos->links('pagination::bootstrap-5') !!}
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        // Add Link button click event
        $('#add-video-link').click(function () {
            var linkField = `
                <div class="row input-container mb-4">
                    <div class="col-8 col-sm-10">
                        <input type="url" class="input" name="video_links[]" placeholder=" "/>
                        <div class="cut"></div>
                        <label for="video_links" class="placeholder">Video Link</label>
                    </div>
                    <button type="button" class="col-4 col-sm-2 btn btn-outline-danger remove-video-link">Remove</button>
                </div>
            `;
            $('.video-links').append(linkField);
        });

        // Remove Link button click event
        $('.video-links').on('click', '.remove-video-link', function () {
            $(this).closest('.input-container').remove();
        });
    });
</script>
@endsection
