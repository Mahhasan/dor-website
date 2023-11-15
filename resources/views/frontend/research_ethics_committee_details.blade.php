@extends('frontend.layouts.master')
@section('content')
<section class="cta">
    <div class="container">
        <div class="row">
            <h3 class="text-center mb-3">{{ $faculty_name }}</h3>
            @if($researchEthicsCommittee->isNotEmpty())
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Sl. No</th>
                            <th scope="col">Name & Designation</th>
                            <th scope="col">Position</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($researchEthicsCommittee as $key => $committee)
                            <tr>
                                <th scope="row">{{ ++$key }}</th>
                                <td>{{ $committee->name }}, {{ $committee->designation }}</td>
                                <td>{{ $committee->position }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>No data available</p>
            @endif
        </div>
    </div>
</section>
@endsection
