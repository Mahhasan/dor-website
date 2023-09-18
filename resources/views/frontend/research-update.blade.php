@extends('frontend.layouts.master')
@section('content')
<section class="cta">
    <div class="container">
        <div class="row">
            <h3 style="text-align: center">Research Update</h3><br>
            <!--<p style="text-align: center; color: black; font-size: 20px; font-weight: bold;">The Research Update is a periodical published by the Division of Research will be available soon.</p>-->
            <iframe src="{{asset('pdf/research-update.pdf')}}" width="100%" height="700px"></iframe>
        </div><br><br><br><br><br><br><br>
    </div>
</section>
@endsection