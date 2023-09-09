@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">Dashboard</div>
            <div class="panel-body">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                You are logged in!
                <div class="panel-heading"><a href="{{ url('article') }}">View Article</a></div>
                <div class="panel-heading"><a href="{{ url('/article/create') }}">Create Article</a></div>
            </div>
        </div>
    </div>
</div>
@endsection
