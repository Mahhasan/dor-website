@extends('frontend.layouts.master')
@section('content')
<section class="cta">
    <div class="container">
        <div class="row">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Sl. No</th>
                        <th scope="col">Research Collaboration with Universities</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($collaboratingResearches))
                        @foreach($collaboratingResearches as $key=>$collaboratingResearch)
                            <tr>
                                <th scope="row">{{ ++$key }}</th>
                                <td>{{ $collaboratingResearch->institute_name }}</td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection
