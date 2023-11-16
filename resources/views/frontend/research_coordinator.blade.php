@extends('frontend.layouts.master')
@section('content')
<section class="cta">
    <div class="container">
        <div class="row">
            <h5 class="text-center mt-5 mb-5">Research Coordinator</h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Sl.</th>
                        <th scope="col">Research Coordinator</th>
                        <th scope="col">Particulars</th>
                        <th scope="col">Department</th>
                        <th scope="col">Faculty</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($researchCoordinators as $key=>$researchCoordinator)
                        <tr>
                            <th scope="row">{{ ++$key }}</th>
                            <td>{{ $researchCoordinator->name }}</td>
                            <td>{{ $researchCoordinator->designation }}<br>
                                {{ $researchCoordinator->email }}<br>
                                {{ $researchCoordinator->cell }}
                            </td>
                            <td>{{ $researchCoordinator->department }}</td>
                            <td>{{ $researchCoordinator->faculty }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection
