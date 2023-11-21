@extends('backend.layouts.master')
@section('content')
<div class="container">
    <!-- Button to toggle form visibility -->
    @if(!isset($resource))
        <button class="float-right btn btn-sm btn-primary" id="toggleForm" data-original-text="Add New Resource">Add New Resource</button>
    @endif
    <div class="row bg-aliceblue" id="FormContainer" style="display: {{ isset($resource) ? 'block' : 'none' }};">
        <div class="custom-form col-md-10 mx-auto pt-5 mb-5 pb-5">
            @if(isset($resource))
            <h6>Edit <span class="text-success font-weight-bold">{{ $resource->topic }}'s</span> Record</h6>
            <form method="POST" action="{{ route('resources.update', $resource->id) }}" enctype="multipart/form-data">
                @method('PATCH')
            @else
            <h6>Add New Resource</h6>
            <form method="POST" action="{{ route('resources.store') }}" enctype="multipart/form-data">
            @endif
                @csrf
                <div class="row mt-5">
                    <div class="input-container mb-4">
                        <input type="text" class="input" id="topic" name="topic" value="{{ old('topic', isset($resource) ? $resource->topic : '') }}" required placeholder=" "/>
                        <div class="cut"></div>
                        <label for="topic" class="placeholder">Topic <span class="text-danger">*</span></label>
                    </div>
                    <div class="input-container mb-4">
                        <input type="file" class="input border-0 pt-2" id="document" name="document" {{ isset($resource) ? '' : 'required' }} accept="application/pdf">
                        @if(isset($resource) && $resource->document)
                            <div class=" mt-3 float-right">
                                @if (pathinfo($resource->document, PATHINFO_EXTENSION) == 'pdf')
                                    <a href="{{ asset('uploads/resource/' . $resource->document) }}" target="_blank"><iframe src="{{ asset('uploads/resource/' . $resource->document) }}" style="width: 100%; height: auto;"></iframe></a>
                                @else
                                    <a href="{{ asset('uploads/resource/' . $resource->document) }}" target="_blank"><img src="{{ asset('uploads/resource/' . $resource->document) }}" alt="{{ $resource->topic }}" width="100"></a>
                                @endif
                                <!-- <a href="{{ asset('uploads/resource/' . $resource->document) }}" target="_blank">{{ $resource->document }}</a> -->
                            </div>
                        @endif    
                        <div class="cut"></div>
                        <label for="document" class="placeholder">Rrsource File <small class="font-italic">(Image or pdf)</small> <span class="text-danger">*</span></label>            
                    </div>
                </div>
                @if(isset($resource))
                    <button type="submit" class="btn btn-sm btn-primary">Save Changes</button>
                    <a href="{{ route('resources.index') }}" class="btn btn-sm btn-secondary">Cancel</a>
                @else
                    <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                @endif
            </form>
        </div>
    </div>

    <div class="row d-block">
        <div class="mx-auto pt-5 pb-5">
            <h5 class="text-center mb-5">Resource Records</h5>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Topic</th>
                            <th>Resource File</th>
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
                                        @if (pathinfo($resource->document, PATHINFO_EXTENSION) == 'pdf')
                                            <iframe src="{{ asset('uploads/resource/' . $resource->document) }}" style="width: 100%; height: auto;"></iframe>
                                        @else
                                            <img src="{{ asset('uploads/resource/' . $resource->document) }}" alt="{{ $resource->topic }}" width="100">
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ asset('uploads/resource/' . $resource->document) }}" class="btn-sm" target="_blank" title="View Document"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                        <a href="{{ route('resources.edit', $resource->id) }}" class="btn btn-sm text-primary" title="Edit {{$resource->topic}}'s information"><i class="fas fa-edit fa-sm"></i></a>
                                        <form action="{{ route('resources.destroy', $resource->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm text-danger" onclick="return confirm('Are you sure you want to delete this record?')" title="Delete {{$resource->topic}}'s information"><i class="fa fa-trash fa-sm" aria-hidden="true"></i></button>
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