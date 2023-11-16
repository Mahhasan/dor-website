@extends('frontend.layouts.master')
@section('content')
<section class="cta">
    <div class="container">
        <div class="row">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Sl. No</th>
                        <th scope="col">Source</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($sourceOfPublications))
                        @foreach($sourceOfPublications as $key=>$sourceOfPublication)
                            <tr>
                                <th scope="row">{{ ++$key }}</th>
                                <td>{{ $sourceOfPublication->source }}</td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection
