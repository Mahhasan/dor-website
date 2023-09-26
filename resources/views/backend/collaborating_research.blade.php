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
            <h5>Collaborating Research</h5>
            @if(isset($collaboratingResearch))
            <h6>Edit Record</h6>
            <form method="POST" action="{{ route('collaborating-research.update', $collaboratingResearch->id) }}">
                @method('PATCH')
            @else
            <h6>Create New Record</h6>
            <form method="POST" action="{{ route('collaborating-research.store') }}">
            @endif
                @csrf
                <div class="row mt-5">
                    <div class="input-container mb-4">
                        <input type="text" class="input" id="institute_name" name="institute_name" value="{{ old('institute_name', isset($collaboratingResearch) ? $collaboratingResearch->institute_name : '') }}" required placeholder=" "/>
                        <div class="cut"></div>
                        <label for="institute_name" class="placeholder">Institute Name</label>
                    </div>
                </div>
                @if(isset($collaboratingResearch))
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                    <a href="{{ route('collaborating-research.index') }}" class="btn btn-danger">Cancel</a>
                @else
                    <button type="submit" class="btn btn-primary">Submit</button>
                @endif
            </form>
        </div>
    </div>

    <div class="row">
        <div class="mx-auto pt-5 pb-5">
            <h5 class="text-center mb-5">Collaborating Research Records</h5>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Research Collaboration with Universities</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if(isset($collaboratingResearches))
                        @foreach($collaboratingResearches as $key=>$collaboratingResearch)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $collaboratingResearch->institute_name }}</td>
                                <td>
                                    <a href="{{ route('collaborating-research.edit', $collaboratingResearch->id) }}" class="btn text-primary" title="Edit this information"><i class="fas fa-edit fa-sm"></i></a>
                                    <form action="{{ route('collaborating-research.destroy', $collaboratingResearch->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn text-danger" onclick="return confirm('Are you sure you want to delete this record?')" title="Delete this information"><i class="fa fa-trash fa-sm" aria-hidden="true"></i></button>
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
@endsection