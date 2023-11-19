
@extends('backend.layouts.master')
@section('content')
<div class="container-fluid">
    <!-- Content Row -->
    <div class="row mt-5">
        <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
            <a class="text-decoration-none" href="{{ route('website.slider.index') }}">
                <div class="card card-hover bg-info text-white shadow">
                    <div class="card-body mx-auto">
                        <h6 class="text-center mb-0">Website Slider</h6>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
            <a class="text-decoration-none" href="{{ route('director.message.index') }}">
                <div class="card card-hover bg-info text-white shadow">
                    <div class="card-body mx-auto">
                        <h6 class="text-center mb-0">Message from the Director</h6>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
            <a class="text-decoration-none" href="{{ route('mission.vision.index') }}">
                <div class="card card-hover bg-info text-white shadow">
                    <div class="card-body mx-auto">
                        <h6 class="text-center mb-0">Mission & Vision</h6>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
            <a class="text-decoration-none" href="{{ route('research.ethics.ommittees.index') }}">
                <div class="card card-hover bg-info text-white shadow">
                    <div class="card-body mx-auto">
                        <h6 class="text-center mb-0">Research Ethics Committee</h6>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
            <a class="text-decoration-none" href="{{ route('our.team.index') }}">
                <div class="card card-hover bg-info text-white shadow">
                    <div class="card-body mx-auto">
                        <h6 class="text-center mb-0">Our Team</h6>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
            <a class="text-decoration-none" href="{{ route('resources.index') }}">
                <div class="card card-hover bg-info text-white shadow">
                    <div class="card-body mx-auto">
                        <h6 class="text-center mb-0">Resources</h6>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
            <a class="text-decoration-none" href="{{ route('collaborating.research.index') }}">
                <div class="card card-hover bg-info text-white shadow">
                    <div class="card-body mx-auto">
                        <h6 class="text-center mb-0">Collaborating Research</h6>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
            <a class="text-decoration-none" href="{{ route('source.of.publication.index') }}">
                <div class="card card-hover bg-info text-white shadow">
                    <div class="card-body mx-auto">
                        <h6 class="text-center mb-0">Source of Publications</h6>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
            <a class="text-decoration-none" href="{{ route('interdisciplinary.research.index') }}">
                <div class="card card-hover bg-info text-white shadow">
                    <div class="card-body mx-auto">
                        <h6 class="text-center mb-0">Interdisciplinary Research</h6>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
            <a class="text-decoration-none" href="{{ route('research.update.index') }}">
                <div class="card card-hover bg-info text-white shadow">
                    <div class="card-body mx-auto">
                        <h6 class="text-center mb-0">Research Update</h6>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
            <a class="text-decoration-none" href="{{ route('scopus-article') }}">
                <div class="card card-hover bg-info text-white shadow">
                    <div class="card-body mx-auto">
                        <h6 class="text-center mb-0">Scopus/ISI Article</h6>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
            <a class="text-decoration-none" href="{{ route('diu.journals.index') }}">
                <div class="card card-hover bg-info text-white shadow">
                    <div class="card-body mx-auto">
                        <h6 class="text-center mb-0">DIU Journals</h6>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
            <a class="text-decoration-none" href="{{ route('research.coordinator.index') }}">
                <div class="card card-hover bg-info text-white shadow">
                    <div class="card-body mx-auto">
                        <h6 class="text-center mb-0">Research Co-ordinator</h6>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
            <a class="text-decoration-none" href="{{ route('rankings.index') }}">
                <div class="card card-hover bg-info text-white shadow">
                    <div class="card-body mx-auto">
                        <h6 class="text-center mb-0">Rankings</h6>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
            <a class="text-decoration-none" href="{{ route('events.index') }}">
                <div class="card card-hover bg-info text-white shadow">
                    <div class="card-body mx-auto">
                        <h6 class="text-center mb-0">Events</h6>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
            <a class="text-decoration-none" href="{{ route('photos.index') }}">
                <div class="card card-hover bg-info text-white shadow">
                    <div class="card-body mx-auto">
                        <h6 class="text-center mb-0">Photo</h6>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
            <a class="text-decoration-none" href="{{ route('videos.index') }}">
                <div class="card card-hover bg-info text-white shadow">
                    <div class="card-body mx-auto">
                        <h6 class="text-center mb-0">Video</h6>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
            <a class="text-decoration-none" href="{{ route('faculty.index') }}">
                <div class="card card-hover bg-info text-white shadow">
                    <div class="card-body mx-auto">
                        <h6 class="text-center mb-0">Faculty</h6>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
            <a class="text-decoration-none" href="{{ route('department.index') }}">
                <div class="card card-hover bg-info text-white shadow">
                    <div class="card-body mx-auto">
                        <h6 class="text-center mb-0">Department</h6>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection
