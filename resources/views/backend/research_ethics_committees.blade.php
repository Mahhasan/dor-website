@extends('backend.layouts.master')
@section('content')
<div class="container">
    <!-- Button to toggle form visibility -->
    @if(!isset($researchEthicsCommittee))
        <button class="float-right btn btn-sm btn-primary" id="toggleForm" data-original-text="Add New Committee">Add New Committee</button>
    @endif
    <div class="row bg-aliceblue" id="FormContainer" style="display: {{ isset($researchEthicsCommittee) ? 'block' : 'none' }};">
        <div class="custom-form col-md-10 mx-auto pt-5 mb-5 pb-5">
            <h5>Research Ethics Committee</h5>
            @if(isset($researchEthicsCommittee))
                <h6>Edit <span class="text-success font-weight-bold">{{$researchEthicsCommittee->name}}'s</span> Record</h6>
                <form method="POST" action="{{ route('research.ethics.ommittees.update', $researchEthicsCommittee->id) }}">
                @method('PATCH')
            @else
                <h6>Add New Committee</h6>
                <form method="POST" action="{{ route('research.ethics.ommittees.store') }}">
            @endif
                @csrf
                <div class="row mt-5">
                    <div class="input-container col-sm-6 mb-4">
                        <input type="text" class="input" id="name" name="name" value="{{ old('name', isset($researchEthicsCommittee) ? $researchEthicsCommittee->name : '') }}" required placeholder=" "/>
                        <div class="cut"></div>
                        <label for="name" class="placeholder">Person Name <span class="text-danger">*</span></label>
                    </div>
                    <div class="input-container col-sm-6 mb-4">
                        <input type="text" class="input" id="designation" name="designation" value="{{ old('designation', isset($researchEthicsCommittee) ? $researchEthicsCommittee->designation : '') }}" required placeholder=" "/>
                        <div class="cut"></div>
                        <label for="designation" class="placeholder">Designation <span class="text-danger">*</span></label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-container col-sm-6 mb-4">
                        <select id="department_id" class="input bg-white"  name="department_id" required placeholder=" ">
                            <option selected disabled>Select a Department</option>
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}" {{ isset($researchEthicsCommittee) && $researchEthicsCommittee->department_id == $department->id ? 'selected' : '' }}>{{ $department->full_name }}</option>
                            @endforeach
                        </select>
                        <div class="cut"></div>
                        <label for="department_id" class="placeholder">Department Name <span class="text-danger">*</span></label>
                    </div>
                    <div class="input-container col-sm-6 mb-4">
                        <select class="input bg-white" id="committee_name" name="committee_name" required>
                            <option value="">Select Committee</option>
                            <option value="FSIT Research Ethics Committee" {{ old('committee_name', isset($researchEthicsCommittee) ? $researchEthicsCommittee->committee_name : '') === 'FSIT Research Ethics Committee' ? 'selected' : '' }}>FSIT Research Ethics Committee</option>
                            <option value="FBE Research Ethics Committee" {{ old('committee_name', isset($researchEthicsCommittee) ? $researchEthicsCommittee->committee_name : '') === 'FBE Research Ethics Committee' ? 'selected' : '' }}>FBE Research Ethics Committee</option>
                            <option value="FAHS Research Ethics Committee" {{ old('committee_name', isset($researchEthicsCommittee) ? $researchEthicsCommittee->committee_name : '') === 'FAHS Research Ethics Committee' ? 'selected' : '' }}>FAHS Research Ethics Committee</option>
                            <option value="FE Research Ethics Committee" {{ old('committee_name', isset($researchEthicsCommittee) ? $researchEthicsCommittee->committee_name : '') === 'FE Research Ethics Committee' ? 'selected' : '' }}>FE Research Ethics Committee</option>
                            <option value="FHSS Research Ethics Committee" {{ old('committee_name', isset($researchEthicsCommittee) ? $researchEthicsCommittee->committee_name : '') === 'FHSS Research Ethics Committee' ? 'selected' : '' }}>FHSS Research Ethics Committee</option>
                        </select>
                        <div class="cut"></div>
                        <label for="committee_name" class="placeholder">Committee Name <span class="text-danger">*</span></label>
                    </div>
                </div>
                <div class="row">
                    <div class=" input-container col-sm-12 mb-4">
                        <input type="text" class="input" id="position" name="position" value="{{ old('position', isset($researchEthicsCommittee) ? $researchEthicsCommittee->position : '') }}" required placeholder=" "/>
                        <div class="cut"></div>
                        <label for="position" class="placeholder">Position <span class="text-danger">*</span></label>
                    </div>
                </div>
                @if(isset($researchEthicsCommittee))
                    <button type="submit" class="btn btn-sm btn-primary">Save Changes</button>
                    <a href="{{ route('research.ethics.ommittees.index') }}" class="btn btn-sm btn-secondary">Cancel</a>
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
                <h5 class="text-center mt-5 mb-5">Research Ethics Committee Records</h5>
                <nav>
                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-fsit-tab" data-toggle="tab" href="#nav-fsit" role="tab" aria-controls="nav-fsit" aria-selected="true">FSIT</a>
                        <a class="nav-item nav-link" id="nav-fbe-tab" data-toggle="tab" href="#nav-fbe" role="tab" aria-controls="nav-fbe" aria-selected="false">FBE</a>
                        <a class="nav-item nav-link" id="nav-fahs-tab" data-toggle="tab" href="#nav-fahs" role="tab" aria-controls="nav-fahs" aria-selected="false">FAHS</a>
                        <a class="nav-item nav-link" id="nav-fe-tab" data-toggle="tab" href="#nav-fe" role="tab" aria-controls="nav-fe" aria-selected="false">FE</a>
                        <a class="nav-item nav-link" id="nav-fhss-tab" data-toggle="tab" href="#nav-fhss" role="tab" aria-controls="nav-fhss" aria-selected="false">FHSS</a>
                    </div>
                </nav>
                <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-fsit" role="tabpanel" aria-labelledby="nav-fsit-tab">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped" id="" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Name</th>
                                        <th>Designation</th>
                                        <th>Department</th>
                                        <th>Position</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($fsit as $key=>$committee)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $committee->name }}</td>
                                        <td>{{ $committee->designation }}</td>
                                        <td>{{ $committee->departments->short_name ?? '' }}</td>
                                        <td>{{ $committee->position }}</td>
                                        <td>
                                            <a href="{{ route('research.ethics.ommittees.edit', $committee->id) }}" class="btn text-primary" title="Edit {{$committee->name}}'s information"><i class="fas fa-edit fa-sm"></i></a>
                                            <form action="{{ route('research.ethics.ommittees.destroy', $committee->id) }}" method="POST" style="display: inline;">
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
                    <div class="tab-pane fade" id="nav-fbe" role="tabpanel" aria-labelledby="nav-fbe-tab">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped" id="" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Name</th>
                                        <th>Designation</th>
                                        <th>Department</th>
                                        <th>Position</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($fbe as $key=>$committee)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $committee->name }}</td>
                                        <td>{{ $committee->designation }}</td>
                                        <td>{{ $committee->departments->short_name ?? '' }}</td>
                                        <td>{{ $committee->position }}</td>
                                        <td>
                                            <a href="{{ route('research.ethics.ommittees.edit', $committee->id) }}" class="btn text-primary" title="Edit {{$committee->name}}'s information"><i class="fas fa-edit fa-sm"></i></a>
                                            <form action="{{ route('research.ethics.ommittees.destroy', $committee->id) }}" method="POST" style="display: inline;">
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
                    <div class="tab-pane fade" id="nav-fahs" role="tabpanel" aria-labelledby="nav-fahs-tab">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped" id="" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Name</th>
                                        <th>Designation</th>
                                        <th>Department</th>
                                        <th>Position</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($fahs as $key=>$committee)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $committee->name }}</td>
                                        <td>{{ $committee->designation }}</td>
                                        <td>{{ $committee->departments->short_name ?? '' }}</td>
                                        <td>{{ $committee->position }}</td>
                                        <td>
                                            <a href="{{ route('research.ethics.ommittees.edit', $committee->id) }}" class="btn text-primary" title="Edit {{$committee->name}}'s information"><i class="fas fa-edit fa-sm"></i></a>
                                            <form action="{{ route('research.ethics.ommittees.destroy', $committee->id) }}" method="POST" style="display: inline;">
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
                    <div class="tab-pane fade" id="nav-fe" role="tabpanel" aria-labelledby="nav-fe-tab">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped" id="" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Name</th>
                                        <th>Designation</th>
                                        <th>Department</th>
                                        <th>Position</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($fe as $key=>$committee)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $committee->name }}</td>
                                        <td>{{ $committee->designation }}</td>
                                        <td>{{ $committee->departments->short_name ?? '' }}</td>
                                        <td>{{ $committee->position }}</td>
                                        <td>
                                            <a href="{{ route('research.ethics.ommittees.edit', $committee->id) }}" class="btn text-primary" title="Edit {{$committee->name}}'s information"><i class="fas fa-edit fa-sm"></i></a>
                                            <form action="{{ route('research.ethics.ommittees.destroy', $committee->id) }}" method="POST" style="display: inline;">
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
                            <table class="table table-bordered table-hover table-striped" id="" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Name</th>
                                        <th>Designation</th>
                                        <th>Department</th>
                                        <th>Position</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($fhss as $key=>$committee)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $committee->name }}</td>
                                        <td>{{ $committee->designation }}</td>
                                        <td>{{ $committee->departments->short_name ?? '' }}</td>
                                        <td>{{ $committee->position }}</td>
                                        <td>
                                            <a href="{{ route('research.ethics.ommittees.edit', $committee->id) }}" class="btn text-primary" title="Edit {{$committee->name}}'s information"><i class="fas fa-edit fa-sm"></i></a>
                                            <form action="{{ route('research.ethics.ommittees.destroy', $committee->id) }}" method="POST" style="display: inline;">
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
@endsection