@extends('backend.layouts.master')
@section('content')
<div class="container">
    <!-- Button to toggle form visibility -->
    @if(!isset($department))
        <button class="float-right btn btn-sm btn-primary" id="toggleForm" data-original-text="Add New Department">Add New Department</button>
    @endif
    <div class="row bg-aliceblue" id="FormContainer" style="display: {{ isset($department) ? 'block' : 'none' }};">
        <div class="custom-form col-md-10 mx-auto pt-5 mb-5 pb-5">
            @if(isset($department))
            <h6>Edit This Department</h6>
            <form method="POST" action="{{ route('department.update', $department->id) }}" enctype="multipart/form-data">
                @method('PATCH')
                @else
                <h6>Add New Department</h6>
            <form method="POST" action="{{ route('department.store') }}" enctype="multipart/form-data">
                @endif
                @csrf
                <div class="row mt-5">
                    <div class="input-container col-sm-12 mb-4">
                        <select class="input bg-white" id="faculty_id" name="faculty_id" required placeholder=" ">
                            <option value="">Select a Faculty</option>
                            @foreach ($faculties as $faculty)
                                <option value="{{ $faculty->id }}" {{ isset($department) && $department->faculty_id == $faculty->id ? 'selected' : '' }}>{{ $faculty->full_name }}</option>
                            @endforeach
                        </select>
                        <div class="cut"></div>
                        <label for="faculty_id" class="placeholder">Faculty Name</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-container col-md-8 mb-4">
                        <input type="text" class="input" id="full_name" name="full_name" value="{{ old('full_name', isset($department) ? $department->full_name : '') }}" required placeholder=" "/>
                        <div class="cut"></div>
                        <label for="full_name" class="placeholder">Department Name</label>
                    </div>
                    <div class="input-container col-md-4 mb-4">
                        <input type="text" class="input" id="short_name" name="short_name" value="{{ old('short_name', isset($department) ? $department->short_name : '') }}" required placeholder=" "/>
                        <div class="cut"></div>
                        <label for="short_name" class="placeholder">Department Short Name</label>
                    </div>
                </div>
                @if(isset($department))
                    <button type="submit" class="btn btn-sm btn-primary">Save Changes</button>
                    <a href="{{ route('department.index') }}" class="btn btn-sm btn-secondary">Cancel</a>
                @else
                    <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                @endif
            </form>
        </div>
    </div>

    <div class="row d-block">
        <div class="mx-auto pt-5 pb-5">
            <h5 class="text-center mb-5">Department</h5>
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Department Name</th>
                            <th>Department Short Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($departments as $key=>$department)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$department->full_name}}</td>
                                <td>{{$department->short_name}}</td>
                                <td>
                                    <a href="{{ route('department.edit', $department->id) }}" class="btn btn-sm text-primary"><i class="fas fa-edit fa-sm"></i></a>
                                    <form action="{{ route('department.destroy', $department->id) }}" method="POST" style="display: inline;">
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