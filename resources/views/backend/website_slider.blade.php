@extends('backend.layouts.master')
@section('content')
<div class="container">
    <div class="row bg-aliceblue">
        <div class="custom-form col-md-10 mx-auto pt-5 pb-5">
            <h5>Website Slider</h5>

            @if(isset($websiteSlider))
                <h6>Edit Slider Image</h6>
                <form method="POST" action="{{ route('website-slider.update', $websiteSlider->id) }}" enctype="multipart/form-data">
                @method('PATCH')

            @else
                <h6>Create New Slider Image</h6>
                <form method="POST" action="{{ route('website-slider.store') }}" enctype="multipart/form-data">
            @endif
                @csrf
                <div class="row mt-5">
                    <div class="input-container col-sm-12 mb-4">
                        <input type="file" class="form-control border-0" id="picture" name="picture" accept="image/*" {{ isset($websiteSlider) ? '' : 'required' }}>
                        @if(isset($websiteSlider) && $websiteSlider->picture)
                            <div class="mr-2 mt-3 float-right">
                                <img src="{{ asset('uploads/website_slider/' . $websiteSlider->picture) }}" alt="Image" height="auto" width="200">
                            </div>
                        @endif   
                    </div>
                </div>
                @if(isset($websiteSlider))
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                    <a href="{{ route('website-slider.index') }}" class="btn btn-danger">Cancel</a>
                @else
                    <button type="submit" class="btn btn-primary">Submit</button>
                @endif
            </form>
        </div>
    </div>

    <div class="mx-auto mt-5 mb-5">
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
                    <div class="card-body">
                        <div class="text-center">
                            <a href="{{ route('website-slider.edit', $websiteSlider->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i> Edit</a>
                            <form action="{{ route('website-slider.destroy', $websiteSlider->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this record?')"><i class="fa fa-trash"></i> Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection