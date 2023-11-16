@extends('frontend.layouts.master')
@section('content')
<section class="cta">
    <div class="container">
        <div class="row">
            <div class="panel panel-primary">
                <div class="panel-heading">DIU Journals</div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Sl. No</th>
                            <th scope="col">Journal Name</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($diuJournals as $key=>$diuJournal)
                            <tr>
                                <th scope="row">{{++$key}}</th>
                                <td>
                                    <p></p>
                                    <a href="{{ $diuJournal->link }}" target="_blank">{{ $diuJournal->name }}</a>
                                </td>
                                <td>
                                    <a href="{{ $diuJournal->link }}" target="_blank">
                                    @if($diuJournal->picture)
                                        <img src="{{ asset('uploads/diu_journal/' . $diuJournal->picture) }}" alt="Image" style="display: block;margin-left: auto;margin-right: auto;max-width: 300px;">
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