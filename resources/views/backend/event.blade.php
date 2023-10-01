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
            <h5>Events</h5>
            @if(isset($event))
            <h6>Edit Record</h6>
            <form method="POST" action="{{ route('events.update', $event->id) }}" enctype="multipart/form-data">
                @method('PATCH')
                @else
                <h6>Create New Record</h6>
            <form method="POST" action="{{ route('events.store') }}" enctype="multipart/form-data">
                @endif
                @csrf
                <div class="row mt-5">
                    <div class="input-container col-sm-6 mb-4">
                        <input type="text" class="input" id="title" name="title" value="{{ old('title', isset($event) ? $event->title : '') }}" required placeholder=" "/>
                        <div class="cut"></div>
                        <label for="title" class="placeholder">Title</label>
                    </div>
                    <div class="input-container col-sm-6 mb-4">
                        <input type="file" class="form-control border-0" id="picture" name="picture" accept="image/*" {{ isset($event) ? '' : 'required' }}>
                        @if(isset($event) && $event->picture)
                            <a href="{{ asset('uploads/event/' . $event->picture) }}" target="_blank" class="float-right">Click to see existing picture</a>
                        @endif   
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-12 mb-4">
                    <textarea id="editor" name="event_details"></textarea>
                        <!-- <textarea class="ckeditor form-control" name="event_details" required>Event Details</textarea> -->
                        <!-- <div class="cut"></div> -->
                        <!-- <label for="event_details" class="">Event Details</label> -->
                    </div>
                </div>
                @if(isset($event))
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                    <a href="{{ route('events.index') }}" class="btn btn-danger">Cancel</a>
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
                            <th>Event Details</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($events as $key=>$event)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <!-- <td>{{ $event->year }}</td> -->
                                <td><a href="" target="_blank">{{ $event->title }}</a></td>
                                <td>{!! $event->event_details !!}</td>
                                <td>
                                    @if($event->picture)
                                        <img src="{{ asset('uploads/event/' . $event->picture) }}" alt="{{ $event->title }} Image" width="100">
                                    @else
                                        No Image Available
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('events.edit', $event->id) }}" class="btn text-primary"><i class="fas fa-edit fa-sm"></i></a>
                                    <form action="{{ route('events.destroy', $event->id) }}" method="POST" style="display: inline;">
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
<!-- <script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script> -->
<!-- Include CKEditor 4 -->
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>

<!-- Include CKFinder -->
<script src="https://cdn.ckeditor.com/ckfinder/3.6.2/ckfinder.js"></script>


<!-- <script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
</script> -->
<script>
    CKEDITOR.replace('editor', {
        filebrowserBrowseUrl: '/ckfinder/ckfinder.html',
        filebrowserImageBrowseUrl: '/ckfinder/ckfinder.html?type=Images',
        filebrowserUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
        filebrowserImageUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'
    });
</script>


@endsection