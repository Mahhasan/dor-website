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
            <h5>Rankings</h5>
            @if(isset($ranking))
            <h6>Edit Record</h6>
            <form method="POST" action="{{ route('ranking.update', $ranking->id) }}" enctype="multipart/form-data">
                @method('PATCH')
                @else
                <h6>Create New Record</h6>
            <form method="POST" action="{{ route('ranking.store') }}" enctype="multipart/form-data">
                @endif
                @csrf
                <div class="row mt-5">
                    <div class="input-container col-sm-6 mb-4">
                        <input type="text" class="input" id="title" name="title" value="{{ old('title', isset($ranking) ? $ranking->title : '') }}" required placeholder=" "/>
                        <div class="cut"></div>
                        <label for="title" class="placeholder">Title</label>
                    </div>
                    <div class="input-container col-sm-6 mb-4">
                        <input type="number" class="input" id="year" name="year" value="{{ old('year', isset($ranking) ? $ranking->year : '') }}" required placeholder=" "/>
                        <div class="cut"></div>
                        <label for="year" class="placeholder">Year</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-container col-sm-6 mb-4">
                        <input type="url" class="input" id="link" name="link" value="{{ old('link', isset($ranking) ? $ranking->link : '') }}" required placeholder=" "/>
                        <div class="cut"></div>
                        <label for="link" class="placeholder">Link</label>
                    </div>
                    <!-- <div class="input-container col-sm-6 mb-4">
                        <input type="file" class="form-control border-0" id="picture" name="picture" accept="image/*" required>
                        @if(isset($ranking) && $ranking->picture)
                            <a href="{{ asset('uploads/ranking/' . $ranking->picture) }}" target="_blank" class="float-right">Click to see existing picture</a>
                        @endif   
                    </div> -->
                    <div class="input-container col-sm-6 mb-4">
                        <input type="file" class="form-control border-0" id="picture" name="picture" accept="image/*" {{ isset($ranking) ? '' : 'required' }}>
                        @if(isset($ranking) && $ranking->picture)
                            <a href="{{ asset('uploads/ranking/' . $ranking->picture) }}" target="_blank" class="float-right">Click to see existing picture</a>
                        @endif   
                    </div>
                </div>
                @if(isset($ranking))
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                    <a href="{{ route('ranking.index') }}" class="btn btn-danger">Cancel</a>
                @else
                    <button type="submit" class="btn btn-primary">Submit</button>
                @endif
            </form>
        </div>
    </div>

    <div class="row">
        <div class="mx-auto pt-5 pb-5">
            <h5 class="text-center mb-5">Research Coordinator Records</h5>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <!-- <th>SL</th> -->
                            <th>Year</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($rankings as $key=>$ranking)
                            <tr>
                                <!-- <td>{{ ++$key }}</td> -->
                                <td>{{ $ranking->year }}</td>
                                <td><a href="{{ $ranking->link }}" target="_blank">{{ $ranking->title }}</a></td>
                                <td>
                                    @if($ranking->picture)
                                        <img src="{{ asset('uploads/ranking/' . $ranking->picture) }}" alt="{{ $ranking->title }} Image" width="100">
                                    @else
                                        No Image Available
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('ranking.edit', $ranking->id) }}" class="btn text-primary"><i class="fas fa-edit fa-sm"></i></a>
                                    <form action="{{ route('ranking.destroy', $ranking->id) }}" method="POST" style="display: inline;">
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