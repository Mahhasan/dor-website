@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                        <div>
                            <h4>Paper Details </h4>
                        </div>
                        <hr>
                        <dl class="row">
                            <dt class="col-sm-2">Title</dt>
                            <dd class="col-sm-10" style="margin-left: 135px;margin-top: -20px;">{{$articles['title']}}</dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-2">Abstract</dt>
                            <dd class="col-sm-10" style="margin-left: 135px;margin-top: -20px;"> <p style="text-align: justify"> {{$articles['abstract']}} </p></dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-2">Keywords</dt>
                            <dd class="col-sm-10" style="margin-left: 135px;margin-top: -20px;">{{$articles['keywords']}}</dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-2">Authors</dt>
                            <dd class="col-sm-10" style="margin-left: 135px;margin-top: -20px;">{{$articles['authors']}}</dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-2">Phone</dt>
                            <dd class="col-sm-10" style="margin-left: 135px;margin-top: -20px;">{{$articles['phone']}}</dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-2">Email</dt>
                            <dd class="col-sm-10" style="margin-left: 135px;margin-top: -20px;">{{$articles['email']}}</dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-2">Journal or Conference Name</dt>
                            <dd class="col-sm-10" style="margin-left: 135px;margin-top: -20px;"> <a href="{{$articles['journal_link']}}" >{{$articles['journal_name']}}</a> </dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-2">Publish Year</dt>
                            <dd class="col-sm-10" style="margin-left: 135px;margin-top: -20px;">{{$articles['publish_year']}}</dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-2">Indexing</dt>
                            <dd class="col-sm-10" style="margin-left: 135px;margin-top: -20px;">{{$articles['indexing']}}</dd>
                        </dl>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection