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
use App\Models\Department;
use App\Models\Faculty;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $websiteSliders = WebsiteSlider::orderBy('slider_serial')->get();
        $researchUpdates = ResearchUpdate::all();
        return view('welcome', compact('websiteSliders', 'researchUpdates'));
    }

    public function directorMessage()
    {
        $directorMessages = DirectorMessage::all();
        $researchUpdates = ResearchUpdate::all();
        return view('frontend.director_message', compact('directorMessages', 'researchUpdates'));
    }

    public function missionVision()
    {
        $missionVisions = MissionVision::all();
        $researchUpdates = ResearchUpdate::all();
        return view('frontend.mission_vision', compact('missionVisions', 'researchUpdates'));
    }

    public function researchEthicsFaculty()
    {
        $faculty_name = ResearchEthicsCommittee::distinct()->pluck('faculty_name');
        $researchUpdates = ResearchUpdate::all();
        return view('frontend.research_ethics_committees', compact('faculty_name', 'researchUpdates'));
    }

    public function researchEthicsCommittee($faculty_name)
    {
        $researchEthicsCommittee = ResearchEthicsCommittee::where('faculty_name', $faculty_name)->get();
        $researchUpdates = ResearchUpdate::all();
        return view('frontend.research_ethics_committee_details', compact('faculty_name', 'researchEthicsCommittee', 'researchUpdates'));
    }

    public function ourTeam()
    {
        $ourTeams = OurTeam::all();
        $researchCoordinators = ResearchCoordinator::all();
        $researchUpdates = ResearchUpdate::all();
        return view('frontend.our_team', compact('ourTeams', 'researchCoordinators', 'researchUpdates'));
    }

    public function resources()
    {
        $resources = Resource::all();
        $researchUpdates = ResearchUpdate::all();
        return view('frontend.resources', compact('resources', 'researchUpdates'));
    }

    public function resourceDetails ($id)
    {
        $resources = Resource::where('id', $id)->get();
        $researchUpdates = ResearchUpdate::all();
        return view('frontend.resource_details', compact('id', 'resources', 'researchUpdates'));
    }

    public function researchCollaboration()
    {
        $collaboratingResearches = CollaboratingResearch::all();
        $researchUpdates = ResearchUpdate::all();
        return view('frontend.research_collaboration', compact('collaboratingResearches', 'researchUpdates'));
    }

    public function publicationSource()
    {
        $sourceOfPublications = SourceOfPublication::all();
        $researchUpdates = ResearchUpdate::all();
        return view('frontend.publication_source', compact('sourceOfPublications', 'researchUpdates'));
    }

    public function interdisciplinaryResearch()
    {
        $interdiscipline = InterdisciplinaryResearch::WHERE('discipline', 'Interdisciplinary Research')->get();
        $researchUpdates = ResearchUpdate::all();
        return view('frontend.interdisciplinary_research', compact('interdiscipline', 'researchUpdates'));
    }

    public function interdisciplinaryResearchDetails($id)
    {
        $interdiscipline = InterdisciplinaryResearch::WHERE('id', $id)->get();
        $researchUpdates = ResearchUpdate::all();
        return view('frontend.interdisciplinary_research_details', compact('id', 'interdiscipline', 'researchUpdates'));
    }

    public function scienceDiscipline()
    {
        $sciencediscipline = InterdisciplinaryResearch::WHERE('discipline', 'Science Discipline')->get();
        $researchUpdates = ResearchUpdate::all();
        return view('frontend.science_discipline', compact('sciencediscipline', 'researchUpdates'));
    }

    public function scienceDisciplineDetails($id)
    {
        $sciencediscipline = InterdisciplinaryResearch::WHERE('id', $id)->get();
        $researchUpdates = ResearchUpdate::all();
        return view('frontend.science_discipline_details', compact('id', 'sciencediscipline', 'researchUpdates'));
    }

    public function researchUpdate($id)
    {
        $research_Updates = ResearchUpdate::WHERE('id', $id)->get();
        $researchUpdates = ResearchUpdate::all();
        return view('frontend.research_update', compact('id', 'research_Updates', 'researchUpdates'));
    }

    public function journals()
    {
        $diuJournals = DiuJournal::all();
        $researchUpdates = ResearchUpdate::all();
        return view('frontend.journal', compact('diuJournals', 'researchUpdates'));
    }

    // public function researchCoordinator()
    // {
    //     $researchCoordinators = ResearchCoordinator::all();
    //     $researchUpdates = ResearchUpdate::all();
    //     return view('frontend.research_coordinator', compact('researchCoordinators', 'researchUpdates'));
    // }

    public function researchCoordinator()
    {
        $researchCoordinators = ResearchCoordinator::with('departments', 'faculties')->get();
        $groupedCoordinators = $researchCoordinators->groupBy('faculty_id');
    
        $researchUpdates = ResearchUpdate::all();
    
        return view('frontend.research_coordinator', compact('groupedCoordinators', 'researchUpdates'));
    }
    
    public function ranking()
    {
        $rankings = Ranking::all();
        $researchUpdates = ResearchUpdate::all();
        return view('frontend.ranking', compact('rankings', 'researchUpdates'));
    }

    public function event()
    {
        $events = Event::all();
        $researchUpdates = ResearchUpdate::all();
        return view('frontend.event', compact('events', 'researchUpdates'));
    }
    public function eventDetails($id)
    {
        $events = Event::WHERE('id', $id)->get();
        $researchUpdates = ResearchUpdate::all();
        return view('frontend.event_details', compact('events', 'id', 'researchUpdates'));
    }

    public function photo()
    {
        $photos = Photo::all();
        $researchUpdates = ResearchUpdate::all();
        return view('frontend.photo', compact('photos', 'researchUpdates'));
    }

    public function video()
    {
        $videos = Video::paginate(3);
        $researchUpdates = ResearchUpdate::all();
        return view('frontend.video', compact('videos', 'researchUpdates'));
    }
}
