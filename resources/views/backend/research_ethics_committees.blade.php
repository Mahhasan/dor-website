
@extends('backend.layouts.master')
@section('content')
<div class="container">
{{-- Display Success and Error Messages --}}
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
    <h2>Research Ethics Committees</h2>
    
    {{-- Display Create/Edit Form --}}
    <div class="row">
        <div class="col-md-6">
            @if(isset($researchEthicsCommittee))
            <h3>Edit Record</h3>
            <form method="POST" action="{{ route('research-ethics-committees.update', $researchEthicsCommittee->id) }}">
                @method('PATCH')
            @else
            <h3>Create New Record</h3>
            <form method="POST" action="{{ route('research-ethics-committees.store') }}">
            @endif
                @csrf
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', isset($researchEthicsCommittee) ? $researchEthicsCommittee->name : '') }}" required>
                </div>
                <div class="form-group">
                    <label for="designation">Designation:</label>
                    <input type="text" class="form-control" id="designation" name="designation" value="{{ old('designation', isset($researchEthicsCommittee) ? $researchEthicsCommittee->designation : '') }}" required>
                </div>
                <!-- <div class="form-group">
                    <label for="faculty_name">Faculty Name:</label>
                    <input type="text" class="form-control" id="faculty_name" name="faculty_name" value="{{ old('faculty_name', isset($researchEthicsCommittee) ? $researchEthicsCommittee->faculty_name : '') }}" required>
                </div> -->
                <div class="form-group">
                    <label for="faculty_name">Faculty Name:</label>
                    <select class="form-control" id="faculty_name" name="faculty_name" required>
                        <option value="">Select Faculty Name</option>
                        <option value="FSIT Research Ethics Committee" {{ old('faculty_name', isset($researchEthicsCommittee) ? $researchEthicsCommittee->faculty_name : '') === 'FSIT Research Ethics Committee' ? 'selected' : '' }}>FSIT Research Ethics Committee</option>
                        <option value="FBE Research Ethics Committee" {{ old('faculty_name', isset($researchEthicsCommittee) ? $researchEthicsCommittee->faculty_name : '') === 'FBE Research Ethics Committee' ? 'selected' : '' }}>FBE Research Ethics Committee</option>
                        <option value="FAHS Research Ethics Committee" {{ old('faculty_name', isset($researchEthicsCommittee) ? $researchEthicsCommittee->faculty_name : '') === 'FAHS Research Ethics Committee' ? 'selected' : '' }}>FAHS Research Ethics Committee</option>
                        <option value="FE Research Ethics Committee" {{ old('faculty_name', isset($researchEthicsCommittee) ? $researchEthicsCommittee->faculty_name : '') === 'FE Research Ethics Committee' ? 'selected' : '' }}>FE Research Ethics Committee</option>
                        <option value="FHSS Research Ethics Committee" {{ old('faculty_name', isset($researchEthicsCommittee) ? $researchEthicsCommittee->faculty_name : '') === 'FHSS Research Ethics Committee' ? 'selected' : '' }}>FHSS Research Ethics Committee</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="position">Position:</label>
                    <input type="text" class="form-control" id="position" name="position" value="{{ old('position', isset($researchEthicsCommittee) ? $researchEthicsCommittee->position : '') }}" required>
                </div>
                @if(isset($researchEthicsCommittee))
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                    <a href="{{ route('research-ethics-committees.index') }}" class="btn btn-danger">Cancel</a>
                @else
                    <button type="submit" class="btn btn-primary">Submit</button>
                @endif
            </form>
        </div>
    </div>

    <br>
    <!-- Tabs -->
    <section id="tabs">
        <div class="container">
            <h3 class="text-center mb-5">Research Ethics Committee Records</h3>
            <div class="row">
                <div class="col-xs-12 ">
                    <nav>
                        <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">FSIT</a>
                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">FBE</a>
                            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">FAHS</a>
                            <a class="nav-item nav-link" id="nav-about-tab" data-toggle="tab" href="#nav-about" role="tab" aria-controls="nav-about" aria-selected="false">FE</a>
                        </div>
                    </nav>
                    <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <div class="row mt-4">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Designation</th>
                                                    <th>Faculty Name</th>
                                                    <th>Position</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @if(isset($researchEthicsCommittees))
                                                @foreach($researchEthicsCommittees as $committee)
                                                    <tr>
                                                        <td>{{ $committee->name }}</td>
                                                        <td>{{ $committee->designation }}</td>
                                                        <td>{{ $committee->faculty_name }}</td>
                                                        <td>{{ $committee->position }}</td>
                                                        <td>
                                                            <a href="{{ route('research-ethics-committees.edit', $committee->id) }}" class="btn text-primary" title="Edit {{$committee->name}}'s information"><i class="fas fa-edit fa-sm"></i></a>
                                                            <form action="{{ route('research-ethics-committees.destroy', $committee->id) }}" method="POST" style="display: inline;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn text-danger" onclick="return confirm('Are you sure you want to delete this record?')" title="Delete {{$committee->name}}'s information"><i class="fa fa-trash fa-sm" aria-hidden="true"></i></button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Designation</th>
                                            <th>Faculty Name</th>
                                            <th>Position</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @if(isset($researchEthicsCommittees))
                                        @foreach($researchEthicsCommittees as $committee)
                                            <tr>
                                                <td>{{ $committee->name }}</td>
                                                <td>{{ $committee->designation }}</td>
                                                <td>{{ $committee->faculty_name }}</td>
                                                <td>{{ $committee->position }}</td>
                                                <td>
                                                    <a href="{{ route('research-ethics-committees.edit', $committee->id) }}" class="btn text-primary" title="Edit {{$committee->name}}'s information"><i class="fas fa-edit fa-sm"></i></a>
                                                    <form action="{{ route('research-ethics-committees.destroy', $committee->id) }}" method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn text-danger" onclick="return confirm('Are you sure you want to delete this record?')" title="Delete {{$committee->name}}'s information"><i class="fa fa-trash fa-sm" aria-hidden="true"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
      
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Designation</th>
                            <th>Faculty Name</th>
                            <th>Position</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if(isset($researchEthicsCommittees))
                        @foreach($researchEthicsCommittees as $committee)
                            <tr>
                                <td>{{ $committee->name }}</td>
                                <td>{{ $committee->designation }}</td>
                                <td>{{ $committee->faculty_name }}</td>
                                <td>{{ $committee->position }}</td>
                                <td>
                                    <a href="{{ route('research-ethics-committees.edit', $committee->id) }}" class="btn text-primary" title="Edit {{$committee->name}}'s information"><i class="fas fa-edit fa-sm"></i></a>
                                    <form action="{{ route('research-ethics-committees.destroy', $committee->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn text-danger" onclick="return confirm('Are you sure you want to delete this record?')" title="Delete {{$committee->name}}'s information"><i class="fa fa-trash fa-sm" aria-hidden="true"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
                        </div>
                        <div class="tab-pane fade" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                        <table class="table table-bordered" id="" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Designation</th>
                            <th>Faculty Name</th>
                            <th>Position</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if(isset($researchEthicsCommittees))
                        @foreach($researchEthicsCommittees as $committee)
                            <tr>
                                <td>{{ $committee->name }}</td>
                                <td>{{ $committee->designation }}</td>
                                <td>{{ $committee->faculty_name }}</td>
                                <td>{{ $committee->position }}</td>
                                <td>
                                    <a href="{{ route('research-ethics-committees.edit', $committee->id) }}" class="btn text-primary" title="Edit {{$committee->name}}'s information"><i class="fas fa-edit fa-sm"></i></a>
                                    <form action="{{ route('research-ethics-committees.destroy', $committee->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn text-danger" onclick="return confirm('Are you sure you want to delete this record?')" title="Delete {{$committee->name}}'s information"><i class="fa fa-trash fa-sm" aria-hidden="true"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ./Tabs -->

    {{-- Display Table View --}}
    <div class="row mt-4">
        <div class="col-md-12">
            <h3>Research Ethics Committee Records</h3>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Designation</th>
                            <th>Faculty Name</th>
                            <th>Position</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if(isset($researchEthicsCommittees))
                        @foreach($researchEthicsCommittees as $committee)
                            <tr>
                                <td>{{ $committee->name }}</td>
                                <td>{{ $committee->designation }}</td>
                                <td>{{ $committee->faculty_name }}</td>
                                <td>{{ $committee->position }}</td>
                                <td>
                                    <a href="{{ route('research-ethics-committees.edit', $committee->id) }}" class="btn text-primary" title="Edit {{$committee->name}}'s information"><i class="fas fa-edit fa-sm"></i></a>
                                    <form action="{{ route('research-ethics-committees.destroy', $committee->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn text-danger" onclick="return confirm('Are you sure you want to delete this record?')" title="Delete {{$committee->name}}'s information"><i class="fa fa-trash fa-sm" aria-hidden="true"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- jQuery (required for Bootstrap) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap JS (required for Bootstrap components like tabs) -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.6.0/js/bootstrap.min.js"></script>

<script>
    // JavaScript to store and retrieve the active tab using cookies
    $(document).ready(function () {
        // Get the active tab from the cookie (if available)
        var activeTab = getCookie("activeTab");

        if (activeTab) {
            // Activate the saved tab
            $("#nav-tabContent").find(activeTab).addClass("show active");
            $("#nav-tab").find('[href="#' + activeTab + '"]').tab("show");
        }

        // Handle tab change events
        $("a[data-toggle='tab']").on("shown.bs.tab", function (e) {
            var tabId = $(e.target).attr("href").substring(1); // Get the tab ID
            setCookie("activeTab", tabId); // Save the active tab to a cookie
        });

        // Function to set a cookie
        function setCookie(name, value) {
            document.cookie = name + "=" + value + "; path=/";
        }

        // Function to get a cookie by name
        function getCookie(name) {
            var cookieValue = document.cookie.match(
                "(^|;)\\s*" + name + "\\s*=\\s*([^;]+)"
            );
            return cookieValue ? cookieValue.pop() : null;
        }
    });
</script>

@endsection