@extends('frontend.layouts.master')
@section('content')
<section class="cta">
    <div class="container">
        <div class="row">
            @foreach($events as $key=>$event)
                <div class="panel panel-primary">
                    <div class="panel-heading" style="font-family:Century Gothic;"><b>{{ $event->title }} - {{ $event->year }}</b></div>
                    <div class="panel-body">{!! $event->event_details !!}</div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection