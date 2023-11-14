@extends('backend.layouts.master')
@section('content')
<div class="container">
    <!-- Button to toggle form visibility -->
    @if(!isset($diuJournal))
        <button class="float-right btn btn-sm btn-primary" id="toggleForm" data-original-text="Add New Journal">Add New Journal</button>
    @endif
    <div class="row bg-aliceblue" id="FormContainer" style="display: {{ isset($diuJournal) ? 'block' : 'none' }};">
        <div class="custom-form col-md-10 mx-auto pt-5 mb-5 pb-5">
            @if(isset($diuJournal))
            <h6>Edit <span class="text-success font-weight-bold">{{ $diuJournal->name }}'s</span> Record</h6>
            <form method="POST" action="{{ route('diu-journals.update', $diuJournal->id) }}" enctype="multipart/form-data">
                @method('PATCH')
                @else
                <h6>Add New Journal</h6>
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
                        <label for="link" class="placeholder">Website Link</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-container col-sm-12 mb-4">
                        <input type="file" class="input border-0 pt-2" id="picture" name="picture" accept="image/*" {{ isset($diuJournal) ? '' : 'required' }} placeholder=" ">
                        @if(isset($diuJournal) && $diuJournal->picture)
                            <div class="mr-2 mt-3 float-right">
                                <img src="{{ asset('uploads/diu_journal/' . $diuJournal->picture) }}" alt="Image" height="auto" width="300">
                            </div>
                        @endif   
                        <div class="cut"></div>
                        <label for="picture" class="placeholder">Journal Banner<small class="font-italic"> (size: 300 x 150 px)</small></label>
                    </div>
                </div>
                @if(isset($diuJournal))
                    <button type="submit" class="btn btn-sm btn-primary">Save Changes</button>
                    <a href="{{ route('diu-journals.index') }}" class="btn btn-sm btn-secondary">Cancel</a>
                @else
                    <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                @endif
            </form>
        </div>
    </div>

    <div class="mx-auto mt-5 mb-5">
        <h5 class="text-center pt-5">DIU Journals</h5>
        <hr>
    </div>

    <div class="row mb-5">
        @foreach($diuJournals as $diuJournal)
            <div class="col-md-6 mb-4 mx-auto">
                <div class="card">
                    @if($diuJournal->picture)
                        <img src="{{ asset('uploads/diu_journal/' . $diuJournal->picture) }}" alt="{{ $diuJournal->name }} Image">
                    @else
                        No Image Available
                    @endif
                    <a href="{{ $diuJournal->link }}" target="_blank" class="text-center p-2">{{ $diuJournal->name }}</a>
                    <div class="card-body p-0">
                        <div class="text-center">
                            <a href="{{ route('diu-journals.edit', $diuJournal->id) }}" class="btn btn-sm text-primary"><i class="fas fa-edit fa-sm"></i></a>
                            <form action="{{ route('diu-journals.destroy', $diuJournal->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm text-danger" onclick="return confirm('Are you sure you want to delete this record?')"><i class="fa fa-trash fa-sm" aria-hidden="true"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection