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
                </div>
                Artcile
            </div>
        </div>
        <div class="col-md-12">
            <form class="" method="post" action ="{{action('ArticleController@update', $id)}}">
            {{csrf_field()}}
                <div class="row">
                    <div class="col-md-6">
                    <input name="_method" type="hidden" value="PATCH">
                        <label for="formGroupExampleInput">Title</label>
                        <input type="hidden" class="form-control" name="user_id" value="1">
                        <input type="text" class="form-control" name="title" id="formGroupExampleInput" value="{{$article->title}}">
                    </div>
                    <div class="col-md-6">
                        <label for="formGroupExampleInput2">Abstract</label>
                        <textarea class="form-control" rows ="3" name="abstract">{{$article->abstract}}</textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="formGroupExampleInput">Keywords</label>
                        <input type="text" class="form-control" name="keywords" id="formGroupExampleInput" value="{{$article->keywords}}">
                    </div>
                    <div class="col-md-6">
                        <label for="formGroupExampleInput2">Authors</label>
                        <input type="text" class="form-control" name="authors" id="formGroupExampleInput" value="{{$article->authors}}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="formGroupExampleInput">Email</label>
                        <input type="text" class="form-control" name="email" id="formGroupExampleInput" value="{{$article->email}}">
                    </div>
                    <div class="col-md-6">
                        <label for="formGroupExampleInput2">Phone</label>
                        <input type="text" class="form-control" name="phone" id="formGroupExampleInput" value="{{$article->phone}}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="formGroupExampleInput">Journal or Conference Name</label>
                        <input type="text" class="form-control" name="journal_name" id="formGroupExampleInput" value="{{$article->journal_name}}">
                    </div>
                    <div class="col-md-6">
                        <label for="formGroupExampleInput2">Journal or Conference Link</label>
                        <input type="text" class="form-control" name="journal_link" id="formGroupExampleInput" value="{{$article->journal_link}}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="formGroupExampleInput">Publish Year</label>
                        <input type="text" class="form-control" name="publish_year" id="formGroupExampleInput" value="{{$article->publish_year}}">
                    </div>
                    <div class="col-md-6">
                        <label for="formGroupExampleInput2">Indexing</label>
                        <input type="text" class="form-control" name="indexing" id="formGroupExampleInput" value="{{$article->indexing}}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" name="submit" class="btn btn-primary pull-right">Submit</button > 
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
