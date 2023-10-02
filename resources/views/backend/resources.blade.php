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
            <h5>Resources</h5>
            @if(isset($resource))
            <h6>Edit Record</h6>
            <form method="POST" action="{{ route('resources.update', $resource->id) }}" enctype="multipart/form-data">
                @method('PATCH')
            @else
            <h6>Create New Record</h6>
            <form method="POST" action="{{ route('resources.store') }}" enctype="multipart/form-data">
            @endif
                @csrf
                <div class="row mt-5">
                    <div class="input-container mb-4">
                        <input type="text" class="input" id="topic" name="topic" value="{{ old('topic', isset($resource) ? $resource->topic : '') }}" required placeholder=" "/>
                        <div class="cut"></div>
                        <label for="topic" class="placeholder">Topic</label>
                    </div>
                    <div class="input-container mb-4">
                        <input type="file" class="form-control border-0" id="document" name="document" {{ isset($resource) ? '' : 'required' }}>
                        @if(isset($resource) && $resource->document)
                            <a href="{{ asset('uploads/resource/' . $resource->document) }}" target="_blank">{{ $resource->document }}</a>
                        @endif                
                    </div>
                </div>
                @if(isset($resource))
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                    <a href="{{ route('resources.index') }}" class="btn btn-danger">Cancel</a>
                @else
                    <button type="submit" class="btn btn-primary">Submit</button>
                @endif
            </form>
        </div>
    </div>

    <div class="row">
        <div class="mx-auto pt-5 pb-5">
            <h5 class="text-center mb-5">Resource Records</h5>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Topic</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if(isset($resources))
                        @foreach($resources as $key=>$resource)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $resource->topic }}</td>
                                <td>
                                    <a href="{{ asset('uploads/resource/' . $resource->document) }}" target="_blank" title="View Document"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    <a href="{{ route('resources.edit', $resource->id) }}" class="btn text-primary" title="Edit {{$resource->topic}}'s information"><i class="fas fa-edit fa-sm"></i></a>
                                    <form action="{{ route('resources.destroy', $resource->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn text-danger" onclick="return confirm('Are you sure you want to delete this record?')" title="Delete {{$resource->topic}}'s information"><i class="fa fa-trash fa-sm" aria-hidden="true"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection