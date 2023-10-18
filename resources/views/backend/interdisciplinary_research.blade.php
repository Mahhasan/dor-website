@extends('backend.layouts.master')
@section('content')
<div class="container">
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
                        <label for="link" class="placeholder">Link </label>
                    </div>
                    <div class="input-container col-sm-6 mb-4">
                        <input type="file" class="input border-0 pt-2" id="picture[]" name="picture[]" accept="image/*" multiple placeholder=" ">
                        @if(isset($interdisciplinaryResearch) && $interdisciplinaryResearch->picture)
                            <div class="row existing-pictures float-right mt-3 ml-1 mr-1">
                                @foreach(json_decode($interdisciplinaryResearch->picture, true) as $picture)
                                    <div class="existing-picture mr-2 mb-2">
                                        <input type="checkbox" name="deleted_pictures[]" value="{{ $picture }}">
                                        <img src="{{ asset('uploads/interdisciplinary_research/' . $picture) }}" alt="Image" height="75px" width="100">
                                    </div>
                                @endforeach
                            </div>
                        @endif
                        <div class="cut"></div>
                        <label for="picture" class="placeholder">Lab Image <small class="font-italic">(size: 416 x 250 px)</small></label>
                    </div>
                </div>
                @if(isset($interdisciplinaryResearch))
                    <button type="submit" class="btn btn-sm btn-primary">Save Changes</button>
                    <a href="{{ route('interdisciplinary-research.index') }}" class="btn btn-sm btn-secondary">Cancel</a>
                @else
                    <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                @endif
            </form>
        </div>
    </div>

    <div class="row">
        <div class="mx-auto pt-5 pb-5">
            <h5 class="text-center mt-5 mb-5">Interdisciplinary Research Records</h5>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>discipline</th>
                            <th>lab_name</th>
                            <th>link</th>
                            <th>Images</th>
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
                                        @foreach(json_decode($interdisciplinaryResearch->picture, true) as $picture)
                                            <img src="{{ asset('uploads/interdisciplinary_research/' . $picture) }}" alt="{{ $interdisciplinaryResearch->name }} Image" class="pb-1" width="100">
                                        @endforeach
                                    @else
                                        No Images Available
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
