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
            <h5>Research Coordinator</h5>
            @if(isset($researchCoordinator))
            <h6>Edit Record</h6>
            <form method="POST" action="{{ route('research-coordinator.update', $researchCoordinator->id) }}" enctype="multipart/form-data">
                @method('PATCH')
                @else
                <h6>Create New Record</h6>
            <form method="POST" action="{{ route('research-coordinator.store') }}" enctype="multipart/form-data">
                @endif
                @csrf
                <div class="row mt-5">
                    <div class="input-container col-sm-6 mb-4">
                        <input type="text" class="input" id="name" name="name" value="{{ old('name', isset($researchCoordinator) ? $researchCoordinator->name : '') }}" required placeholder=" "/>
                        <div class="cut"></div>
                        <label for="name" class="placeholder">Name</label>
                    </div>
                    <div class="input-container col-sm-6 mb-4">
                        <input type="text" class="input" id="designation" name="designation" value="{{ old('designation', isset($researchCoordinator) ? $researchCoordinator->designation : '') }}" required placeholder=" "/>
                        <div class="cut"></div>
                        <label for="designation" class="placeholder">Designation</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-container col-sm-6 mb-4">
                        <input type="email" class="input" id="email" name="email" value="{{ old('email', isset($researchCoordinator) ? $researchCoordinator->email : '') }}" required placeholder=" "/>
                        <div class="cut"></div>
                        <label for="email" class="placeholder">Email</label>
                    </div>
                    <div class="input-container col-sm-6 mb-4">
                        <input type="text" class="input" id="cell" name="cell" value="{{ old('cell', isset($researchCoordinator) ? $researchCoordinator->cell : '') }}" placeholder=" "/>
                        <div class="cut"></div>
                        <label for="cell" class="placeholder">Cell</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-container col-sm-6 mb-4">
                        <input type="department" class="input" id="department" name="department" value="{{ old('department', isset($researchCoordinator) ? $researchCoordinator->department : '') }}" required placeholder=" "/>
                        <div class="cut"></div>
                        <label for="department" class="placeholder">Department</label>
                    </div>
                    <div class="input-container col-sm-6 mb-4">
                        <input type="text" class="input" id="faculty" name="faculty" value="{{ old('faculty', isset($researchCoordinator) ? $researchCoordinator->faculty : '') }}" required placeholder=" "/>
                        <div class="cut"></div>
                        <label for="faculty" class="placeholder">Faculty</label>
                    </div>
                </div>
                <div class="row">
                <div class="input-container col-12 mb-4">
                    <input type="file" class="form-control border-0" id="picture" name="picture" accept="image/*" {{ isset($researchCoordinator) && $researchCoordinator->picture ? '' : 'required' }}>
                    @if(isset($researchCoordinator) && $researchCoordinator->picture)
                        <a href="{{ asset('uploads/research_coordinator/' . $researchCoordinator->picture) }}" target="_blank" class="float-right">Click to see existing picture</a>
                    @endif
                </div>
                </div>
                @if(isset($researchCoordinator))
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                    <a href="{{ route('research-coordinator.index') }}" class="btn btn-danger">Cancel</a>
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
                            <th>Name</th>
                            <th>Designation</th>
                            <th>Email</th>
                            <th>Cell</th>
                            <th>Department</th>
                            <th>Faculty</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($researchCoordinators as $key=>$researchCoordinator)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $researchCoordinator->name }}</td>
                                <td>{{ $researchCoordinator->designation }}</td>
                                <td>{{ $researchCoordinator->email }}</td>
                                <td>{{ $researchCoordinator->cell }}</td>
                                <td>{{ $researchCoordinator->department }}</td>
                                <td>{{ $researchCoordinator->faculty }}</td>
                                <td>
                                    @if($researchCoordinator->picture)
                                        <img src="{{ asset('uploads/research_coordinator/' . $researchCoordinator->picture) }}" alt="{{ $researchCoordinator->name }} Image" width="100">
                                    @else
                                        No Image Available
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('research-coordinator.edit', $researchCoordinator->id) }}" class="btn text-primary"><i class="fas fa-edit fa-sm"></i></a>
                                    <form action="{{ route('research-coordinator.destroy', $researchCoordinator->id) }}" method="POST" style="display: inline;">
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
@endsection