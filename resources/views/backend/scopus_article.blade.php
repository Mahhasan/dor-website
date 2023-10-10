@extends('backend.layouts.master')
@section('content')
<!-- Include jQuery -->

<div class="container">
    <div class="row">
        <div class="mx-auto pt-5 pb-5">
            <h5 class="text-center mb-5">Scopus Indexed Publications</h5><hr>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Faculty</th>
                            <th>Department</th>
                            <th>Year</th>
                            <th>Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($responseBody as $row)
                        <tr class="odd gradeX">
                            <td>{{$row->name}}</td>
                            <td>{{str_replace( array("="), '', $row->first_author)}}<br>
                                @foreach($row->co_authors as $value)
                                {{$value->name}},
                                @endforeach

                            </td>
                            <td style="text-transform: uppercase;">{{$row->faculty}}</td>
                            <td style="text-transform: uppercase;">{{$row->department}}</td>
                            <td>{{$row->publication_year}}</td>
                            <td><a href="/scopus_article/{{$row->id}}" target="_blank">Details</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
 

@endsection