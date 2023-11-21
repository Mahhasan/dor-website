@extends('backend.layouts.master')
@section('content')
<div class="container">
    @if(isset($missionVision))
        <div class="row bg-aliceblue">
            <div class="custom-form col-md-10 mx-auto pt-5 pb-5">
                <h5>Mission & Vision</h5>
                <h6>Edit Record</h6>
                <form method="POST" action="{{ route('mission.vision.update', $missionVision->id) }}">
                    @method('PATCH')  
                    @csrf
                    <div class="row mt-5">
                        <div class="form-group col-sm-12 mb-4">
                            <textarea class="input" id="file-picker" name="vision" value="{{ old('vision', isset($missionVision) ? $missionVision->vision : '') }}" required placeholder=" ">{{ old('vision', isset($missionVision) ? $missionVision->vision : '') }}</textarea>
                            <div class="cut"></div>
                            <label for="vision" class="placeholder">Vision <span class="text-danger">*</span></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-12 mb-5">
                            <textarea class="input" id="file-picker" name="mission" value="{{ old('mission', isset($missionVision) ? $missionVision->mission : '') }}" required placeholder=" ">{{ old('mission', isset($missionVision) ? $missionVision->mission : '') }}</textarea>
                            <div class="cut"></div>
                            <label for="mission" class="placeholder">Mission <span class="text-danger">*</span></label>
                        </div>
                    </div>
                    @if(isset($missionVision))
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                        <a href="{{ route('mission.vision.index') }}" class="btn btn-secondary">Cancel</a>
                    @else
                        <button type="submit" class="btn btn-primary">Submit</button>
                    @endif
                </form>
            </div>
        </div>
    @endif

    <div class="row pt-5">
        @if(isset($missionVisions))
        @foreach($missionVisions as $missionVision)
            <div class="mx-auto mt-5 mb-5">
                <div class="mb-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="text-center flex-grow-1">Mission & vision</h5>
                        <div>
                            <a href="{{ route('mission.vision.edit', $missionVision->id) }}" class="btn text-primary" title="Edit this information"><i class="fas fa-edit fa-sm"></i></a>
                            <!-- <form action="{{ route('mission.vision.destroy', $missionVision->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn text-danger" onclick="return confirm('Are you sure you want to delete this record?')" title="Delete this information"><i class="fa fa-trash fa-sm" aria-hidden="true"></i></button>
                            </form> -->
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="">
                    <h6 class="font-weight-bold text-center">Vission</h6>
                    <p>{!! $missionVision->vision !!}</p>
                </div>
                <div class="mt-5">
                    <h6 class="font-weight-bold text-center">Mission</h6>
                    <p>{!! $missionVision->mission !!}</p>
                </div>
            </div>
        @endforeach
        @endif
    </div>
</div>
@endsection