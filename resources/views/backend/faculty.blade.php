@extends('backend.layouts.master')
@section('content')
<div class="container">
    <!-- Button to toggle form visibility -->
    @if(!isset($faculty))
        <button class="float-right btn btn-sm btn-primary" id="toggleForm" data-original-text="Add New Faculty">Add New Faculty</button>
    @endif
    <div class="row bg-aliceblue" id="FormContainer" style="display: {{ isset($faculty) ? 'block' : 'none' }};">
        <div class="custom-form col-md-10 mx-auto pt-5 mb-5 pb-5">
            @if(isset($faculty))
            <h6>Edit This Faculty</h6>
            <form method="POST" action="{{ route('faculty.update', $faculty->id) }}" enctype="multipart/form-data">
                @method('PATCH')
                @else
                <h6>Add New Faculty</h6>
            <form method="POST" action="{{ route('faculty.store') }}" enctype="multipart/form-data">
                @endif
                @csrf
                <div class="row mt-5">
                    <div class="input-container col-md-8 mb-4">
                        <input type="text" class="input" id="full_name" name="full_name" value="{{ old('full_name', isset($faculty) ? $faculty->full_name : '') }}" required placeholder=" "/>
                        <div class="cut"></div>
                        <label for="full_name" class="placeholder">Faculty Name</label>
                    </div>
                    <div class="input-container col-md-4 mb-4">
                        <input type="text" class="input" id="short_name" name="short_name" value="{{ old('short_name', isset($faculty) ? $faculty->short_name : '') }}" required placeholder=" "/>
                        <div class="cut"></div>
                        <label for="short_name" class="placeholder">Faculty Short Name</label>
                    </div>
                </div>
                @if(isset($faculty))
                    <button type="submit" class="btn btn-sm btn-primary">Save Changes</button>
                    <a href="{{ route('faculty.index') }}" class="btn btn-sm btn-secondary">Cancel</a>
                @else
                    <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                @endif
            </form>
        </div>
    </div>

    <div class="row d-block">
        <div class="mx-auto pt-5 pb-5">
            <h5 class="text-center mb-5">Faculty of DIU</h5>
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Faculty Name</th>
                            <th>Faculty Short Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($faculties as $key=>$faculty)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$faculty->full_name}}</td>
                                <td>{{$faculty->short_name}}</td>
                                <td>
                                    <a href="{{ route('faculty.edit', $faculty->id) }}" class="btn btn-sm text-primary"><i class="fas fa-edit fa-sm"></i></a>
                                    <form action="{{ route('faculty.destroy', $faculty->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm text-danger" onclick="return confirm('Are you sure you want to delete this record?')"><i class="fa fa-trash fa-sm" aria-hidden="true"></i></button>
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
@endsection