@extends('backend.layouts.master')
@section('content')
<div class="container">
    @if (Session::has('success'))
        <div class="alert alert-success mt-3">
            {{ Session::get('success') }}
        </div>
    @endif

    @if (Session::has('error'))
        <div class="alert alert-danger mt-3">
            {{ Session::get('error') }}
        </div>
    @endif
    <div class="row bg-aliceblue">
        <div class="custom-form col-md-10 mx-auto pt-5 pb-5">
            <h5>Photos</h5>
            @if(isset($photo))
            <h6>Edit Record</h6>
            <form method="POST" action="{{ route('photos.update', $photo->id) }}" enctype="multipart/form-data">
                @method('PATCH')
                @else
                <h6>Create New Record</h6>
            <form method="POST" action="{{ route('photos.store') }}" enctype="multipart/form-data">
                @endif
                @csrf
                <div class="row additional-links">
    @if(isset($photo) && $photo->links)
        @foreach(json_decode($photo->links, true) as $index => $link)
            <div class="input-container col-sm-12 mb-4">
                <input type="url" class="input" id="link" name="links[]" value="{{ old('links.' . $index, $link) }}" placeholder=" "/>
                <div class="cut"></div>
                <label for="link" class="placeholder">Additional Link {{ $index + 1 }}</label>
                <button type="button" class="btn btn-danger remove-link float-right">Remove Link</button>
            </div>
        @endforeach
    @endif
</div>
<button type="button" class="btn btn-primary" id="add-link">Add Link</button>
                <div class="row mt-5">
                    <div class="input-container col-sm-6 mb-4">
                        <input type="text" class="input" id="title" name="title" value="{{ old('title', isset($photo) ? $photo->title : '') }}" required placeholder=" "/>
                        <div class="cut"></div>
                        <label for="title" class="placeholder">Title</label>
                    </div>
                    <div class="input-container col-sm-6 mb-4">
                        <input type="url" class="input" id="link" name="link" value="{{ old('link', isset($photo) ? $photo->link : '') }}" placeholder=" "/>
                        <div class="cut"></div>
                        <label for="link" class="placeholder">Image Link</label>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-12 mb-4">
                        <input type="file" class="form-control border-0" id="pictures" name="pictures[]" accept="image/*" multiple>
                        @if(isset($photo) && $photo->pictures)
                            <div class="row existing-pictures float-right mt-3 ml-1 mr-1">
                                @foreach(json_decode($photo->pictures, true) as $picture)
                                    <div class="existing-picture mr-1">
                                        <input type="checkbox" name="deleted_pictures[]" value="{{ $picture }}">
                                        <img src="{{ asset('uploads/photos/' . $picture) }}" alt="{{ $photo->title }} Image" height="75px" width="100">
                                    </div>
                                @endforeach
                            </div>
                        @endif   
                    </div>
                </div>
                @if(isset($photo))
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                    <a href="{{ route('photos.index') }}" class="btn btn-danger">Cancel</a>
                @else
                    <button type="submit" class="btn btn-primary">Submit</button>
                @endif
            </form>
        </div>
    </div>

    <div class="row">
        <div class="mx-auto pt-5 pb-5">
            <h5 class="text-center mb-5">Research Coordinator Records</h5>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Title</th>
                            <th>Images</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($photos as $key=>$photo)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $photo->title }}</td>
                                <td>
                                    @if($photo->pictures)
                                        <div class="existing-pictures">
                                            @foreach(json_decode($photo->pictures, true) as $picture)
                                                <img src="{{ asset('uploads/photos/' . $picture) }}" alt="{{ $photo->title }} Image" height="75px" width="100">
                                            @endforeach
                                        </div>
                                    @else
                                        No Images Available
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('photos.edit', $photo->id) }}" class="btn text-primary"><i class="fas fa-edit fa-sm"></i></a>
                                    <form action="{{ route('photos.destroy', $photo->id) }}" method="POST" style="display: inline;">
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
        $('#add-link').click(function () {
            var linkField = `
                <div class="input-container col-sm-12 mb-4">
                    <input type="url" class="input" name="links[]" placeholder=" "/>
                    <div class="cut"></div>
                    <label for="link" class="placeholder">Additional Image Link</label>
                    <button type="button" class="btn btn-danger remove-link">Remove Link</button>
                </div>
            `;
            $('.additional-links').append(linkField);
        });

        // Remove Link button click event
        $('.additional-links').on('click', '.remove-link', function () {
            $(this).closest('.input-container').remove();
        });
    });
</script>

@endsection