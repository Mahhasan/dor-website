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
                    <tr>
                        <th scope="row">1</th>
                        <td><a href="{{url('/research-ethics-committee-fsit')}}" target="_blank">FSIT Research Ethics Committee</a></td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td><a href="{{url('research-ethics-committee-fbe')}}" target="_blank">FBE Research Ethics Committee</a></td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td><a href="#">FAHS Research Ethics Committee</a></td>
                    </tr>
                    <tr>
                        <th scope="row">4</th>
                        <td><a href="{{url('/research-ethics-committee-fe')}}" target="_blank">FE Research Ethics Committee</a></td>
                    </tr>
                    <tr>
                        <th scope="row">5</th>
                        <td><a href="{{url('/research-ethics-committee-fhss')}}" target="_blank">FHSS Research Ethics Committee</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection
