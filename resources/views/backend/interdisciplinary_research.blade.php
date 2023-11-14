@extends('backend.layouts.master')
@section('content')
<div class="container">
    <!-- Button to toggle form visibility -->
    @if(!isset($interdisciplinaryResearch))
        <button class="float-right btn btn-sm btn-primary" id="toggleForm" data-original-text="Add New Research Lab">Add New Research Lab</button>
    @endif
    <div class="row bg-aliceblue" id="FormContainer" style="display: {{ isset($interdisciplinaryResearch) ? 'block' : 'none' }};">
        <div class="custom-form col-md-10 mx-auto pt-5 mb-5 pb-5">
            @if(isset($interdisciplinaryResearch))
                <h6>Edit <span class="text-success font-weight-bold">{{ $interdisciplinaryResearch->lab_name }}</span> Lab Record</h6>
                <form method="POST" action="{{ route('interdisciplinary-research.update', $interdisciplinaryResearch->id) }}" enctype="multipart/form-data">
                    @method('PATCH')
                @else
                    <h6>Add New Research Lab</h6>
                    <form method="POST" action="{{ route('interdisciplinary-research.store') }}" enctype="multipart/form-data">
                @endif
                @csrf
                <div class="row mt-5">
                    <div class="input-container col-sm-6 mb-4">
                        <select class="input bg-white" id="discipline" name="discipline" required placeholder=" ">
                            <option value="">Select a discipline</option>
                            <option value="Interdisciplinary Research" {{ old('discipline', isset($interdisciplinaryResearch) ? $interdisciplinaryResearch->discipline : '') === 'Interdisciplinary Research' ? 'selected' : '' }}>Interdisciplinary Research</option>
                            <option value="Science Discipline" {{ old('discipline', isset($interdisciplinaryResearch) ? $interdisciplinaryResearch->discipline : '') === 'Science Discipline' ? 'selected' : '' }}>Science Discipline</option>
                        </select>
                        <div class="cut"></div>
                        <label for="discipline" class="placeholder">Discipline Name</label>
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
                        <label for="link" class="placeholder">Website Link</label>
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
                            <small class="font-italic">(If you want to remove an image then select it)</small>
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

    <!-- Tabs -->
    <section id="tabs">
        <div class="row d-block">
            <div class="mx-auto pt-5 pb-5">
                <h5 class="text-center mb-5">Interdisciplinary Research Records</h5>
                <nav>
                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-fsit-tab" data-toggle="tab" href="#nav-fsit" role="tab" aria-controls="nav-fsit" aria-selected="true">Interdisciplinary Research</a>
                        <a class="nav-item nav-link" id="nav-fbe-tab" data-toggle="tab" href="#nav-fbe" role="tab" aria-controls="nav-fbe" aria-selected="false">Science Discipline</a>
                    </div>
                </nav>
                <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-fsit" role="tabpanel" aria-labelledby="nav-fsit-tab">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped" id="" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <!-- <th>Discipline</th> -->
                                        <th>Lab Name</th>
                                        <th>Website Link</th>
                                        <th>Images</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($interdiscipline as $key=>$discipline)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <!-- <td>{{ $discipline->discipline }}</td> -->
                                        <td>{{ $discipline->lab_name }}</td>
                                        <td>{{ $discipline->link }}</td>
                                        <td>
                                            @if($discipline->picture)
                                                @foreach(json_decode($discipline->picture, true) as $picture)
                                                    <img src="{{ asset('uploads/interdisciplinary_research/' . $picture) }}" alt="{{ $discipline->name }} Image" class="rounded pb-1" height="125px" width="208px">
                                                @endforeach
                                            @else
                                                No Images Available
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('interdisciplinary-research.edit', $discipline->id) }}" class="btn btn-sm text-primary"><i class="fas fa-edit fa-sm"></i></a>
                                            <form action="{{ route('interdisciplinary-research.destroy', $discipline->id) }}" method="POST" style="display: inline;">
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
                    <div class="tab-pane fade" id="nav-fbe" role="tabpanel" aria-labelledby="nav-fbe-tab">
                        <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped" id="" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <!-- <th>Discipline</th> -->
                                        <th>Lab Name</th>
                                        <th>Website Link</th>
                                        <th>Images</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($sciencediscipline as $key=>$discipline)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <!-- <td>{{ $discipline->discipline }}</td> -->
                                        <td>{{ $discipline->lab_name }}</td>
                                        <td>{{ $discipline->link }}</td>
                                        <td>
                                            @if($discipline->picture)
                                                @foreach(json_decode($discipline->picture, true) as $picture)
                                                    <img src="{{ asset('uploads/interdisciplinary_research/' . $picture) }}" alt="{{ $discipline->name }} Image" class="rounded pb-1" height="125px" width="208px">
                                                @endforeach
                                            @else
                                                No Images Available
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('interdisciplinary-research.edit', $discipline->id) }}" class="btn btn-sm text-primary"><i class="fas fa-edit fa-sm"></i></a>
                                            <form action="{{ route('interdisciplinary-research.destroy', $discipline->id) }}" method="POST" style="display: inline;">
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
        </div>
    </section>
</div>
@endsection
