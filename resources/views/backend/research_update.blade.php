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
            <h5>Research Update</h5>
            @if(isset($researchUpdate))
            <h6>Edit Record</h6>
            <form method="POST" action="{{ route('research-update.update', $researchUpdate->id) }}" enctype="multipart/form-data">
                @method('PATCH')
            @else
            <h6>Create New Record</h6>
            <form method="POST" action="{{ route('research-update.store') }}" enctype="multipart/form-data">
            @endif
                @csrf
                <div class="row mt-5">
                    <div class="input-container mb-4">
                        <input type="text" class="input" id="volume" name="volume" value="{{ old('volume', isset($researchUpdate) ? $researchUpdate->volume : '') }}" required placeholder=" "/>
                        <div class="cut"></div>
                        <label for="volume" class="placeholder">Volume</label>
                    </div>
                    <div class="input-container mb-4">
                        <input type="file" class="form-control border-0" id="file" name="file" {{ isset($researchUpdate) ? '' : 'required' }}>
                        @if(isset($researchUpdate) && $researchUpdate->file)
                            <a href="{{ asset('uploads/research_update/' . $researchUpdate->file) }}" target="_blank">{{ $researchUpdate->file }}</a>
                        @endif                
                    </div>
                </div>
                @if(isset($researchUpdate))
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                    <a href="{{ route('research-update.index') }}" class="btn btn-danger">Cancel</a>
                @else
                    <button type="submit" class="btn btn-primary">Submit</button>
                @endif
            </form>
        </div>
    </div>

    <div class="row">
        <div class="mx-auto pt-5 pb-5">
            <h5 class="text-center mb-5">Research Update Records</h5>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>volume</th>
                            <th>File</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if(isset($researchUpdates))
                        @foreach($researchUpdates as $key=>$researchUpdate)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $researchUpdate->volume }}</td>
                                <td>
                                    <a href="{{ asset('uploads/research_update/' . $researchUpdate->file) }}" target="_blank" title="View file">
                                        <iframe src="{{ asset('uploads/research_update/' . $researchUpdate->file) }}" width="400px" height="200px"></iframe>
                                    </a>
                                <td>
                                    <a href="{{ asset('uploads/research_update/' . $researchUpdate->file) }}" target="_blank" title="View file"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    <a href="{{ route('research-update.edit', $researchUpdate->id) }}" class="btn text-primary" title="Edit {{$researchUpdate->volume}}'s file"><i class="fas fa-edit fa-sm"></i></a>
                                    <form action="{{ route('research-update.destroy', $researchUpdate->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn text-danger" onclick="return confirm('Are you sure you want to delete this record?')" title="Delete {{$researchUpdate->volume}}'s information"><i class="fa fa-trash fa-sm" aria-hidden="true"></i></button>
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