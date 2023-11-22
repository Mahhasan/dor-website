@extends('backend.layouts.master')
@section('content')
<div class="container">
    <!-- Button to toggle form visibility -->
    @if(!isset($video))
        <button class="float-right btn btn-sm btn-primary" id="toggleForm" data-original-text="Upload New Video">Upload New Video</button>
    @endif
    <div class="row bg-aliceblue" id="FormContainer" style="display: {{ isset($video) ? 'block' : 'none' }};">
        <div class="custom-form col-md-10 mx-auto pt-5 mb-5 pb-5">
            @if(isset($video))
            <h6>Edit <span class="text-success font-weight-bold">{{ $video->title }} - {{$video->year}}</span> Record</h6>
            <form method="POST" action="{{ route('videos.update', $video->id) }}" enctype="multipart/form-data">
            @method('PATCH')
            @else
            <h6>Upload New Video</h6>
            <form method="POST" action="{{ route('videos.store') }}" enctype="multipart/form-data">
                @endif
                @csrf
                <div class="row mt-5">
                    <div class="input-container col-md-6 mb-4">
                        <input type="text" class="input" id="title" name="title" value="{{ old('title', isset($video) ? $video->title : '') }}" required placeholder=" "/>
                        <div class="cut"></div>
                        <label for="title" class="placeholder">Title <span class="text-danger">*</span></label>
                    </div>
                    <div class="input-container col-md-6 mb-4">
                        <select class="input" id="year" name="year" required>
                            <option value="">Select Year</option>
                            @php
                                $currentYear = date('Y');
                            @endphp
                            
                            @for ($i = $currentYear; $i >= ($currentYear - 40); $i--)
                                <option value="{{ $i }}" {{ old('year', isset($video) && $video->year == $i ? 'selected' : '') }}>{{ $i }}</option>
                            @endfor
                        </select>
                        <div class="cut"></div>
                        <label for="year" class="placeholder">Year <span class="text-danger">*</span></label>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-12 mb-4">
                        <div class="video-links">
                            <div class="row input-container mb-4">
                                <div class="col-8 col-sm-10">
                                    <input type="url" class="input" name="video_links[]" value="{{ old('video_links.0', isset($video) ? json_decode($video->video_links, true)[0] : '') }}" required placeholder=" "/>
                                    <div class="cut"></div>
                                    <label for="video_links" class="placeholder">Video Link 1 <span class="text-danger">*</span></label>
                                </div>
                                <button type="button" class="col-4 col-sm-2 btn btn-outline-danger remove-video-link" style="display: none;">Remove</button>
                            </div>

                            @if(isset($video) && $video->video_links)
                                @foreach(array_slice(json_decode($video->video_links, true), 1) as $index => $videoLink)
                                    <div class="row input-container mb-5">
                                        <div class="col-8 col-sm-10">
                                            <input type="url" class="input" name="video_links[]" value="{{ old('video_links.' . $index, $videoLink) }}" placeholder=" "/>
                                            <div class="cut"></div>
                                            <label for="video_links" class="placeholder">Video Link {{ $index + 2 }}</label>
                                        </div>
                                        <button type="button" class="col-4 col-sm-2 btn btn-outline-danger remove-video-link">Remove</button>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <button type="button" class="btn btn-sm btn-outline-info" id="add-video-link">Add More Video Link</button>
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
    
    <div class="mx-auto mb-5">
        <h5 class="text-center pt-5">Video Gallery</h5>
    </div>

    <div class="row mb-5">
        @foreach($videos as $key=>$video)
            <div class="col-sm-12 mb-5 mx-auto">
                <div class="card border-0">
                    <div class="pt-3 text-center">
                        <h6 class="font-weight-bold">{{ $video->title }}</h6>
                        <p>Year: {{ $video->year }}</p>
                        <a href="{{ route('videos.edit', $video->id) }}" class="btn btn-sm text-primary"><i class="fas fa-edit fa-sm"></i></a>
                        <form action="{{ route('videos.destroy', $video->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm text-danger" onclick="return confirm('Are you sure you want to delete this record?')"><i class="fa fa-trash fa-sm" aria-hidden="true"></i></button>
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
        // Initial setup to keep at least one input field
        toggleRemoveButtonVisibility();

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

            // After adding a new field, update remove button visibility
            toggleRemoveButtonVisibility();
        });

        // Remove Link button click event
        $('.video-links').on('click', '.remove-video-link', function () {
            $(this).closest('.row').remove();

            // After removing a field, update remove button visibility
            toggleRemoveButtonVisibility();
        });

        function toggleRemoveButtonVisibility() {
            // Show the remove button only if there are more than one input fields
            $('.remove-video-link').toggle($('.video-links .row').length > 1);
        }
    });
</script>
@endsection
