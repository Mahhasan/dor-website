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
                    You are logged in!
					<?php $i=1; ?>
					<div class="panel-heading"><a href="{{ url('/article/create') }}">Create Article</a></div>
                    <table class="table table-striped" id="dtBasicExample">
						<thead>
							<tr>
								<th>SL No,</th>
								<th>Title</th>
								<th>Authors</th>
								<th>Publish year</th>
								<th>Details</th>
								<th>Edit</th>
								<th>Delete</th>
							</tr>
						</thead>
						<tbody>
						@foreach($articles as $row)
							<tr>
								<td><?php echo $i++; ?> </td>
								<td>{{$row['title']}}</td>
								<td>{{$row['authors']}}</td>
								<td>{{$row['publish_year']}}</td>
								<td><a href="{{action('ArticleController@details', $row['id'])}}">Details</a></td>
								<td><a href="{{action('ArticleController@edit', $row['id'])}}" type="button" onclick="return confirm('Are you sure?')">Edit</a></td>
								<td>
								<form action="{{action('ArticleController@destroy', $row['id'])}}" method="post">
								{{csrf_field()}}
							<input name="_method" type="hidden" value="DELETE">
								<button class="btn" type="submit" onclick="return confirm('Are you sure?')">Delete</button>
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
</div>
@endsection
