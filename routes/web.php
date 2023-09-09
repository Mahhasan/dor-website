<?php
use Illuminate\Support\Facades\Route;

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

Route::resource('article', App\Http\Controllers\ArticleController::class);
Route::get('article/details/{id}', [App\Http\Controllers\ArticleController::class, 'details']);

Route::get('/research-coordinator', [App\Http\Controllers\DataController::class, 'research_coordinator']);
Route::get('/ranking', [App\Http\Controllers\DataController::class, 'ranking']);
Route::get('/about', [App\Http\Controllers\DataController::class, 'about']);
Route::get('/photo', [App\Http\Controllers\DataController::class, 'photo']);
//Route::get('/news/news_one', 'DataController@news');


Route::get('/scopus-article', [App\Http\Controllers\DataController::class, 'scopus_article']);
Route::get('/scopus-article/{id}', [App\Http\Controllers\DataController::class, 'scopus_article_details']);

Route::get('/our-team', function () {
    return view('our-team');
});
Route::get('/journals',function(){
   return view('journal'); 
});
Route::get('/video', function(){
    return view('video');
});
Route::get('/research-collaboration', function () {
    return view('research-collaboration');
});
Route::get('/publication-source', function () {
    return view('publication-source');
});
Route::get('/mission-vision', function () {
    return view('mission-vision');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/event', function () {
    return view('event.index');
});
Route::get('/event/one', function () {
    return view('event.one');
});
Route::get('/event/two', function () {
    return view('event.two');
});
Route::get('/event/three', function () {
    return view('event.three');
});
Route::get('/event/four', function () {
    return view('event.four');
});
Route::get('/event/five', function () {
    return view('event.five');
});
Route::get('/event/six', function () {
    return view('event.six');
});
Route::get('/event/seven', function () {
    return view('event.seven');
});
Route::get('/event/eight', function () {
    return view('event.eight');
});
Route::get('/event/nine', function () {
    return view('event.nine');
});
Route::get('/event/ten', function () {
    return view('event.ten');
});
Route::get('/event/eleven', function () {
    return view('event.eleven');
});
Route::get('/event/twelve', function () {
    return view('event.twelve');
});
Route::get('/event/thirteen', function () {
    return view('event.thirteen');
});
Route::get('/event/fourteen', function () {
    return view('event.fourteen');
});
Route::get('/event/fifteen', function () {
    return view('event.fifteen');
});
Route::get('/event/research-award-giving-ceremony-2023', function () {
    return view('event.research-award-giving-ceremony-2023');
});
Route::get('/project/one', function (){
    return view('project.one');
});
Route::get('/project/two', function (){
    return view('project.two');
});
Route::get('/research-ethics-committee', function () {
    return view('research-ethics-committee');
});
Route::get('/research-ethics-committee-fsit', function () {
    return view('research-ethics-committee-fsit');
});
Route::get('/research-ethics-committee-fbe', function () {
    return view('research-ethics-committee-fbe');
});
Route::get('/research-ethics-committee-fe', function () {
    return view('research-ethics-committee-fe');
});
Route::get('/research-ethics-committee-fhss', function () {
    return view('research-ethics-committee-fhss');
});
Route::get('/about-resources', function () {
    return view('about-resources');
});
Route::get('/diu-governance-meeting', function () {
    return view('diu-governance-meeting');
});
Route::get('/research-update', function () {
    return view('research-update');
});


// Interdisciplinary Research 

// subheading

Route::get('/interdisciplinary_research', function () {
    return view('interdisciplinary_research');
});
Route::get('/science-discipline', function () {
    return view('science-discipline');
});
Route::get('/Policy-on-Faculty-Promotion-System-that-Recognizes-Interdisciplinary-Research', function () {
    return view('promotion-policy');
});


// Department wise lab

Route::get('/fabrication-lab', function () {
    return view('cse.fabrication-lab');
});
Route::get('/computer-programming-lab', function () {
    return view('cse.computer-programming-lab');
});
Route::get('/iot-lab', function () {
    return view('cse.iot-lab');
});
Route::get('/erasmus-lab', function () {
    return view('others.erasmus-lab');
});
Route::get('/robotics-lab', function () {
    return view('swe.robotics-lab');
});
Route::get('/data-science-lab', function () {
    return view('swe.data-science-lab');
});
Route::get('/cyber-security-lab', function () {
    return view('swe.cyber-security-lab');
});
Route::get('/nasa-space-apps-research', function () {
    return view('others.nasa-space-apps-research');
});
Route::get('/3d-animation-lab', function () {
    return view('mct.3d-animation-lab');
});
Route::get('/professional-development-lab', function () {
    return view('mct.professional-development-lab');
});
Route::get('/health-informatics-research-lab', function () {
    return view('others.health-informatics-research-lab');
});
Route::get('/chemistry-lab', function () {
    return view('ged.chemistry-lab');
});
Route::get('/physics-lab', function () {
    return view('ged.physics-lab');
});
Route::get('/diu-data-center', function () {
    return view('others.diu-data-center');
});
Route::get('/esdm-laboratory', function () {
    return view('esdm.esdm-laboratory');
});
Route::get('/itm-lab', function () {
    return view('itm.itm-lab');
});
Route::get('/marketing-lab', function () {
    return view('ba.marketing-lab');
});
Route::get('/e-business-lab', function () {
    return view('bs.e-business-lab');
});
Route::get('/food-and-beverage-service-lab', function () {
    return view('thm.food-and-beverage-service-lab');
});
Route::get('/daffodil-innovation-lab', function () {
    return view('ie.daffodil-innovation-lab');
});
Route::get('/english-language-lab', function () {
    return view('english.english-language-lab');
});
Route::get('/moot-court', function () {
    return view('law.moot-court');
});
Route::get('/jmc-media-lab', function () {
    return view('jmc.jmc-media-lab');
});
Route::get('/microprocessor-and-interfacing-lab', function () {
    return view('ice.microprocessor-and-interfacing-lab');
});


Route::get('/electrical-circuit-lab', function () {
    return view('ice.electrical-circuit-lab');
});
Route::get('/computer-lab-ete', function () {
    return view('ice.computer-lab-ete');
});
Route::get('/apparel-manufacturing-lab', function () {
    return view('te.apparel-manufacturing-lab');
});
Route::get('/fabric-manufacturing-lab-knitting', function () {
    return view('te.fabric-manufacturing-lab-knitting');
});
Route::get('/fabric-manufacturing-lab-weaving', function () {
    return view('te.fabric-manufacturing-lab-weaving');
});
Route::get('/mechanical-engineering-lab', function () {
    return view('te.mechanical-engineering-lab');
});
Route::get('/textile-testing-and-quality-control-lab', function () {
    return view('te.textile-testing-and-quality-control-lab');
});
Route::get('/wet-processing-lab', function () {
    return view('te.wet-processing-lab');
});
Route::get('/yarn-manufacturing-lab', function () {
    return view('te.yarn-manufacturing-lab');
});
Route::get('/communication-engineering', function () {
    return view('eee.communication-engineering');
});


Route::get('/digital-signal-processing-laboratory', function () {
    return view('eee.digital-signal-processing-laboratory');
});
Route::get('/electrical-circuit-laboratory', function () {
    return view('eee.electrical-circuit-laboratory');
});
Route::get('/electronics-laboratory', function () {
    return view('eee.electronics-laboratory');
});
Route::get('/energy-conversion-laboratory', function () {
    return view('eee.energy-conversion-laboratory');
});
Route::get('/power-electronics-laboratory', function () {
    return view('eee.power-electronics-laboratory');
});
Route::get('/measurement-and-instrumentation-laboratory', function () {
    return view('eee.measurement-and-instrumentation-laboratory');
});
Route::get('/microprocessor-interfacing-laboratory', function () {
    return view('eee.microprocessor-interfacing-laboratory');
});
Route::get('/power-system-protection-laboratory', function () {
    return view('eee.power-system-protection-laboratory');
});
Route::get('/simulation-laboratory', function () {
    return view('eee.simulation-laboratory');
});
Route::get('/architecture-lab', function () {
    return view('architecture.architecture-lab');
});


Route::get('/civil-engineering-drawing-lab', function () {
    return view('ce.civil-engineering-drawing-lab');
});
Route::get('/practical-surveying', function () {
    return view('ce.practical-surveying');
});
Route::get('/engineering-materials-lab', function () {
    return view('ce.engineering-materials-lab');
});
Route::get('/mechanics-of-solids-lab', function () {
    return view('ce.mechanics-of-solids-lab');
});
Route::get('/environmental-engineering-lab', function () {
    return view('ce.environmental-engineering-lab');
});
Route::get('/geotechnical-engineering-lab', function () {
    return view('ce.geotechnical-engineering-lab');
});
Route::get('/transportation-engineering-lab', function () {
    return view('ce.transportation-engineering-lab');
});
Route::get('/pharmaceutical-technology-and-cosmetology-laboratory', function () {
    return view('pharmacy.pharmaceutical-technology-and-cosmetology-laboratory');
});
Route::get('/inorganic-and-physical-pharmacy-laboratory', function () {
    return view('pharmacy.inorganic-and-physical-pharmacy-laboratory');
});
Route::get('/pharmaceutical-microbiological-laboratory', function () {
    return view('pharmacy.pharmaceutical-microbiological-laboratory');
});


Route::get('/pharmacognosy-and-phytochemistry-laboratory', function () {
    return view('pharmacy.pharmacognosy-and-phytochemistry-laboratory');
});
Route::get('/physiology-and-pharmacology-laboratory', function () {
    return view('pharmacy.physiology-and-pharmacology-laboratory');
});
Route::get('/food-analytical-laboratory', function () {
    return view('nfe.food-analytical-laboratory');
});
Route::get('/food-processing-laboratory', function () {
    return view('nfe.food-processing-laboratory');
});
Route::get('/food-microbiology-laboratory', function () {
    return view('nfe.food-microbiology-laboratory');
});
Route::get('/amar-food-laboratory', function () {
    return view('nfe.amar-food-laboratory');
});
Route::get('/nutritional-assessment-laboratory', function () {
    return view('nfe.nutritional-assessment-laboratory');
});
Route::get('/advanced-food-analysis-laboratory', function () {
    return view('nfe.advanced-food-analysis-laboratory');
});

// About Resource
Route::get('/decision-on-establishment-of-a-study-centre', function () {
    return view('decision-on-establishment-of-a-study-centre');
});
Route::get('/decision-regarding-library-uses', function () {
    return view('decision-regarding-library-uses');
});
Route::get('/decision-on-teaching-excellence-award', function () {
    return view('decision-on-teaching-excellence-award');
});
Route::get('/decision-regarding-event-and-venue-of-diu', function () {
    return view('decision-regarding-event-and-venue-of-diu');
});
Route::get('/decision-regarding-report-on-semester-exam-results', function () {
    return view('decision-regarding-report-on-semester-exam-results');
});
Route::get('/decision-on-code-of-conduct-for-the-students-of-diu', function () {
    return view('decision-on-code-of-conduct-for-the-students-of-diu');
});
Route::get('/decision-regarding-separate-blc-courses-for-all-lab-classes', function () {
    return view('decision-regarding-separate-blc-courses-for-all-lab-classes');
});