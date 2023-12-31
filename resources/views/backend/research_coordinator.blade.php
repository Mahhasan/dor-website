@extends('backend.layouts.master')
@section('content')
<div class="container">
    <!-- Button to toggle form visibility -->
    @if(!isset($researchCoordinator))
        <button class="float-right btn btn-sm btn-primary" id="toggleForm" data-original-text="Add Research Coordinator">Add Research Coordinator</button>
    @endif
    <div class="row bg-aliceblue" id="FormContainer" style="display: {{ isset($researchCoordinator) ? 'block' : 'none' }};">
        <div class="custom-form col-md-10 mx-auto pt-5 mb-5 pb-5">
            @if(isset($researchCoordinator))
            <h6>Edit <span class="text-success font-weight-bold">{{ $researchCoordinator->name }}'s</span> Record</h6>
            <form method="POST" action="{{ route('research.coordinator.update', $researchCoordinator->id) }}" enctype="multipart/form-data">
                @method('PATCH')
                @else
                <h6>Add Research Coordinator</h6>
            <form method="POST" action="{{ route('research.coordinator.store') }}" enctype="multipart/form-data">
                @endif
                @csrf
                <div class="row mt-5">
                    <div class="input-container col-sm-6 mb-4">
                        <input type="text" class="input" id="name" name="name" value="{{ old('name', isset($researchCoordinator) ? $researchCoordinator->name : '') }}" required placeholder=" "/>
                        <div class="cut"></div>
                        <label for="name" class="placeholder">Name <span class="text-danger">*</span></label>
                    </div>
                    <div class="input-container col-sm-6 mb-4">
                        <input type="text" class="input" id="designation" name="designation" value="{{ old('designation', isset($researchCoordinator) ? $researchCoordinator->designation : '') }}" required placeholder=" "/>
                        <div class="cut"></div>
                        <label for="designation" class="placeholder">Designation <span class="text-danger">*</span></label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-container col-sm-6 mb-4">
                        <input type="email" class="input" id="email" name="email" value="{{ old('email', isset($researchCoordinator) ? $researchCoordinator->email : '') }}" required placeholder=" "/>
                        <div class="cut"></div>
                        <label for="email" class="placeholder">Email <span class="text-danger">*</span></label>
                    </div>
                    <div class="input-container col-sm-6 mb-4">
                        <input type="number" class="input" id="cell" name="cell" value="{{ old('cell', isset($researchCoordinator) ? $researchCoordinator->cell : '') }}" placeholder=" "/>
                        <div class="cut"></div>
                        <label for="cell" class="placeholder">Cell</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-container col-sm-6 mb-4">
                        <select id="faculty_id" class="input bg-white"name="faculty_id" required placeholder=" ">
                            <option value="">Select a Faculty</option>
                            @foreach ($faculties as $faculty)
                                <option value="{{ $faculty->id }}" {{ isset($researchCoordinator) && $researchCoordinator->faculty_id == $faculty->id ? 'selected' : '' }}>{{ $faculty->full_name }}</option>
                            @endforeach
                        </select>
                        <div class="cut"></div>
                        <label for="faculty_id" class="placeholder">Faculty Name <span class="text-danger">*</span></label>
                    </div>
                    <div class="input-container col-sm-6 mb-4">
                        <select id="department_id" class="input bg-white"  name="department_id" required placeholder=" ">
                            <option selected disabled>Select a Department</option>
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}" {{ isset($researchCoordinator) && $researchCoordinator->department_id == $department->id ? 'selected' : '' }}>{{ $department->full_name }}</option>
                            @endforeach
                        </select>
                        <div class="cut"></div>
                        <label for="department_id" class="placeholder">Department Name <span class="text-danger">*</span></label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-container col-12 mb-4">
                        <input type="file" class="input border-0 pt-2" id="picture" name="picture" accept="image/*" {{ isset($researchCoordinator) && $researchCoordinator->picture ? '' : 'required' }}>
                        @if(isset($researchCoordinator) && $researchCoordinator->picture)
                        <div class="mr-2 mt-3 float-right">
                            <img src="{{ asset('uploads/research_coordinator/' . $researchCoordinator->picture) }}" alt="Image" height="150" width="150">
                        </div>
                        @endif   
                        <div class="cut"></div>
                        <label for="picture" class="placeholder">Image<small class="font-italic"> (size: 150 x 150 px)</small> <span class="text-danger">*</span></label>
                    </div>
                </div>
                @if(isset($researchCoordinator))
                    <button type="submit" class="btn btn-sm btn-primary">Save Changes</button>
                    <a href="{{ route('research.coordinator.index') }}" class="btn btn-sm btn-secondary">Cancel</a>
                @else
                    <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                @endif
            </form>
        </div>
    </div>

    <div class="mx-auto mb-5">
        <h5 class="text-center pt-5">Research Coordinator Records</h5>
        <hr>
    </div>

    <div class="row">
        @foreach($researchCoordinators as $key=>$researchCoordinator)
            <div class="col-md-4 mb-4">
                <div class="card border-0">
                    @if($researchCoordinator->picture)
                        <div class="text-center mt-3">
                            <img src="{{ asset('uploads/research_coordinator/' . $researchCoordinator->picture) }}" class="rounded-circle" alt="{{ $researchCoordinator->name }} Image" height="150" width="150">
                        </div>
                    @else
                        No Image Available
                    @endif
                    <div class="text-center p-1">
                        <h5>{{ $researchCoordinator->name }}</h5>
                        <p>{{ $researchCoordinator->designation }}, {{ $researchCoordinator->departments->short_name ?? ''}}</p>
                        <p>{{ $researchCoordinator->faculties->short_name ?? ''}}</p>
                        <p>{{ $researchCoordinator->email }}</p>
                        <p>{{ $researchCoordinator->cell }}</p>
                        <div class="float-right">
                            <a href="{{ route('research.coordinator.edit', $researchCoordinator->id) }}" class="btn btn-sm text-primary"><i class="fas fa-edit fa-sm"></i></a>
                            <form action="{{ route('research.coordinator.destroy', $researchCoordinator->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm text-danger" onclick="return confirm('Are you sure you want to delete this record?')"><i class="fa fa-trash fa-sm" aria-hidden="true"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection