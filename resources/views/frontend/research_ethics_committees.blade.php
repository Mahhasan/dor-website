@extends('frontend.layouts.master')
@section('content')
<section class="cta">
    <div class="container">
        <div class="row">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Sl. No</th>
                        <th scope="col">Faculty Name</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($faculty_name as $key=>$faculty)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td><a href="{{ route('research-ethics-committee-details', $faculty) }}">{{ $faculty }}</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection
