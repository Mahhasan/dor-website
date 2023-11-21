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
                    @php $serialNumber = 1; @endphp
                    @foreach($groupedCoordinators as $facultyId => $facultyCoordinators)
                        @foreach($facultyCoordinators->groupBy('department_id') as $departmentId => $departmentCoordinators)
                            @php
                                $departmentRowCount = count($departmentCoordinators);
                            @endphp
                            @foreach($departmentCoordinators as $key => $researchCoordinator)
                                <tr>
                                    <td scope="row">{{ $serialNumber++ }}</td>
                                    <td>{{ $researchCoordinator->name }}</td>
                                    <td>{{ $researchCoordinator->designation }}<br>
                                        {{ $researchCoordinator->email }}<br>
                                        {{ $researchCoordinator->cell }}
                                    </td>
                                    @if($key === 0)
                                        <td rowspan="{{ $departmentRowCount }}">{{ $researchCoordinator->departments->short_name ?? '' }}</td>
                                        <td rowspan="{{ $departmentRowCount }}">{{ $researchCoordinator->faculties->short_name ?? '' }}</td>
                                    @endif
                                </tr>
                            @endforeach
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection
