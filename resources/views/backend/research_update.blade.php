@extends('backend.layouts.master')
@section('content')
<div class="container">
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
                        <input type="file" class="input border-0 pt-2" id="file" name="file" {{ isset($researchUpdate) ? '' : 'required' }} placeholder=" ">
                            <div class=" mt-3 float-right">
                                @if(isset($researchUpdate) && $researchUpdate->file)
                                    <!-- <a href="{{ asset('uploads/research_update/' . $researchUpdate->file) }}" target="_blank">{{ $researchUpdate->file }}</a> -->
                                    <a href="{{ asset('uploads/research_update/' . $researchUpdate->file) }}" target="_blank"><iframe src="{{ asset('uploads/research_update/' . $researchUpdate->file) }}" style="width: 100%; height: auto;"></iframe>view</a>
                                @endif
                            </div>
                        <div class="cut"></div>
                        <label for="file" class="placeholder">File <small class="font-italic">(pdf only, max size: 10mb)</small></label>
            
                    </div>
                </div>
                @if(isset($researchUpdate))
                    <button type="submit" class="btn btn-sm btn-primary">Save Changes</button>
                    <a href="{{ route('research-update.index') }}" class="btn btn-sm btn-secondary">Cancel</a>
                @else
                    <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                @endif
            </form>
        </div>
    </div>

    <div class="mx-auto mt-5 mb-5">
        <h5 class="text-center pt-5">Research Update Records</h5>
        <hr>
    </div>

    <div class="row mb-5">
        @foreach($researchUpdates as $researchUpdate)
            <div class="col-md-6 mb-4 mx-auto">
                <div class="card border-0">
                    @if($researchUpdate->file)
                        <div class="text-center">
                            <iframe src="{{ asset('uploads/research_update/' . $researchUpdate->file) }}" width="100%" height="400px"></iframe>
                        </div>
                    @else
                            No File Available>
                    @endif
                    <div class="card-body">
                        <a href="{{ asset('uploads/research_update/' . $researchUpdate->file) }}" class="" target="_blank" title="View file">{{ $researchUpdate->volume}}</a>
                        <form action="{{ route('research-update.destroy', $researchUpdate->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="float-right btn btn-sm text-danger" onclick="return confirm('Are you sure you want to delete this record?')" title="Delete {{$researchUpdate->volume}}'s information"><i class="fa fa-trash fa-sm" aria-hidden="true"></i></button>
                        </form>
                        <a href="{{ route('research-update.edit', $researchUpdate->id) }}" class="float-right btn btn-sm text-primary" title="Edit {{$researchUpdate->volume}}'s file"><i class="fas fa-edit fa-sm"></i></a>
                        <a href="{{ asset('uploads/research_update/' . $researchUpdate->file) }}" class="float-right btn btn-sm text-primary" target="_blank" title="View file"><i class="fa fa-eye" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection