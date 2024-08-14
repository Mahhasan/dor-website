@extends('backend.layouts.master')
@section('content')
<div class="container">
    <!-- Button to toggle form visibility -->
    @if(!isset($ranking))
        <button class="float-right btn btn-sm btn-primary" id="toggleForm" data-original-text="Add New Ranking">Add New Ranking</button>
    @endif
    <div class="row bg-aliceblue" id="FormContainer" style="display: {{ isset($ranking) ? 'block' : 'none' }};">
        <div class="custom-form col-md-10 mx-auto pt-5 mb-5 pb-5">
            @if(isset($ranking))
            <h6>Edit <span class="text-success font-weight-bold">{{ $ranking->title }} - {{$ranking->year}}</span></h6>
            <form method="POST" action="{{ route('rankings.update', $ranking->id) }}" enctype="multipart/form-data">
                @method('PATCH')
                @else
                <h6>Add New Ranking</h6>
            <form method="POST" action="{{ route('rankings.store') }}" enctype="multipart/form-data">
                @endif
                @csrf
                <div class="row mt-5">
                    <div class="input-container col-sm-6 mb-4">
                        <input type="text" class="input" id="title" name="title" value="{{ old('title', isset($ranking) ? $ranking->title : '') }}" required placeholder=" "/>
                        <div class="cut"></div>
                        <label for="title" class="placeholder">Title <span class="text-danger">*</span></label>
                    </div>
                    <div class="input-container col-sm-6 mb-4">
                        <select class="input" id="year" name="year" required>
                            <option value="">Select Year</option>
                            @php
                                $currentYear = date('Y');
                                $nextYear = $currentYear + 1;
                            @endphp
                            
                            @for ($i = $nextYear; $i >= ($currentYear - 40); $i--)
                                <option value="{{ $i }}" {{ old('year', isset($ranking) && $ranking->year == $i ? 'selected' : '') }}>{{ $i }}</option>
                            @endfor
                        </select>
                        <div class="cut"></div>
                        <label for="year" class="placeholder">Year <span class="text-danger">*</span></label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-container col-sm-6 mb-4">
                        <input type="url" class="input" id="link" name="link" value="{{ old('link', isset($ranking) ? $ranking->link : '') }}" required placeholder=" "/>
                        <div class="cut"></div>
                        <label for="link" class="placeholder">Website Link <span class="text-danger">*</span></label>
                    </div>
                    <div class="input-container col-sm-6 mb-4">
                        <input type="file" class="input border-0 pt-2" id="picture" name="picture" accept="image/*" {{ isset($ranking) ? '' : 'required' }}>
                        @if(isset($ranking) && $ranking->picture)
                            <div class="mr-2 mt-3 float-right">
                                <img src="{{ asset('uploads/ranking/' . $ranking->picture) }}" alt="Image" height="auto" width="150">
                            </div>
                        @endif   
                        <div class="cut"></div>
                        <label for="picture" class="placeholder">Ranking Image<small class="font-italic"> (size: 300 x 150 px)</small> <span class="text-danger">*</span></label>
                    </div>
                </div>
                @if(isset($ranking))
                    <button type="submit" class="btn btn-sm btn-primary">Save Changes</button>
                    <a href="{{ route('rankings.index') }}" class="btn btn-sm btn-secondary">Cancel</a>
                @else
                    <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                @endif
            </form>
        </div>
    </div>

    <div class="row d-block">
        <div class="mx-auto pt-5 pb-5">
            <h5 class="text-center mb-5">University Rankings</h5>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Year</th>
                            <th>Name of University Rankings</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($rankings as $key=>$ranking)
                            <tr>
                                <td>{{ $ranking->year }}</td>
                                <td><a href="{{ $ranking->link }}" target="_blank">{{ $ranking->title }}</a></td>
                                <td>
                                    @if($ranking->picture)
                                        <img src="{{ asset('uploads/ranking/' . $ranking->picture) }}" alt="{{ $ranking->title }} Image" width="150">
                                    @else
                                        No Image Available
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('rankings.edit', $ranking->id) }}" class="btn btn-sm text-primary"><i class="fas fa-edit fa-sm"></i></a>
                                    <form action="{{ route('rankings.destroy', $ranking->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm text-danger" onclick="return confirm('Are you sure you want to delete this record?')"><i class="fa fa-trash fa-sm" aria-hidden="true"></i></button>
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