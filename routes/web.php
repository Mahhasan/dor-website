<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WebsiteSliderController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\DirectorMessageController;
use App\Http\Controllers\MissionVisionController;
use App\Http\Controllers\ResearchEthicsCommitteeController;
use App\Http\Controllers\OurTeamController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\ResearchCoordinatorController;
use App\Http\Controllers\CollaboratingResearchController;
use App\Http\Controllers\SourceOfPublicationController;
use App\Http\Controllers\InterdisciplinaryResearchController;
use App\Http\Controllers\ResearchUpdateController;
use App\Http\Controllers\DiuJournalController;
use App\Http\Controllers\RankingController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\DepartmentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Frontend
Route::get('/', [FrontendController::class, 'index'])->name('welcome');
Auth::routes();

Route::get('about', [FrontendController::class, 'directorMessage'])->name('director-message');
Route::get('mission-vision', [FrontendController::class, 'missionVision'])->name('mission-vision');
Route::get('research-ethics-committee', [FrontendController::class, 'researchEthicsFaculty'])->name('research-ethics-committee');
Route::get('research-ethics-committee/{id}', [FrontendController::class, 'researchEthicsCommittee'])->name('research-ethics-committee-details');
Route::get('our-team', [FrontendController::class, 'ourTeam'])->name('our-team');
Route::get('our-team', [FrontendController::class, 'ourTeam'])->name('our-team');
Route::get('about-resources', [FrontendController::class, 'resources'])->name('about-resources');
Route::get('about-resources/{id}', [FrontendController::class, 'resourceDetails'])->name('about-resource-details');
Route::get('research-collaboration', [FrontendController::class, 'researchCollaboration'])->name('research-collaboration');
Route::get('publication-source', [FrontendController::class, 'publicationSource'])->name('publication-source');
Route::get('interdisciplinary_research', [FrontendController::class, 'interdisciplinaryResearch'])->name('interdisciplinary-research');
Route::get('interdisciplinary_research/{id}', [FrontendController::class, 'interdisciplinaryResearchDetails'])->name('interdisciplinary-research-details');
Route::get('science-discipline', [FrontendController::class, 'scienceDiscipline'])->name('science-discipline');
Route::get('science-discipline/{id}', [FrontendController::class, 'scienceDisciplineDetails'])->name('science-discipline-details');
Route::get('research-update/{id}', [FrontendController::class, 'researchUpdate'])->name('research-update');
// Data viw using API from SmartEdu repository 
Route::get('scopus-article', [DataController::class, 'scopus_article'])->name('scopus-article');
Route::get('scopus-article/{id}', [DataController::class, 'scopus_article_details'])->name('scopus-article-details');

Route::get('journals', [FrontendController::class, 'journals'])->name('journals');
Route::get('research-coordinator', [FrontendController::class, 'researchCoordinator'])->name('research-coordinator');
Route::get('ranking', [FrontendController::class, 'ranking'])->name('ranking');
Route::get('event', [FrontendController::class, 'event'])->name('event');
Route::get('event/{id}', [FrontendController::class, 'eventDetails'])->name('event-details');
Route::get('photo', [FrontendController::class, 'photo'])->name('photo');
Route::get('video', [FrontendController::class, 'video'])->name('video');

Route::get('/Policy-on-Faculty-Promotion-System-that-Recognizes-Interdisciplinary-Research', function () {return view('frontend.promotion-policy');});
Route::get('/diu-governance-meeting', function () {return view('frontend.diu-governance-meeting');});

// Backend
Route::get('home', [HomeController::class, 'index'])->name('home');
Route::resource('website_slider', WebsiteSliderController::class)->names('website.slider');
Route::resource('director_message', DirectorMessageController::class)->names('director.message');
Route::resource('mission_vision', MissionVisionController::class)->names('mission.vision');
Route::resource('research_ethics_committees', ResearchEthicsCommitteeController::class)->names('research.ethics.ommittees');
Route::resource('our_team', OurTeamController::class)->names('our.team');
Route::resource('resources', ResourceController::class)->names('resources');
Route::resource('research_coordinator', ResearchCoordinatorController::class)->names('research.coordinator');
Route::resource('collaborating_research', CollaboratingResearchController::class)->names('collaborating.research');
Route::resource('source_of_publication', SourceOfPublicationController::class)->names('source.of.publication');
Route::resource('interdisciplinary-research', InterdisciplinaryResearchController::class)->names('interdisciplinary.research');
Route::resource('research_update', ResearchUpdateController::class)->names('research.update');
Route::resource('diu_journals', DiuJournalController::class)->names('diu.journals');
Route::resource('rankings', RankingController::class)->names('rankings');
Route::resource('events', EventController::class)->names('events');
Route::resource('photos', PhotoController::class)->names('photos');
Route::resource('videos', VideoController::class)->names('videos');
Route::resource('faculty', FacultyController::class)->names('faculty');
Route::resource('department', DepartmentController::class)->names('department');
