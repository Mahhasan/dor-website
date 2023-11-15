<?php

namespace App\Http\Controllers;
use App\Models\WebsiteSlider;
use App\Models\DirectorMessage;
use App\Models\MissionVision;
use App\Models\ResearchEthicsCommittee;
use App\Models\OurTeam;
use App\Models\Resource;
use App\Models\CollaboratingResearch;
use App\Models\SourceOfPublication;
use App\Models\InterdisciplinaryResearch;
use App\Models\ResearchUpdate;
use App\Models\DiuJournal;
use App\Models\ResearchCoordinator;
use App\Models\Ranking;
use App\Models\Event;
use App\Models\Photo;
use App\Models\Video;
use Illuminate\Http\Request;
class FrontendController extends Controller
{
    public function index()
    {
        $websiteSliders = WebsiteSlider::orderBy('created_at', 'desc')->get();
        return view('welcome', compact('websiteSliders'));
    }

    public function directorMessage()
    {
        $directorMessages = DirectorMessage::all();
        return view('frontend.director_message', compact('directorMessages'));
    }

    public function missionVision()
    {
        $missionVisions = MissionVision::all();
        return view('frontend.mission_vision', compact('missionVisions'));
    }

    public function researchEthicsFaculty()
    {
        $faculty_name = ResearchEthicsCommittee::distinct()->pluck('faculty_name');
        return view('frontend.research_ethics_committees', compact('faculty_name'));
    }

    public function researchEthicsCommittee($faculty_name)
    {
        $researchEthicsCommittee = ResearchEthicsCommittee::where('faculty_name', $faculty_name)->get();
        return view('frontend.research_ethics_committee_details', compact('faculty_name', 'researchEthicsCommittee'));
    }

    public function ourTeam()
    {
        $ourTeams = OurTeam::all();
        $researchCoordinators = ResearchCoordinator::all();
        return view('frontend.our_team', compact('ourTeams', 'researchCoordinators'));
    }

    public function resources()
    {
        $resources = Resource::all();
        return view('frontend.resources', compact('resources'));
    }

}
