@extends('frontend.layouts.master')
@section('content')
<section class="cta" style="margin-bottom: 180px">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Sl.No</th>
                                <th scope="col">Topic</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($resources))
                                @foreach($resources as $key=>$resource)
                                    <tr>
                                        <th scope="row">1</th>
                                        <td><a href="{{route('about-resources')}}" target="_blank">{{ $resource->topic }}</a></td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
