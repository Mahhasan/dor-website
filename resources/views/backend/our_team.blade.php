@extends('backend.layouts.master')
@section('content')
<div class="container">
    <!-- Button to toggle form visibility -->
    @if(!isset($ourTeam))
        <button class="float-right btn btn-sm btn-primary" id="toggleForm" data-original-text="Add New Member">Add New Member</button>
    @endif
    <div class="row bg-aliceblue" id="FormContainer" style="display: {{ isset($ourTeam) ? 'block' : 'none' }};">
        <div class="custom-form col-md-10 mx-auto pt-5 mb-5 pb-5">
            @if(isset($ourTeam))
            <h6>Edit <span class="text-success font-weight-bold">{{$ourTeam->name}}'s</span> Record</h6>
            <form method="POST" action="{{ route('our.team.update', $ourTeam->id) }}" enctype="multipart/form-data">
                @method('PATCH')
                @else
                <h6>Add New Member</h6>
            <form method="POST" action="{{ route('our.team.store') }}" enctype="multipart/form-data">
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
                        <input type="number" class="input" id="cell" name="cell" value="{{ old('cell', isset($ourTeam) ? $ourTeam->cell : '') }}" placeholder=" "/>
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
                    <div class="input-container col-sm-6 mb-4" placeholder=" ">
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
                        <label for="level" class="placeholder">Priority Level</label>
                    </div>
                    <div class="input-container col-sm-6 mb-4">
                        <input type="file" class="input border-0 pt-2" id="picture" name="picture" accept="image/*" placeholder=" "{{ isset($ourTeam) ? '' : 'required' }}>
                        @if(isset($ourTeam) && $ourTeam->picture)
                            <div class="mt-3 float-right">
                                <img src="{{ asset('uploads/our_team/' . $ourTeam->picture) }}" alt="Image" height="auto" width="200">
                            </div>
                        @endif
                        <div class="cut"></div>
                        <label for="picture" class="placeholder">Image <small class="font-italic">(size: 150 x 150 px)</small></label>
                    </div>
                </div>
                @if(isset($ourTeam))
                    <button type="submit" class="btn btn-sm btn-primary">Save Changes</button>
                    <a href="{{ route('our.team.index') }}" class="btn btn-sm btn-secondary">Cancel</a>
                @else
                    <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                @endif
            </form>
        </div>
    </div>

    <div class="mx-auto mb-5">
        <h5 class="text-center pt-5">Our Team</h5>
        <hr>
    </div>

    <div class="pb-5">
        @for ($level = 1; $level <= 8; $level++)
            @if ($ourTeams->where('level', $level)->count() > 0)
                <div class="row">
                    @foreach($ourTeams->where('level', $level) as $ourTeam)
                        <div class="col-md-6 mb-4 mx-auto">
                            <div class="card border-0">
                                @if($ourTeam->picture)
                                    <div class="text-center mt-3">
                                        <img src="{{ asset('uploads/our_team/' . $ourTeam->picture) }}" class="rounded-circle" alt="{{ $ourTeam->name }} Image" height="150" width="150">
                                    </div>
                                @else
                                    <div class="text-center mt-3">
                                        <img src="{{ asset('frontend/images/path_to_default_image.jpg') }}" class="rounded-circle" alt="No Image Available" height="150" width="150">
                                    </div>
                                @endif
                                <div class="text-center p-1">
                                    <h5>{{ $ourTeam->name }}</h5>
                                    <p>{{ $ourTeam->designation }}, {{ $ourTeam->department }}</p>
                                    <p>{{ $ourTeam->faculty }}</p>
                                    <p>{{ $ourTeam->email }}</p>
                                    <p>{{ $ourTeam->cell }}</p>
                                    <div class="float-right">
                                        <a href="{{ route('our.team.edit', $ourTeam->id) }}" class="btn btn-sm text-primary"><i class="fas fa-edit"></i></a>
                                        <form action="{{ route('our.team.destroy', $ourTeam->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm text-danger" onclick="return confirm('Are you sure you want to delete this record?')"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        @endfor
    </div>
</div>
@endsection