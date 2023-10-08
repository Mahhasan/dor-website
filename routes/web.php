<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebsiteSliderController;
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

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Data viw using API from SmartEdu repository 
Route::get('/scopus-article', [App\Http\Controllers\DataController::class, 'scopus_article']);
Route::get('/scopus-article/{id}', [App\Http\Controllers\DataController::class, 'scopus_article_details']);

Route::get('/research-coordinator', function () {
    return view('frontend.research-coordinator');
});
Route::get('/ranking', function () {
    return view('frontend.ranking');
});
Route::get('/about', function () {
    return view('frontend.about');
});
Route::get('/photo', function () {
    return view('frontend.photo');
});
Route::get('/our-team', function () {
    return view('frontend.our-team');
});
Route::get('/journals',function(){
   return view('frontend.journal'); 
});
Route::get('/video', function(){
    return view('frontend.video');
});
Route::get('/research-collaboration', function () {
    return view('frontend.research-collaboration');
});
Route::get('/publication-source', function () {
    return view('frontend.publication-source');
});
Route::get('/mission-vision', function () {
    return view('frontend.mission-vision');
});
Route::get('/contact', function () {
    return view('frontend.contact');
});
Route::get('/event', function () {
    return view('frontend.event.index');
});
Route::get('/event/one', function () {
    return view('frontend.event.one');
});
Route::get('/event/two', function () {
    return view('frontend.event.two');
});
Route::get('/event/three', function () {
    return view('frontend.event.three');
});
Route::get('/event/four', function () {
    return view('frontend.event.four');
});
Route::get('/event/five', function () {
    return view('frontend.event.five');
});
Route::get('/event/six', function () {
    return view('frontend.event.six');
});
Route::get('/event/seven', function () {
    return view('frontend.event.seven');
});
Route::get('/event/eight', function () {
    return view('frontend.event.eight');
});
Route::get('/event/nine', function () {
    return view('frontend.event.nine');
});
Route::get('/event/ten', function () {
    return view('frontend.event.ten');
});
Route::get('/event/eleven', function () {
    return view('frontend.event.eleven');
});
Route::get('/event/twelve', function () {
    return view('frontend.event.twelve');
});
Route::get('/event/thirteen', function () {
    return view('frontend.event.thirteen');
});
Route::get('/event/fourteen', function () {
    return view('frontend.event.fourteen');
});
Route::get('/event/fifteen', function () {
    return view('frontend.event.fifteen');
});
Route::get('/event/research-award-giving-ceremony-2023', function () {
    return view('frontend.event.research-award-giving-ceremony-2023');
});
Route::get('/project/one', function (){
    return view('frontend.project.one');
});
Route::get('/project/two', function (){
    return view('frontend.project.two');
});

Route::get('/research-ethics-committee-fsit', function () {
    return view('frontend.research-ethics-committee-fsit');
});
Route::get('/research-ethics-committee-fbe', function () {
    return view('frontend.research-ethics-committee-fbe');
});
Route::get('/research-ethics-committee-fe', function () {
    return view('frontend.research-ethics-committee-fe');
});
Route::get('/research-ethics-committee-fhss', function () {
    return view('frontend.research-ethics-committee-fhss');
});
Route::get('/about-resources', function () {
    return view('frontend.about-resources');
});
Route::get('/diu-governance-meeting', function () {
    return view('frontend.diu-governance-meeting');
});
Route::get('/research-update', function () {
    return view('frontend.research-update');
});


// Interdisciplinary Research 

// subheading

Route::get('/interdisciplinary_research', function () {
    return view('frontend.interdisciplinary_research');
});
Route::get('/science-discipline', function () {
    return view('frontend.science-discipline');
});
Route::get('/Policy-on-Faculty-Promotion-System-that-Recognizes-Interdisciplinary-Research', function () {
    return view('frontend.promotion-policy');
});


// Department wise lab

Route::get('/fabrication-lab', function () {
    return view('frontend.cse.fabrication-lab');
});
Route::get('/computer-programming-lab', function () {
    return view('frontend.cse.computer-programming-lab');
});
Route::get('/iot-lab', function () {
    return view('frontend.cse.iot-lab');
});
Route::get('/erasmus-lab', function () {
    return view('frontend.others.erasmus-lab');
});
Route::get('/robotics-lab', function () {
    return view('frontend.swe.robotics-lab');
});
Route::get('/data-science-lab', function () {
    return view('frontend.swe.data-science-lab');
});
Route::get('/cyber-security-lab', function () {
    return view('frontend.swe.cyber-security-lab');
});
Route::get('/nasa-space-apps-research', function () {
    return view('frontend.others.nasa-space-apps-research');
});
Route::get('/3d-animation-lab', function () {
    return view('frontend.mct.3d-animation-lab');
});
Route::get('/professional-development-lab', function () {
    return view('frontend.mct.professional-development-lab');
});
Route::get('/health-informatics-research-lab', function () {
    return view('frontend.others.health-informatics-research-lab');
});
Route::get('/chemistry-lab', function () {
    return view('frontend.ged.chemistry-lab');
});
Route::get('/physics-lab', function () {
    return view('frontend.ged.physics-lab');
});
Route::get('/diu-data-center', function () {
    return view('frontend.others.diu-data-center');
});
Route::get('/esdm-laboratory', function () {
    return view('frontend.esdm.esdm-laboratory');
});
Route::get('/itm-lab', function () {
    return view('frontend.itm.itm-lab');
});
Route::get('/marketing-lab', function () {
    return view('frontend.ba.marketing-lab');
});
Route::get('/e-business-lab', function () {
    return view('frontend.bs.e-business-lab');
});
Route::get('/food-and-beverage-service-lab', function () {
    return view('frontend.thm.food-and-beverage-service-lab');
});
Route::get('/daffodil-innovation-lab', function () {
    return view('frontend.ie.daffodil-innovation-lab');
});
Route::get('/english-language-lab', function () {
    return view('frontend.english.english-language-lab');
});
Route::get('/moot-court', function () {
    return view('frontend.law.moot-court');
});
Route::get('/jmc-media-lab', function () {
    return view('frontend.jmc.jmc-media-lab');
});
Route::get('/microprocessor-and-interfacing-lab', function () {
    return view('frontend.ice.microprocessor-and-interfacing-lab');
});


Route::get('/electrical-circuit-lab', function () {
    return view('frontend.ice.electrical-circuit-lab');
});
Route::get('/computer-lab-ete', function () {
    return view('frontend.ice.computer-lab-ete');
});
Route::get('/apparel-manufacturing-lab', function () {
    return view('frontend.te.apparel-manufacturing-lab');
});
Route::get('/fabric-manufacturing-lab-knitting', function () {
    return view('frontend.te.fabric-manufacturing-lab-knitting');
});
Route::get('/fabric-manufacturing-lab-weaving', function () {
    return view('frontend.te.fabric-manufacturing-lab-weaving');
});
Route::get('/mechanical-engineering-lab', function () {
    return view('frontend.te.mechanical-engineering-lab');
});
Route::get('/textile-testing-and-quality-control-lab', function () {
    return view('frontend.te.textile-testing-and-quality-control-lab');
});
Route::get('/wet-processing-lab', function () {
    return view('frontend.te.wet-processing-lab');
});
Route::get('/yarn-manufacturing-lab', function () {
    return view('frontend.te.yarn-manufacturing-lab');
});
Route::get('/communication-engineering', function () {
    return view('frontend.eee.communication-engineering');
});


Route::get('/digital-signal-processing-laboratory', function () {
    return view('frontend.eee.digital-signal-processing-laboratory');
});
Route::get('/electrical-circuit-laboratory', function () {
    return view('frontend.eee.electrical-circuit-laboratory');
});
Route::get('/electronics-laboratory', function () {
    return view('frontend.eee.electronics-laboratory');
});
Route::get('/energy-conversion-laboratory', function () {
    return view('frontend.eee.energy-conversion-laboratory');
});
Route::get('/power-electronics-laboratory', function () {
    return view('frontend.eee.power-electronics-laboratory');
});
Route::get('/measurement-and-instrumentation-laboratory', function () {
    return view('frontend.eee.measurement-and-instrumentation-laboratory');
});
Route::get('/microprocessor-interfacing-laboratory', function () {
    return view('frontend.eee.microprocessor-interfacing-laboratory');
});
Route::get('/power-system-protection-laboratory', function () {
    return view('frontend.eee.power-system-protection-laboratory');
});
Route::get('/simulation-laboratory', function () {
    return view('frontend.eee.simulation-laboratory');
});
Route::get('/architecture-lab', function () {
    return view('frontend.architecture.architecture-lab');
});


Route::get('/civil-engineering-drawing-lab', function () {
    return view('frontend.ce.civil-engineering-drawing-lab');
});
Route::get('/practical-surveying', function () {
    return view('frontend.ce.practical-surveying');
});
Route::get('/engineering-materials-lab', function () {
    return view('frontend.ce.engineering-materials-lab');
});
Route::get('/mechanics-of-solids-lab', function () {
    return view('frontend.ce.mechanics-of-solids-lab');
});
Route::get('/environmental-engineering-lab', function () {
    return view('frontend.ce.environmental-engineering-lab');
});
Route::get('/geotechnical-engineering-lab', function () {
    return view('frontend.ce.geotechnical-engineering-lab');
});
Route::get('/transportation-engineering-lab', function () {
    return view('frontend.ce.transportation-engineering-lab');
});
Route::get('/pharmaceutical-technology-and-cosmetology-laboratory', function () {
    return view('frontend.pharmacy.pharmaceutical-technology-and-cosmetology-laboratory');
});
Route::get('/inorganic-and-physical-pharmacy-laboratory', function () {
    return view('frontend.pharmacy.inorganic-and-physical-pharmacy-laboratory');
});
Route::get('/pharmaceutical-microbiological-laboratory', function () {
    return view('frontend.pharmacy.pharmaceutical-microbiological-laboratory');
});


Route::get('/pharmacognosy-and-phytochemistry-laboratory', function () {
    return view('frontend.pharmacy.pharmacognosy-and-phytochemistry-laboratory');
});
Route::get('/physiology-and-pharmacology-laboratory', function () {
    return view('frontend.pharmacy.physiology-and-pharmacology-laboratory');
});
Route::get('/food-analytical-laboratory', function () {
    return view('frontend.nfe.food-analytical-laboratory');
});
Route::get('/food-processing-laboratory', function () {
    return view('frontend.nfe.food-processing-laboratory');
});
Route::get('/food-microbiology-laboratory', function () {
    return view('frontend.nfe.food-microbiology-laboratory');
});
Route::get('/amar-food-laboratory', function () {
    return view('frontend.nfe.amar-food-laboratory');
});
Route::get('/nutritional-assessment-laboratory', function () {
    return view('frontend.nfe.nutritional-assessment-laboratory');
});
Route::get('/advanced-food-analysis-laboratory', function () {
    return view('frontend.nfe.advanced-food-analysis-laboratory');
});

// About Resource
Route::get('/decision-on-establishment-of-a-study-centre', function () {
    return view('frontend.decision-on-establishment-of-a-study-centre');
});
Route::get('/decision-regarding-library-uses', function () {
    return view('frontend.decision-regarding-library-uses');
});
Route::get('/decision-on-teaching-excellence-award', function () {
    return view('frontend.decision-on-teaching-excellence-award');
});
Route::get('/decision-regarding-event-and-venue-of-diu', function () {
    return view('frontend.decision-regarding-event-and-venue-of-diu');
});
Route::get('/decision-regarding-report-on-semester-exam-results', function () {
    return view('frontend.decision-regarding-report-on-semester-exam-results');
});
Route::get('/decision-on-code-of-conduct-for-the-students-of-diu', function () {
    return view('frontend.decision-on-code-of-conduct-for-the-students-of-diu');
});
Route::get('/decision-regarding-separate-blc-courses-for-all-lab-classes', function () {
    return view('frontend.decision-regarding-separate-blc-courses-for-all-lab-classes');
});


Route::get('/research-ethics-committee', [FrontendController::class, 'ResearchEthicsFaculty']);


// Backend
Route::resource('website-slider', WebsiteSliderController::class);
Route::resource('director-message', DirectorMessageController::class);
Route::resource('mission-vision', MissionVisionController::class);
Route::resource('research-ethics-committees', ResearchEthicsCommitteeController::class);
// Route::resource('our-team', OurTeamController::class);
Route::resource('resources', ResourceController::class);
Route::resource('research-coordinator', ResearchCoordinatorController::class);
Route::resource('collaborating-research', CollaboratingResearchController::class);
Route::resource('source-of-publication', SourceOfPublicationController::class);
Route::resource('interdisciplinary-research', InterdisciplinaryResearchController::class);
Route::resource('research-update', ResearchUpdateController::class);
Route::resource('diu-journals', DiuJournalController::class);
Route::resource('ranking', RankingController::class);
Route::resource('events', EventController::class);
Route::resource('photos', PhotoController::class);
Route::resource('videos', VideoController::class);