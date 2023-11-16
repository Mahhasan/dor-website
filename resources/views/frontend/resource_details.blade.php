@extends('frontend.layouts.master')
@section('content')
<section class="cta">
    <div class="container">
		<div class="row">
			<div class="col-sm-12 col-xs-12">
				<div class="image-content">
					@if(isset($resources))
						@foreach($resources as $key=>$resource)
							<div class="section-title text-center mb-4">
								<h3>{{ $resource->topic }}</h3>
							</div>
							<div class="row">
								@if (pathinfo($resource->document, PATHINFO_EXTENSION) == 'pdf')
									<iframe src="{{ asset('uploads/resource/' . $resource->document) }}" width="100%" height="700"></iframe>
								@else
									<img src="{{ asset('uploads/resource/' . $resource->document) }}" alt="No Resource Available" width="100%">
								@endif
							</div>
						@endforeach
					@endif
				</div>
			</div>
		</div>
	</div>
</section>
@endsection