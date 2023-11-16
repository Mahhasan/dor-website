@extends('frontend.layouts.master')
@section('content')
<section class="cta">
    <div class="container">
        <div class="row">
            <div class="col-md-9" style="float:none;margin:auto;">
                <h3 class="mb-5 text-center" style="margin-bottom:32px;">Physical facilities of DIU for Interdisciplinary Research Teams Amongst Science Disciplines</h3>
                <div class="embed-responsive embed-responsive-16by9" style="margin-bottom: 32px;" >
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/u1o8Or8zbfw" width="200" height="200"  allowfullscreen></iframe>
                </div>
            </div>
        </div>
        <div class="row" >
            <div class="col-md-9" style="float:none;margin:auto;">
                <div class="panel panel-primary">
                    <div class="panel-heading">Science Discipline</div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Lab Name</th> 
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sciencediscipline as $key=>$discipline)
                                <tr>
                                    <td>
                                        @if($discipline->link)
                                            <a href="{{ $discipline->link }}" target="_blank">{{ $discipline->lab_name }}</a>
                                        @else
                                            <a href="{{ route('science-discipline-details', $discipline->id) }}" target="_blank">{{ $discipline->lab_name }}</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--<div class="text-center">-->
        <!--    <a href="/Policy-on-Faculty-Promotion-System-that-Recognizes-Interdisciplinary-Research" target="_blank"><button type="button" class="btn btn-primary" ><i class="fa fa-hand-pointer-o" aria-hidden="true"></i> Policy on Faculty Promotion System that Recognizes Interdisciplinary Research</button></a>-->
        <!--</div>-->

    </div>
</section> 
@endsection
