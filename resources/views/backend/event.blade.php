@extends('backend.layouts.master')
@section('content')
<div class="container">
    <div class="row bg-aliceblue">
        <div class="custom-form col-md-10 mx-auto pt-5 pb-5">
            <h5>Event</h5>
            @if(isset($event))
            <h6>Edit Record</h6>
            <form method="POST" action="{{ route('events.update', $event->id) }}" enctype="multipart/form-data">
                @method('PATCH')
                @else
                <h6>Create New Record</h6>
            <form method="POST" action="{{ route('events.store') }}" enctype="multipart/form-data">
                @endif
                @csrf
                <div class="row mt-5">
                    <div class="input-container col-sm-12 mb-4">
                        <input type="text" class="input" id="title" name="title" value="{{ old('title', isset($event) ? $event->title : '') }}" required placeholder=" "/>
                        <div class="cut"></div>
                        <label for="title" class="placeholder">Event Title</label>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-12 mb-4">
                    <textarea class="input" id="file-picker" name="event_details" value="{{ old('event_details', isset($event) ? $event->event_details : '') }}" placeholder=" ">{{ old('event_details', isset($event) ? $event->event_details : '') }}</textarea>
                    <div class="cut"></div>
                    <label for="event_details" class="placeholder">Event Details</label>    
                </div>
                </div>
                @if(isset($event))
                    <button type="submit" class="btn btn-sm btn-primary">Save Changes</button>
                    <a href="{{ route('events.index') }}" class="btn btn-sm btn-secondary">Cancel</a>
                @else
                    <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                @endif
            </form>
        </div>
    </div>

    <div class="row">
        <div class="mx-auto pt-5 pb-5">
            <h5 class="text-center mb-5">Events</h5>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Event Title</th>
                            <th>Event Details</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($events as $key=>$event)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <!-- <td>{{ $event->year }}</td> -->
                                <td>{{ $event->title }}</td>
                                <td>{!! $event->event_details !!}</td>
                                <td>
                                    <a href="{{ route('events.edit', $event->id) }}" class="btn btn-sm text-primary"><i class="fas fa-edit fa-sm"></i></a>
                                    <form action="{{ route('events.destroy', $event->id) }}" method="POST" style="display: inline;">
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