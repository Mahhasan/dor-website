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
            <h5>Our Team</h5>
            @if(isset($ourTeam))
            <h6>Edit Record</h6>
            <form method="POST" action="{{ route('our-team.update', $ourTeam->id) }}" enctype="multipart/form-data">
                @method('PATCH')
                @else
                <h6>Create New Record</h6>
            <form method="POST" action="{{ route('our-team.store') }}" enctype="multipart/form-data">
                @endif
                @csrf
                <div class="row mt-5">
                    <div class="input-container col-sm-6 mb-4">
                        <input type="text" class="input" id="name" name="name" value="{{ old('name', isset($ourTeam) ? $ourTeam->name : '') }}" required placeholder=" "/>
                        <div class="cut"></div>
                        <label for="name" class="placeholder">Name</label>
                    </div>
                    <div class="input-container col-sm-6 mb-4">
                        <input type="text" class="input" id="designation" name="designation" value="{{ old('designation', isset($ourTeam) ? $ourTeam->designation : '') }}" required placeholder=" "/>
                        <div class="cut"></div>
                        <label for="designation" class="placeholder">Designation</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-container col-sm-6 mb-4">
                        <input type="email" class="input" id="email" name="email" value="{{ old('email', isset($ourTeam) ? $ourTeam->email : '') }}" placeholder=" "/>
                        <div class="cut"></div>
                        <label for="email" class="placeholder">Email</label>
                    </div>
                    <div class="input-container col-sm-6 mb-4">
                        <input type="text" class="input" id="cell" name="cell" value="{{ old('cell', isset($ourTeam) ? $ourTeam->cell : '') }}" placeholder=" "/>
                        <div class="cut"></div>
                        <label for="cell" class="placeholder">Cell</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-container col-sm-6 mb-4">
                        <input type="text" class="input" id="department" name="department" value="{{ old('department', isset($ourTeam) ? $ourTeam->department : '') }}" placeholder=" "/>
                        <div class="cut"></div>
                        <label for="department" class="placeholder">Department</label>
                    </div>
                    <div class="input-container col-sm-6 mb-4">
                        <input type="text" class="input" id="faculty" name="faculty" value="{{ old('faculty', isset($ourTeam) ? $ourTeam->faculty : '') }}" placeholder=" "/>
                        <div class="cut"></div>
                        <label for="faculty" class="placeholder">Faculty</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-container col-sm-6 mb-4">
                        <select class="input" id="level" name="level" required placeholder=" ">
                            <option value=""></option>
                            <option value="1" {{ (isset($ourTeam) && $ourTeam->level == 1) ? 'selected' : '' }}>1 (Dean/Head)</option>
                            <option value="2" {{ (isset($ourTeam) && $ourTeam->level == 2) ? 'selected' : '' }}>2 (Director)</option>
                            <option value="3" {{ (isset($ourTeam) && $ourTeam->level == 3) ? 'selected' : '' }}>3 (Additional Director)</option>
                            <option value="4" {{ (isset($ourTeam) && $ourTeam->level == 4) ? 'selected' : '' }}>4 (Joint Director)</option>
                            <option value="5" {{ (isset($ourTeam) && $ourTeam->level == 5) ? 'selected' : '' }}>5 (Deputy Director)</option>
                            <option value="6" {{ (isset($ourTeam) && $ourTeam->level == 6) ? 'selected' : '' }}>6 (Senior Asst. Director)</option>
                            <option value="7" {{ (isset($ourTeam) && $ourTeam->level == 7) ? 'selected' : '' }}>7 (Assistant Director)</option>
                            <option value="8" {{ (isset($ourTeam) && $ourTeam->level == 8) ? 'selected' : '' }}>8 (Officer/Others)</option>
                        </select>
                        <div class="cut"></div>
                        <label for="level" class="placeholder">Level</label>
                    </div>
                    <div class="input-container col-sm-6 mb-4">
                        <input type="file" class="form-control border-0" id="picture" name="picture" accept="image/*" {{ isset($ourTeam) && $ourTeam->picture ? '' : 'required' }}>
                        @if(isset($ourTeam) && $ourTeam->picture)
                            <div class="mr-2 mt-3 float-right">
                                <img src="{{ asset('uploads/our_team/' . $ourTeam->picture) }}" alt="Image" height="auto" width="200">
                            </div>
                        @endif
                    </div>
                </div>
                @if(isset($ourTeam))
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                    <a href="{{ route('our-team.index') }}" class="btn btn-danger">Cancel</a>
                @else
                    <button type="submit" class="btn btn-primary">Submit</button>
                @endif
            </form>
        </div>
    </div>

    <div class="row">
        <div class="mx-auto pt-5 pb-5">
            <h5 class="text-center mb-5">Our Team</h5>
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
                        @foreach($ourTeams as $key=>$ourTeam)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $ourTeam->name }}</td>
                                <td>{{ $ourTeam->designation }}</td>
                                <td>{{ $ourTeam->email }}</td>
                                <td>{{ $ourTeam->cell }}</td>
                                <td>{{ $ourTeam->department }}</td>
                                <td>{{ $ourTeam->faculty }}</td>
                                <td>
                                    @if($ourTeam->picture)
                                        <img src="{{ asset('uploads/our_team/' . $ourTeam->picture) }}" alt="{{ $ourTeam->name }} Image" width="100">
                                    @else
                                        No Image Available
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('our-team.edit', $ourTeam->id) }}" class="btn text-primary"><i class="fas fa-edit fa-sm"></i></a>
                                    <form action="{{ route('our-team.destroy', $ourTeam->id) }}" method="POST" style="display: inline;">
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