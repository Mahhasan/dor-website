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
            <h5>Diu Journal</h5>
            @if(isset($diuJournal))
            <h6>Edit Record</h6>
            <form method="POST" action="{{ route('diu-journals.update', $diuJournal->id) }}" enctype="multipart/form-data">
                @method('PATCH')
                @else
                <h6>Create New Record</h6>
            <form method="POST" action="{{ route('diu-journals.store') }}" enctype="multipart/form-data">
                @endif
                @csrf
                <div class="row mt-5">
                    <div class="input-container col-sm-6 mb-4">
                        <input type="text" class="input" id="name" name="name" value="{{ old('name', isset($diuJournal) ? $diuJournal->name : '') }}" required placeholder=" "/>
                        <div class="cut"></div>
                        <label for="name" class="placeholder">Name</label>
                    </div>
                    <div class="input-container col-sm-6 mb-4">
                        <input type="url" class="input" id="link" name="link" value="{{ old('link', isset($diuJournal) ? $diuJournal->link : '') }}" required placeholder=" "/>
                        <div class="cut"></div>
                        <label for="link" class="placeholder">Link</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-container col-sm-12 mb-4">
                        <input type="file" class="form-control border-0" id="picture" name="picture" accept="image/*" {{ isset($diuJournal) ? '' : 'required' }}>
                        @if(isset($diuJournal) && $diuJournal->picture)
                            <a href="{{ asset('uploads/diu_journal/' . $diuJournal->picture) }}" target="_blank" class="float-right">Click to see existing picture</a>
                        @endif   
                    </div>
                </div>
                @if(isset($diuJournal))
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                    <a href="{{ route('diu-journals.index') }}" class="btn btn-danger">Cancel</a>
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
                            <th>SL</th>
                            <th>name</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($diuJournals as $key=>$diuJournal)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td><a href="{{ $diuJournal->link }}" target="_blank">{{ $diuJournal->name }}</a></td>
                                <td>
                                    @if($diuJournal->picture)
                                        <img src="{{ asset('uploads/diu_journal/' . $diuJournal->picture) }}" alt="{{ $diuJournal->name }} Image" width="100">
                                    @else
                                        No Image Available
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('diu-journals.edit', $diuJournal->id) }}" class="btn text-primary"><i class="fas fa-edit fa-sm"></i></a>
                                    <form action="{{ route('diu-journals.destroy', $diuJournal->id) }}" method="POST" style="display: inline;">
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