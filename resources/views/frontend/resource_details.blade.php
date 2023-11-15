@extends('frontend.layouts.master')
@section('content')
<section class="cta">
    <div class="container">
		<div class="row">
			<div class="col-sm-12 col-xs-12">
				<div class="image-content">
					<div class="section-title text-center">
						<h3>{{ $resources->topic }}</h3>
					</div>
					<div class="row">
						@if(isset($resources))
                            @foreach($resources as $key=>$resource)
                                <tr>
                                    <td>
                                        @if (pathinfo($resource->document, PATHINFO_EXTENSION) == 'pdf')
											<iframe src="{{ asset('uploads/resource/' . $resource->document) }}" width="100%" height="auto"></iframe>
                                        @else
                                            <img src="{{ asset('uploads/resource/' . $resource->document) }}" alt="No Resource Available" width="100%">
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @endif
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection