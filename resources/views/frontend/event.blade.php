@extends('frontend.layouts.master')
@section('content')
<section class="cta">
    <div class="container">
        <div class="row">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <!--<th scope="col">Sl. No</th>-->
                        <th scope="col">Events</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($events as $key=>$event)
                        <tr>
                            <!--<th scope="row">1</th>-->
                            <td><a href="{{route('event-details', $event->id)}}" target="_blank">{{ $event->title }}</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection