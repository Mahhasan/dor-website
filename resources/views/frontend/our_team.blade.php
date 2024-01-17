@extends('frontend.layouts.master')
@section('content')
<section class="cta">
    <div class="container">
        <h3 class="text-center">Our <span>Team</span></h3>
        <hr>
        <p class="text-center"><span>Division of Research</span></p>
        @for ($level = 1; $level <= 8; $level++)
            @if ($ourTeams->where('level', $level)->count() > 0)
                <div class="row justify-content-center mb-2">
                    @foreach($ourTeams->where('level', $level) as $ourTeam)
                        <div class="col-10 col-md-3 user">
                            <div class="team-person">
                                @if($ourTeam->picture)
                                    <img src="{{ asset('uploads/our_team/' . $ourTeam->picture) }}" class="mx-auto" alt="">
                                @else
                                    <img src="{{ asset('frontend/images/path_to_default_image.jpg') }}" class="mx-auto" alt="">
                                @endif
                                <h6>{{ $ourTeam->name }}</h6>
                                <h6>{{ $ourTeam->designation }}, 
                                    @if($ourTeam->department)
                                        {{ $ourTeam->department }},
                                    @endif 
                                    {{ $ourTeam->faculties->short_name ?? '' }}</h6>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        @endfor
        <hr>

        <div class="row justify-content-center">
            <p class="text-center mb-4"><span>Discipline Wise Research Coordinator</span></p>
            <!-- This section will be deleted -->
            <div class="col-10 col-sm-6 col-lg-4 col-xl-3 user_one">
                <div class="team-person">
                    <img src="images/team/bikash-swe.jpeg" alt="..." class="mx-auto">
                    <h6>Ms. Bikash Kumar Paul</h6>
                    <h6>Research Mentor</h6>
                </div>
            </div>
            <!-- end section -->
            @foreach($researchCoordinators as $key=>$researchCoordinator)
                <div class="col-10 col-sm-6 col-lg-4 col-xl-3 user_one">
                    <div class="team-person">
                        @if($researchCoordinator->picture)
                            <img src="{{ asset('uploads/research_coordinator/' . $researchCoordinator->picture) }}" class="mx-auto" alt="">
                        @else
                            No Image Available
                        @endif
                        <h6>{{ $researchCoordinator->name }}</h6>
                        <h6>{{ $researchCoordinator->designation }}, {{ $researchCoordinator->departments->short_name ?? '' }}</h6>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section> 
@endsection