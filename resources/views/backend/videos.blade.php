@extends('backend.layouts.master')
@section('content')
<div class="container">
    @if (Session::has('success'))
        <div class="alert alert-success mt-3">{{ Session::get('success') }}</div>
    @endif
    @if (Session::has('error'))
        <div class="alert alert-danger mt-3">{{ Session::get('error') }}</div>
    @endif
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
                                    <div class="row input-container mb-4">
                                        <div class="col-8 col-sm-10">
                                            <input type="text" class="input" name="video_links[]" value="{{ old('video_links.' . $index, $videoLink) }}" placeholder=" "/>
                                            <div class="cut"></div>
                                            <label for="video_links" class="placeholder">Video Link {{ $index + 1 }}</label>
                                        </div>
                                        <button type="button" class="col-4 col-sm-2 btn btn-outline-danger remove-video-link">Remove</button>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <button type="button" class="btn btn-outline-info" id="add-video-link">Insert Video Link</button>
                    </div>
                </div>
                @if(isset($video))
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                    <a href="{{ route('videos.index') }}" class="btn btn-danger">Cancel</a>
                @else
                    <button type="submit" class="btn btn-primary">Submit</button>
                @endif
            </form>
        </div>
    </div>
    <div class="row">
        <div class="mx-auto pt-5 pb-5">
            <h5 class="text-center mb-5">Video Gallery</h5>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Title</th>
                            <th>Year</th>
                            <th>videos</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($videos as $key=>$video)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $video->year }}</td>
                                <td>{{ $video->title }}</td>
                                <td>
                                    @if($video->video_links)
                                        @foreach(json_decode($video->video_links, true) as $videoLink)
                                            <div class="video-iframe">
                                                <iframe width="200" height="150" src="{{ $videoLink }}" frameborder="0" allowfullscreen></iframe>
                                            </div>
                                        @endforeach
                                    @else
                                        No Videos Available
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('videos.edit', $video->id) }}" class="btn text-primary"><i class="fas fa-edit fa-sm"></i></a>
                                    <form action="{{ route('videos.destroy', $video->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn text-danger" onclick="return confirm('Are you sure you want to delete this record?')"><i class="fa fa-trash fa-sm" aria-hidden="true"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
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
