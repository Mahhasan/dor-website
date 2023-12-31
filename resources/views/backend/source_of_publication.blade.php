@extends('backend.layouts.master')
@section('content')
<div class="container">
    <!-- Button to toggle form visibility -->
    @if(!isset($sourceOfPublication))
        <button class="float-right btn btn-sm btn-primary" id="toggleForm" data-original-text="Add Publication Source">Add Publication Source</button>
    @endif
    <div class="row bg-aliceblue" id="FormContainer" style="display: {{ isset($sourceOfPublication) ? 'block' : 'none' }};">
        <div class="custom-form col-md-10 mx-auto pt-5 mb-5 pb-5">
            @if(isset($sourceOfPublication))
            <h6>Edit Record</h6>
            <form method="POST" action="{{ route('source.of.publication.update', $sourceOfPublication->id) }}">
                @method('PATCH')
            @else
            <h6>Add Publication Source</h6>
            <form method="POST" action="{{ route('source.of.publication.store') }}">
            @endif
                @csrf
                <div class="row mt-5">
                    <div class="input-container mb-4">
                        <input type="text" class="input" id="source" name="source" value="{{ old('source', isset($sourceOfPublication) ? $sourceOfPublication->source : '') }}" required placeholder=" "/>
                        <div class="cut" style="width: 144px"></div>
                        <label for="source" class="placeholder">Source of Publication <span class="text-danger">*</span></label>
                    </div>
                </div>
                @if(isset($sourceOfPublication))
                    <button type="submit" class="btn btn-sm btn-primary">Save Changes</button>
                    <a href="{{ route('source.of.publication.index') }}" class="btn btn-sm btn-secondary">Cancel</a>
                @else
                    <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                @endif
            </form>
        </div>
    </div>

    <div class="row d-block">
        <div class="mx-auto pt-5 pb-5">
            <h5 class="text-center mb-5">Publication Source Records</h5>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Source of Publication</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if(isset($sourceOfPublications))
                        @foreach($sourceOfPublications as $key=>$sourceOfPublication)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $sourceOfPublication->source }}</td>
                                <td>
                                    <a href="{{ route('source.of.publication.edit', $sourceOfPublication->id) }}" class="btn btn-sm text-primary" title="Edit this information"><i class="fas fa-edit fa-sm"></i></a>
                                    <form action="{{ route('source.of.publication.destroy', $sourceOfPublication->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm text-danger" onclick="return confirm('Are you sure you want to delete this record?')" title="Delete this information"><i class="fa fa-trash fa-sm" aria-hidden="true"></i></button>
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