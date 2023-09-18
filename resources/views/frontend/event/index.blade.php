@extends('frontend.layouts.master')
@section('content')
<section class="cta">
    <div class="container">
        <div class="row">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <!--<th scope="col">Sl. No</th>-->
                        <th scope="col">Events</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <!--<th scope="row">1</th>-->
                        <td><a href="{{url('/event/fifteen')}}" target="_blank">workshop on "Patent Filing and Application"</a></td>
                    </tr>
                    <tr>
                        <!--<th scope="row">1</th>-->
                        <td><a href="{{url('/event/research-award-giving-ceremony-2023')}}" target="_blank">Research Award Giving Ceremony 2023</a></td>
                    </tr>
                    <tr>
                        <!--<th scope="row">1</th>-->
                        <td><a href="{{url('/event/seven')}}" target="_blank">Launching Ceremony of Research Update-2022</a></td>
                    </tr>
                    <tr>
                        <!--<th scope="row">2</th>-->
                        <td><a href="{{url('/event/six')}}" target="_blank">Research Award Giving Ceremony-2022</a></td>
                    </tr>
                    <tr>
                        <!--<th scope="row">3</th>-->
                        <td><a href="{{url('/event/eight')}}" target="_blank">Meeting with Research Coordinators</a></td>
                    </tr>
                    <tr>
                        <!--<th scope="row">4</th>-->
                        <td><a href="{{url('/event/nine')}}" target="_blank">Webinar on: Students' Engagement and Opportunities in Research & Publications at DIU</a></td>
                    </tr
                    ><tr>
                        <!--<th scope="row">5</th>-->
                        <td><a href="{{url('/event/ten')}}" target="_blank">Webinar on: Research Ethics & Plagiarism and Google Scholar Profile</a></td>
                    </tr>
                    <tr>
                        <!--<th scope="row">6</th>-->
                        <td><a href="{{url('/event/eleven')}}" target="_blank">Workshop on Quantitative Research: Data Analysis and Interpretation using SPSS</a></td>
                    </tr>
                    <tr>
                        <!--<th scope="row">7</th>-->
                        <td><a href="{{url('/event/twelve')}}" target="_blank">Workshop on "Qualitative Paradigm: Data Collection Methods and Data Analysis</a></td>
                    </tr>
                    <tr>
                        <!--<th scope="row">8</th>-->
                        <td><a href="{{url('/event/thirteen')}}" target="_blank">Workshop on "Qualitative Research Methods: Problem Identification & Critical Literature Review</a></td>
                    </tr>
                    <tr>
                        <!--<th scope="row">9</th>-->
                        <td><a href="{{url('/event/fourteen')}}" target="_blank">Workshop on Enhancement of Research among the faculty members of GED</a></td>
                    </tr>
                    <!----------------->
                    <tr>
                        <!--<th scope="row">10</th>-->
                        <td><a href="{{url('/event/one')}}" target="_blank"> Workshop on the "Use of Scopus and ScienceDirect, and Bibliographic Management System Mendeley for Research and Publications" held at DIU </a></td>
                    </tr>
                    <tr>
                        <!--<th scope="row">11</th>-->
                        <td><a href="{{url('/event/two')}}" target="_blank">Workshop with Research Coordinators on Research Plan of Fall Semester-2018</a></td>
                    </tr>
                    <tr>
                        <!--<th scope="row">12</th>-->
                        <td><a href="{{url('/event/three')}}" target="_blank"> Workshop on Building a Sustainable Research Culture at the Entity Level of Daffodil International University </a></td>
                    </tr>
                    <tr>
                        <!--<th scope="row">13</th>-->
                        <td><a href="{{url('/event/four')}}" target="_blank"> Research Division of DIU organized workshop on “Formalizing Research Culture at DIU” </a></td>
                    </tr>
                    <tr>
                        <!--<th scope="row">14</th>-->
                        <td><a href="{{url('/event/five')}}" target="_blank"> Author Workshop on ‘Writing a Great Paper and Getting It Published in Research Journal’ held at DIU </a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection