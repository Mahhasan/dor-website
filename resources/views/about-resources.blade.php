@extends('layouts.master')
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
                            <tr>
                                <th scope="row">1</th>
                                <td><a href="{{url('/decision-on-establishment-of-a-study-centre')}}" target="_blank">Decision on-Establishment of a Study Centre-The King Abdul Aziz Center for Saudi Studies</a></td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td><a href="{{url('/decision-regarding-library-uses')}}" target="_blank">Decision regarding Library uses</a></td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td><a href="{{url('/decision-on-teaching-excellence-award')}}" target="_blank">Decision on ‘Teaching Excellence Award’</a></td>
                            </tr>
                            <tr>
                                <th scope="row">4</th>
                                <td><a href="{{url('/decision-regarding-event-and-venue-of-diu')}}" target="_blank">Decision regarding Event and Venue of DIU</a></td>
                            </tr>
                            <tr>
                                <th scope="row">5</th>
                                <td><a href="{{url('/decision-regarding-report-on-semester-exam-results')}}" target="_blank">Decision regarding Report on Semester Exam results</a></td>
                            </tr>
                            <tr>
                                <th scope="row">6</th>
                                <td><a href="{{url('/decision-on-code-of-conduct-for-the-students-of-diu')}}" target="_blank">Decision on Code of conduct for the students of DIU</a></td>
                            </tr>
                            <tr>
                                <th scope="row">7</th>
                                <td><a href="{{url('/decision-regarding-separate-blc-courses-for-all-lab-classes')}}" target="_blank">Decision regarding separate BLC Courses for all lab classes</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
