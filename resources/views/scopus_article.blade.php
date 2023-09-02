<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <title> Division of Research </title>


    <!-- mobile responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="{{asset('css/app.css')}}" />
    <!-- Slick Carousel -->
    <link rel="stylesheet" href="{{asset('js/slick/slick.css')}}">
    <link rel="stylesheet" href="{{asset('js/slick/slick-theme.css')}}">
    <!-- FancyBox -->
    <link rel="stylesheet" href="{{asset('js/fancybox/jquery.fancybox.min.css')}}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">

    <!-- Stylesheets -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">

    <!--Favicon-->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">

    <!--data table-->


    <link href="{{asset('css/dataTables.bootstrap.css')}}" rel="stylesheet">

    <link href="{{asset('css/dataTables.responsive.css')}}" rel="stylesheet">
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v4.0">
    </script>
</head>

<body>

    <div class="page-wrapper">
        @include('layouts.header')

        <section class="cta">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Scopus Indexed Publications
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <table width="100%" class="table table-striped table-bordered table-hover"
                                    id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Author</th>
                                            <th>Faculty</th>
                                            <th>Department</th>
                                            <th>Publication Year</th>
                                            <th>Details</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($responseBody as $row)
                                        <tr class="odd gradeX">
                                            <td>{{$row->name}}</td>
                                            <td>{{str_replace( array("="), '', $row->first_author)}}<br>
                                                @foreach($row->co_authors as $value)
                                                {{$value->name}},
                                                @endforeach

                                            </td>
                                            <td style="text-transform: uppercase;">{{$row->faculty}}</td>
                                            <td style="text-transform: uppercase;">{{$row->department}}</td>
                                            <td>{{$row->publication_year}}</td>
                                            <td><a href="/scopus-article/{{$row->id}}" target="_blank">Details</a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @extends('layouts.footer')

    </div>
    <!--data table-->



    <!--data table-->
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <!--<script src="{{asset('js/modernizr-2.6.2-respond-1.1.0.min.js')}}"></script>-->
    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <!--<script src="{{asset('js/bootstrap-select.min.js')}}"></script>-->
    <!-- Slick Slider -->
    <script src="{{asset('js/slick/slick.min.js')}}"></script>
    <!-- FancyBox -->
    <script src="{{asset('js/fancybox/jquery.fancybox.min.js')}}"></script>
    <!-- Google Map -->
    <!--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCC72vZw-6tGqFyRhhg5CkF2fqfILn2Tsw"></script>
<script src="{{asset('js/google-map/gmap.js')}}"></script>-->

    <script src="{{asset('js/validate.js')}}"></script>
    <script src="{{asset('js/wow.js')}}"></script>
    <script src="{{asset('js/jquery-ui.js')}}"></script>
    <script src="{{asset('js/script.js')}}"></script>

    <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('js/dataTables.responsive.js')}}"></script>

    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
    <!--<script src="{{asset('js/dataTables.responsive.js')}}"></script>
    <script src="{{asset('js/dataTables.responsive.js')}}"></script>-->

    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'excelHtml5',
                'pdfHtml5'
            ],

            "order": [
                [2, "desc"],
                [3, "asc"],
                [4, "desc"],
                [0, "asc"]
            ]
        });
    });
    </script>
</body>

</html>