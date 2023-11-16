@extends('frontend.layouts.master')
@section('content')
<section class="cta">
    <div class="container">
        <div class="row">
            <div class="panel panel-primary">
                <div class="panel-heading">Rankings</div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Year</th>
                            <th scope="col">Name of University Rankings</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($rankings as $key=>$ranking)
                            <tr>
                                <th scope="row">{{ $ranking->year }}</th>
                                <td>
                                    <a href="{{ $ranking->link }}" target="_blank">{{ $ranking->title }}</a>
                                </td>
                                <td>
                                    <a href="{{ $ranking->link }}" target="_blank">
                                        @if($ranking->picture)
                                            <img src="{{ asset('uploads/ranking/' . $ranking->picture) }}" style="display: block;margin-left: auto;margin-right: auto;max-width: 350px; max-height: 120px;">
                                        @else
                                            No Image Available
                                        @endif
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
		</div>
    </div>
</section> 
@endsection
