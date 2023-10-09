@extends('backend.layouts.master')
@section('content')
<section class="cta">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Scopus Indexed Publications
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div>
                            <h4>Paper Details </h4>
                        </div>
                        <hr>
                        <dl class="row">
                            <dt class="col-sm-2">Title</dt>
                            <dd class="col-sm-10" style="margin-left: 135px;margin-top: -20px;">
                                {{$responseBody->name}}</dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-2">Author</dt>
                            <dd class="col-sm-10" style="margin-left: 135px;margin-top: -20px;">
                                {{str_replace( array("="), '', $responseBody->first_author)}},
                                @foreach($responseBody->co_authors as $value)
                                {{$value->name}},
                                @endforeach
                            </dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-2">Email</dt>
                            <dd class="col-sm-10" style="margin-left: 135px;margin-top: -20px;">
                                {{$responseBody->email}}</dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-2">Abstract</dt>
                            <dd class="col-sm-10"
                                style="margin-left: 135px;margin-top: -20px;text-align:justify;">
                                {!!$responseBody->abstract!!}</dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-2">Keywords</dt>
                            <dd class="col-sm-10" style="margin-left: 135px;margin-top: -20px;">
                                {{str_replace( array(".>"), '', $responseBody->keywords)}}</dd>
                        </dl>


                        <dl class="row">
                            <dt class="col-sm-2">Journal or Conference Name</dt>
                            <dd class="col-sm-10" style="margin-left: 135px;margin-top: -20px;"> <a
                                    href="{{$responseBody->cj_link}}">{{str_replace( array("@","#"), '', $responseBody->cj_name)}}</a>
                            </dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-2">Publication Year</dt>
                            <dd class="col-sm-10" style="margin-left: 135px;margin-top: -20px;">
                                {{$responseBody->publication_year}}</dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-2">Indexing</dt>
                            <dd class="col-sm-10" style="margin-left: 135px;margin-top: -20px;">
                                {{$responseBody->indexed}}</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection