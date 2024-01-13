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
                <form method="POST" action="{{ route('interdisciplinary.research.update', $interdisciplinaryResearch->id) }}" enctype="multipart/form-data">
                    @method('PATCH')
                @else
                    <h6>Add New Research Lab</h6>
                    <form method="POST" action="{{ route('interdisciplinary.research.store') }}" enctype="multipart/form-data">
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
                        <label for="discipline" class="placeholder">Discipline Name <span class="text-danger">*</span></label>
                    </div>
                    <div class="input-container col-sm-6 mb-4">
                        <input type="url" class="input" id="link" name="link" value="{{ old('link', isset($interdisciplinaryResearch) ? $interdisciplinaryResearch->link : '') }}" placeholder=" "/>
                        <div class="cut"></div>
                        <label for="link" class="placeholder">Website Link</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-container col-sm-6 mb-4">
                        <input type="text" class="input" id="lab_name" name="lab_name" value="{{ old('lab_name', isset($interdisciplinaryResearch) ? $interdisciplinaryResearch->lab_name : '') }}" required placeholder=" "/>
                        <div class="cut"></div>
                        <label for="lab_name" class="placeholder">Lab Name <span class="text-danger">*</span></label>
                    </div>
                    <div class="input-container col-sm-6 mb-4">
                        <input type="text" class="input" id="lab_number" name="lab_number" value="{{ old('lab_number', isset($interdisciplinaryResearch) ? $interdisciplinaryResearch->lab_number : '') }}" placeholder=" "/>
                        <div class="cut"></div>
                        <label for="lab_number" class="placeholder">Lab Number</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-container col-md-12 mb-4">
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
                <div class="input-container col-md-12 mb-4 pr-0 pl-0">
                    <div class="additional-links">
                        @if(isset($interdisciplinaryResearch) && $interdisciplinaryResearch->image_links)
                            @foreach(json_decode($interdisciplinaryResearch->image_links, true) as $index => $link)
                                <div class="row input-container mb-5">
                                    <div class="col-9 col-lg-10">
                                        <input type="url" class="input" id="link" name="image_links[]" value="{{ old('image_links.' . $index, $link) }}" placeholder=" "/>
                                        <div class="cut"></div>
                                        <label for="link" class="placeholder">Image Link {{ $index + 1 }}</label>
                                        <iframe class="mt-3" src="{{ $link }}" frameborder="0" height="auto" width="100%"></iframe>
                                    </div>
                                    <button type="button" class="col-3 col-lg-2 btn btn-outline-danger remove-link">Remove</button>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <button type="button" class="btn btn-outline-info" id="add-link">Insert Lab Image Link  (if any)</button>
                </div>
                <label class="text-muted">Assigned Person Details</label>
                <div class="row mt-3">
                    <div class="input-container col-sm-6 mb-4">
                        <input type="text" class="input" id="person_name" name="person_name" value="{{ old('person_name', isset($interdisciplinaryResearch) ? $interdisciplinaryResearch->person_name : '') }}" placeholder=" "/>
                        <div class="cut"></div>
                        <label for="person_name" class="placeholder">Person Name</label>
                    </div>
                    <div class="input-container col-sm-6 mb-4">
                        <input type="text" class="input" id="designation" name="designation" value="{{ old('designation', isset($interdisciplinaryResearch) ? $interdisciplinaryResearch->designation : '') }}" placeholder=" "/>
                        <div class="cut"></div>
                        <label for="designation" class="placeholder">Designation</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-container col-sm-6 mb-4">
                        <input type="number" class="input" id="cell" name="cell" value="{{ old('cell', isset($interdisciplinaryResearch) ? $interdisciplinaryResearch->cell : '') }}" placeholder=" "/>
                        <div class="cut"></div>
                        <label for="cell" class="placeholder">Mobile No</label>
                    </div>
                    <div class="input-container col-sm-6 mb-4">
                        <input type="email" class="input" id="email" name="email" value="{{ old('email', isset($interdisciplinaryResearch) ? $interdisciplinaryResearch->email : '') }}" placeholder=" "/>
                        <div class="cut"></div>
                        <label for="email" class="placeholder">Email</label>
                    </div>
                </div>
                @if(isset($interdisciplinaryResearch))
                    <button type="submit" class="btn btn-sm btn-primary">Save Changes</button>
                    <a href="{{ route('interdisciplinary.research.index') }}" class="btn btn-sm btn-secondary">Cancel</a>
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
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($interdiscipline as $key=>$discipline)
                                    <tr>
                                        <td>
                                            <div class="text-center p-2">
                                                <h4>{{ ++$key }}. {{ $discipline->lab_name }}</h4>
                                                <p><a href="{{ $discipline->link }}" target="_blank" class="text-decoration-none">{{ $discipline->link }}</a></p>
                                                <p>{{ $discipline->person_name }}</p>
                                                <p>{{ $discipline->designation }}</p>
                                                <p>{{ $discipline->cell }}</p>
                                                <p>{{ $discipline->email }}</p>
                                                <div class="text-center">
                                                    <a href="{{ route('interdisciplinary.research.edit', $discipline->id) }}" class="btn btn-sm text-primary"><i class="fas fa-edit fa-sm"></i></a>
                                                    <form action="{{ route('interdisciplinary.research.destroy', $discipline->id) }}" method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm text-danger" onclick="return confirm('Are you sure you want to delete this record?')"><i class="fa fa-trash fa-sm" aria-hidden="true"></i></button>
                                                    </form>
                                                </div>
                                            </div>
                                            <div>
                                                @if($discipline->picture)
                                                    @foreach(json_decode($discipline->picture, true) as $picture)
                                                        <img src="{{ asset('uploads/interdisciplinary_research/' . $picture) }}" alt="Image Not Found" class="rounded pb-1" height="125px" width="208px">
                                                    @endforeach
                                                @else

                                                @endif
                                                @if ($discipline->image_links)
                                                    <div class="existing-links">
                                                        @foreach (json_decode($discipline->image_links, true) as $link)
                                                            <iframe class="p-2" src="{{ $link }}" alt="Image Not Found" frameborder="0" height="180" width="260"></iframe>
                                                        @endforeach
                                                    </div>
                                                @else
                                                    
                                                @endif
                                            </div>
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
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($sciencediscipline as $key=>$discipline)
                                    <tr>
                                    <td>
                                            <div class="text-center p-2">
                                                <h4>{{ ++$key }}. {{ $discipline->lab_name }}</h4>
                                                <p><a href="{{ $discipline->link }}" target="_blank" class="text-decoration-none">{{ $discipline->link }}</a></p>
                                                <p>{{ $discipline->person_name }}</p>
                                                <p>{{ $discipline->designation }}</p>
                                                <p>{{ $discipline->cell }}</p>
                                                <p>{{ $discipline->email }}</p>
                                                <div class="text-center">
                                                    <a href="{{ route('interdisciplinary.research.edit', $discipline->id) }}" class="btn btn-sm text-primary"><i class="fas fa-edit fa-sm"></i></a>
                                                    <form action="{{ route('interdisciplinary.research.destroy', $discipline->id) }}" method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm text-danger" onclick="return confirm('Are you sure you want to delete this record?')"><i class="fa fa-trash fa-sm" aria-hidden="true"></i></button>
                                                    </form>
                                                </div>
                                            </div>
                                            <div>
                                                @if($discipline->picture)
                                                    @foreach(json_decode($discipline->picture, true) as $picture)
                                                        <img src="{{ asset('uploads/interdisciplinary_research/' . $picture) }}" alt="{{ $discipline->name }} Image" class="rounded pb-1" height="125px" width="208px">
                                                    @endforeach
                                                @else

                                                @endif
                                                @if ($discipline->image_links)
                                                    <div class="existing-links">
                                                        @foreach (json_decode($discipline->image_links, true) as $link)
                                                            <iframe class="p-2" src="{{ $link }}" frameborder="0" height="180" width="260"></iframe>
                                                        @endforeach
                                                    </div>
                                                @else
                                                    
                                                @endif
                                            </div>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        // Add Link button click event
        $('#add-link').click(function () {
            var linkField = `
                <div class="row input-container mb-4">
                    <div class="col-8 col-lg-10">
                        <input type="url" class="input" name="image_links[]" placeholder=" "/>
                        <div class="cut"></div>
                        <label for="link" class="placeholder">Image Link</label>
                    </div>
                    <button type="button" class="col-4 col-lg-2 btn btn-outline-danger remove-link">Remove</button>
                </div>
            `;
            $('.additional-links').append(linkField);
        });

        // Remove Link button click event
        $('.additional-links').on('click', '.remove-link', function () {
            $(this).closest('.input-container').remove();
        });
    });
</script>
@endsection
