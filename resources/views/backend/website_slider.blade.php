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
            <h5>Website Slider</h5>
            @if(isset($websiteSlider))
            <h6>Edit Record</h6>
            <form method="POST" action="{{ route('website-slider.update', $websiteSlider->id) }}" enctype="multipart/form-data">
                @method('PATCH')
                @else
                <h6>Create New Record</h6>
            <form method="POST" action="{{ route('website-slider.store') }}" enctype="multipart/form-data">
                @endif
                @csrf
                <div class="row mt-5">
                    <!-- <div class="input-container col-sm-6 mb-4">
                        <input type="text" class="input" id="title" name="title" value="{{ old('title', isset($websiteSlider) ? $websiteSlider->title : '') }}" required placeholder=" "/>
                        <div class="cut"></div>
                        <label for="title" class="placeholder">Title</label>
                    </div> -->
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

    <div class="row">
        <div class="mx-auto pt-5 pb-5">
            <h5 class="text-center mb-5">Website Slider Records</h5>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <!-- <th>Title</th> -->
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($websiteSliders as $key=>$websiteSlider)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <!-- <td>{{ $websiteSlider->title }}</td> -->
                                <td>
                                    @if($websiteSlider->picture)
                                        <img src="{{ asset('uploads/website_slider/' . $websiteSlider->picture) }}" alt="Image" width="200">
                                    @else
                                        No Image Available
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('website-slider.edit', $websiteSlider->id) }}" class="btn text-primary"><i class="fas fa-edit fa-sm"></i></a>
                                    <form action="{{ route('website-slider.destroy', $websiteSlider->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn text-danger" onclick="return confirm('Are you sure you want to delete this record?')"><i class="fa fa-trash fa-sm" aria-hidden="true"></i></button>
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
@endsection