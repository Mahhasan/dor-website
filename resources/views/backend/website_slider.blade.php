@extends('backend.layouts.master')
@section('content')
<div class="container">
    <!-- Button to toggle form visibility -->
    @if(!isset($websiteSlider))
        <button class="float-right btn btn-sm btn-primary" id="toggleForm" data-original-text="Create New Slider">Create New Slider</button>
    @endif
    <div class="row bg-aliceblue" id="FormContainer" style="display: {{ isset($websiteSlider) ? 'block' : 'none' }};">
        <div class="custom-form col-md-10 mx-auto pt-5 mb-5 pb-5">
            @if(isset($websiteSlider))
                <h6>Edit Slider Image</h6>
                <form method="POST" action="{{ route('website.slider.update', $websiteSlider->id) }}" enctype="multipart/form-data">
                    @method('PATCH')
            @else
                <h6>Add New Slider Image</h6>
                <form method="POST" action="{{ route('website.slider.store') }}" enctype="multipart/form-data">
            @endif
                @csrf
                <div class="row mt-5">
                    <div class="input-container col-md-6 mb-4">
                        <input type="number" class="input" id="slider_serial" name="slider_serial" value="{{ old('slider_serial', isset($websiteSlider) ? $websiteSlider->slider_serial : '') }}" required placeholder=" ">
                        <div class="cut"></div>
                        <label for="slider_serial" class="placeholder">Slider Serial</label>
                    </div>
                    <div class="input-container col-md-6 mb-4">
                        <input type="file" class="input border-0 pt-2" id="picture" name="picture" accept="image/*" {{ isset($websiteSlider) ? '' : 'required' }} placeholder=" ">
                        @if(isset($websiteSlider) && $websiteSlider->picture)
                            <div class="mr-2 mt-3 float-right">
                                <img src="{{ asset('uploads/website_slider/' . $websiteSlider->picture) }}" alt="Image" height="auto" width="200">
                            </div>
                        @endif   
                        <div class="cut"></div>
                        <label for="picture" class="placeholder">Slider Image <small class="font-italic">(size: 1920 x 650 px)</small></label>
                    </div>
                </div>
                @if(isset($websiteSlider))
                    <button type="submit" class="btn btn-sm btn-primary">Save Changes</button>
                    <a href="{{ route('website.slider.index') }}" class="btn btn-sm btn-secondary">Cancel</a>
                @else
                    <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                @endif
            </form>
        </div>
    </div>

    <div class="mx-auto  mb-5">
        <h5 class="text-center pt-5">Website Slider Records</h5>
        <hr>
    </div>

    <div class="row mb-5">
        @foreach($websiteSliders as $websiteSlider)
            <div class="col-md-6 mb-4 mx-auto">
                <div class="card">
                    @if($websiteSlider->picture)
                        <img src="{{ asset('uploads/website_slider/' . $websiteSlider->picture) }}" class="card-img-top" alt="Image">
                    @else
                        <img src="{{ asset('path_to_default_image.jpg') }}" class="card-img-top" alt="No Image Available">
                    @endif
                    <div class="card-body p-0">
                        <div class="text-center">
                            <a href="{{ route('website.slider.edit', $websiteSlider->id) }}" class="btn btn-sm text-primary"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('website.slider.destroy', $websiteSlider->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm text-danger" onclick="return confirm('Are you sure you want to delete this record?')"><i class="fa fa-trash"></i></button>
                            </form>
                            <small class="float-right pt-2 pr-2">Slider-{{ $websiteSlider->slider_serial }}</small>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
