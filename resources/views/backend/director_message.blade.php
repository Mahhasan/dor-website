@extends('backend.layouts.master')
@section('content')
<div class="container">
    <div class="row bg-aliceblue">
        <div class="custom-form col-md-10 mx-auto pt-5 pb-5">
            <h5>Message from the Director</h5>

            @if(isset($directorMessage))
            <h6>Edit Record</h6>
            <form method="POST" action="{{ route('director-message.update', $directorMessage->id) }}" enctype="multipart/form-data">
                @method('PATCH')
                @else
                <h6>Create New Record</h6>
            <form method="POST" action="{{ route('director-message.store') }}" enctype="multipart/form-data">
                @endif
                @csrf
                <div class="row mt-5">
                    <div class="input-container col-sm-6 mb-4">
                        <input type="text" class="input" id="title" name="title" value="{{ old('title', isset($directorMessage) ? $directorMessage->title : '') }}" required placeholder=" "/>
                        <div class="cut"></div>
                        <label for="title" class="placeholder">Title</label>
                    </div>
                    <div class="input-container col-sm-6 mb-4">
                        <input type="file" class="input border-0 pt-2" id="picture" name="picture" accept="image/*" {{ isset($directorMessage) ? '' : 'required' }} placeholder=" ">
                        @if(isset($directorMessage) && $directorMessage->picture)
                            <div class="mr-2 mt-3 float-right">
                                <img src="{{ asset('uploads/director_message/' . $directorMessage->picture) }}" alt="Image" height="auto" width="200">
                            </div>
                        @endif   
                        <div class="cut"></div>
                        <label for="picture" class="placeholder">Image <small class="font-italic">(size: 150 x 150 px)</small></label>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-12 mt-2 mb-4">
                        <textarea class="input" id="file-picker" name="message" value="{{ old('message', isset($directorMessage) ? $directorMessage->message : '') }}" placeholder=" ">{{ old('message', isset($directorMessage) ? $directorMessage->message : '') }}</textarea>
                        <div class="cut"></div>
                        <label for="message" class="placeholder">Message</label>
                    </div>
                </div>
                @if(isset($directorMessage))
                    <button type="submit" class="btn btn-sm btn-primary">Save Changes</button>
                    <a href="{{ route('director-message.index') }}" class="btn btn-sm btn-secondary">Cancel</a>
                @else
                    <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                @endif
            </form>
        </div>
    </div>

    <div class="row pt-5">
        @foreach($directorMessages as $key=>$directorMessage)
            <div class="mx-auto mt-5 mb-5">
                <div class="mb-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="text-center flex-grow-1">{{ $directorMessage->title }}</h5>
                        <div>
                            <a href="{{ route('director-message.edit', $directorMessage->id) }}" class="btn text-primary" title="Edit this message"><i class="fas fa-edit fa-sm"></i></a>
                            <form action="{{ route('director-message.destroy', $directorMessage->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn text-danger" onclick="return confirm('Are you sure you want to delete this record?')" title="Delete this message"><i class="fa fa-trash fa-sm" aria-hidden="true"></i></button>
                            </form>
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="text-center">
                    @if($directorMessage->picture)
                        <img src="{{ asset('uploads/director_message/' . $directorMessage->picture) }}" alt="{{ $directorMessage->title }} Image" width="100">
                    @else
                        <img src="{{ asset('path_to_default_image.jpg') }}" class="card-img-top" alt="No Image Available">
                    @endif
                </div>
                <div class="mt-4">
                    <p>{!! $directorMessage->message !!}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection