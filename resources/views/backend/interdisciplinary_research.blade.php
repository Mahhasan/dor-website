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
            <h5>Interdisciplinary Research</h5>
            @if(isset($interdisciplinaryResearch))
            <h6>Edit Record</h6>
            <form method="POST" action="{{ route('interdisciplinary-research.update', $interdisciplinaryResearch->id) }}" enctype="multipart/form-data">
                @method('PATCH')
                @else
                <h6>Create New Discipline</h6>
            <form method="POST" action="{{ route('interdisciplinary-research.store') }}" enctype="multipart/form-data">
                @endif
                @csrf
                <div class="row mt-5">
                    <div class="input-container col-sm-6 mb-4">
                        <input type="text" class="input" id="discipline" name="discipline" value="{{ old('discipline', isset($interdisciplinaryResearch) ? $interdisciplinaryResearch->discipline : '') }}" required placeholder=" "/>
                        <div class="cut"></div>
                        <label for="discipline" class="placeholder">Discipline</label>
                    </div>
                    <div class="input-container col-sm-6 mb-4">
                        <input type="text" class="input" id="lab_name" name="lab_name" value="{{ old('lab_name', isset($interdisciplinaryResearch) ? $interdisciplinaryResearch->lab_name : '') }}" required placeholder=" "/>
                        <div class="cut"></div>
                        <label for="lab_name" class="placeholder">Lab Name</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-container col-sm-6 mb-4">
                        <input type="url" class="input" id="link" name="link" value="{{ old('link', isset($interdisciplinaryResearch) ? $interdisciplinaryResearch->link : '') }}" placeholder=" "/>
                        <div class="cut"></div>
                        <label for="link" class="placeholder">Link</label>
                    </div>
                    <div class="input-container col-sm-6 mb-4">
                        <input type="file" class="form-control border-0" id="picture" name="picture" accept="image/*">
                        @if(isset($interdisciplinaryResearch) && $interdisciplinaryResearch->picture)
                            <a href="{{ asset('uploads/interdisciplinary_research/' . $interdisciplinaryResearch->picture) }}" target="_blank" class="float-right">Click to see existing picture</a>
                        @endif   
                    </div>
                </div>
                @if(isset($interdisciplinaryResearch))
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                    <a href="{{ route('interdisciplinary-research.index') }}" class="btn btn-danger">Cancel</a>
                @else
                    <button type="submit" class="btn btn-primary">Submit</button>
                @endif
            </form>
        </div>
    </div>

    <div class="row">
        <div class="mx-auto pt-5 pb-5">
            <h5 class="text-center mb-5">Interdisciplinary Research Records</h5>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>discipline</th>
                            <th>lab_name</th>
                            <th>link</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($interdisciplinaryResearches as $key=>$interdisciplinaryResearch)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $interdisciplinaryResearch->discipline }}</td>
                                <td>{{ $interdisciplinaryResearch->lab_name }}</td>
                                <td>{{ $interdisciplinaryResearch->link }}</td>
                                <td>
                                    @if($interdisciplinaryResearch->picture)
                                        <img src="{{ asset('uploads/interdisciplinary_research/' . $interdisciplinaryResearch->picture) }}" alt="{{ $interdisciplinaryResearch->name }} Image" width="100">
                                    @else
                                        No Image Available
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('interdisciplinary-research.edit', $interdisciplinaryResearch->id) }}" class="btn text-primary"><i class="fas fa-edit fa-sm"></i></a>
                                    <form action="{{ route('interdisciplinary-research.destroy', $interdisciplinaryResearch->id) }}" method="POST" style="display: inline;">
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