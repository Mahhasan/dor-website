
@extends('backend.layouts.master')
@section('content')
<style>
form {
  border-radius: 20px;
  box-sizing: border-box;
}
.input-container {
  height: 50px;
  position: relative;
  width: 100%;
}
.input {
  /* background-color: #303245; */
  border-radius: 12px;
  border: 0;
  box-sizing: border-box;
  color: #808097;
  font-size: 18px;
  height: 100%;
  outline: 0;
  padding: 4px 20px 0;
  width: 100%;
}
.cut {
  /* background-color: #15172b; */
  border-radius: 10px;
  height: 20px;
  left: 20px;
  position: absolute;
  top: -20px;
  transform: translateY(0);
  transition: transform 200ms;
  width: 76px;
}
.cut-short {
  width: 50px;
}
.input:focus ~ .cut,
.input:not(:placeholder-shown) ~ .cut {
  transform: translateY(8px);
}
.placeholder {
  /* color: #65657b; */
  left: 32px;
  line-height: 14px;
  pointer-events: none;
  position: absolute;
  transform-origin: 0 50%;
  transition: transform 200ms, color 200ms;
  top: 20px;
}
.input:focus ~ .placeholder,
.input:not(:placeholder-shown) ~ .placeholder {
  transform: translateY(-30px) translateX(10px) scale(0.75);
}
.input:not(:placeholder-shown) ~ .placeholder {
  color: #4e73df;
}
.input:focus ~ .placeholder {
  color: #dc2f55;
}

</style>
<div class="container">
    <!-- Display Success and Error Messages -->
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
    <!-- Display Create/Edit Form -->
    <div class="row" style="background-color: aliceblue;">
        <div class="col-md-10 mx-auto pt-5 pb-5" >
            <h5>Research Ethics Committees</h5>
            @if(isset($researchEthicsCommittee))
            <h6>Edit {{$researchEthicsCommittee->name}}'s' Record</h6>
            <form method="POST" action="{{ route('research-ethics-committees.update', $researchEthicsCommittee->id) }}">
                @method('PATCH')
            @else
            <h6>Create New Record</h6>
            <form method="POST" action="{{ route('research-ethics-committees.store') }}">
            @endif
                @csrf
                <div class="row mt-5">
                    <div class="input-container col-sm-6 mb-4">
                        <input type="text" class="input" id="name" name="name" value="{{ old('name', isset($researchEthicsCommittee) ? $researchEthicsCommittee->name : '') }}" required placeholder=" "/>
                        <div class="cut"></div>
                        <label for="name" class="placeholder">Name</label>
                    </div>
                    <div class="input-container col-sm-6 mb-4">
                        <input type="text" class="input" id="designation" name="designation" value="{{ old('designation', isset($researchEthicsCommittee) ? $researchEthicsCommittee->designation : '') }}" required placeholder=" "/>
                        <div class="cut"></div>
                        <label for="designation" class="placeholder">Designation</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-container col-sm-6 mb-4">
                        <!-- <label for="faculty_name"></label> -->
                        <select class="input bg-white" id="faculty_name" name="faculty_name" required>
                            <option value="">Select Faculty</option>
                            <option value="FSIT Research Ethics Committee" {{ old('faculty_name', isset($researchEthicsCommittee) ? $researchEthicsCommittee->faculty_name : '') === 'FSIT Research Ethics Committee' ? 'selected' : '' }}>FSIT Research Ethics Committee</option>
                            <option value="FBE Research Ethics Committee" {{ old('faculty_name', isset($researchEthicsCommittee) ? $researchEthicsCommittee->faculty_name : '') === 'FBE Research Ethics Committee' ? 'selected' : '' }}>FBE Research Ethics Committee</option>
                            <option value="FAHS Research Ethics Committee" {{ old('faculty_name', isset($researchEthicsCommittee) ? $researchEthicsCommittee->faculty_name : '') === 'FAHS Research Ethics Committee' ? 'selected' : '' }}>FAHS Research Ethics Committee</option>
                            <option value="FE Research Ethics Committee" {{ old('faculty_name', isset($researchEthicsCommittee) ? $researchEthicsCommittee->faculty_name : '') === 'FE Research Ethics Committee' ? 'selected' : '' }}>FE Research Ethics Committee</option>
                            <option value="FHSS Research Ethics Committee" {{ old('faculty_name', isset($researchEthicsCommittee) ? $researchEthicsCommittee->faculty_name : '') === 'FHSS Research Ethics Committee' ? 'selected' : '' }}>FHSS Research Ethics Committee</option>
                        </select>
                    </div>
                    <div class=" input-container col-sm-6 mb-4">
                        <input type="text" class="input" id="position" name="position" value="{{ old('position', isset($researchEthicsCommittee) ? $researchEthicsCommittee->position : '') }}" required placeholder=" "/>
                        <div class="cut"></div>
                        <label for="position" class="placeholder">Position</label>
                    </div>
                </div>
                @if(isset($researchEthicsCommittee))
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                    <a href="{{ route('research-ethics-committees.index') }}" class="btn btn-secondary">Cancel</a>
                @else
                    <button type="submit" class="btn btn-primary">Submit</button>
                @endif
            </form>
        </div>
    </div>
    <!-- Tabs -->
    <section id="tabs">
        <div class="row">
            <div class="col-xs-12 mx-auto pt-5">
                <h5 class="text-center mb-5">Research Ethics Committee Records</h5>
                <nav>
                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">FSIT</a>
                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">FBE</a>
                        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">FAHS</a>
                        <a class="nav-item nav-link" id="nav-about-tab" data-toggle="tab" href="#nav-about" role="tab" aria-controls="nav-about" aria-selected="false">FE</a>
                        <a class="nav-item nav-link" id="nav-fhss-tab" data-toggle="tab" href="#nav-fhss" role="tab" aria-controls="nav-fhss" aria-selected="false">FHSS</a>
                    </div>
                </nav>
                <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
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
                                    @foreach($fsit as $committee)
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
                                </tbody>
                            </table>
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
                                    @foreach($fbe as $committee)
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
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
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
                                    @foreach($fahs as $committee)
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
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                        <div class="table-responsive">
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
                                    @foreach($fe as $committee)
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
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-fhss" role="tabpanel" aria-labelledby="nav-fhss-tab">
                        <div class="table-responsive">
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
                                    @foreach($fhss as $committee)
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
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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