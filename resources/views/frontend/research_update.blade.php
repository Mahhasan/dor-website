@extends('frontend.layouts.master')
@section('content')
<section class="cta">
    <div class="container">
        <div class="row">
            @foreach($research_Updates as $researchUpdate)
                <h3 class="text-center mb-4">Research Update ({{ $researchUpdate->volume}})</h3><br>
                <iframe src="{{ asset('uploads/research_update/' . $researchUpdate->file) }}" width="100%" height="700px"></iframe>
            @endforeach
        </div>
    </div>
</section>
@endsection