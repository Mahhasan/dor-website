<?php

namespace App\Http\Controllers;
use App\Models\WebsiteSlider;
use Illuminate\Http\Request;
use App\Models\ResearchEthicsCommittee;

class FrontendController extends Controller
{
    public function websiteSlider()
    {
        $websiteSliders = WebsiteSlider::orderBy('created_at', 'desc')->get();
        return view('welcome', compact('websiteSliders'));
    }


    public function ResearchEthicsFaculty()
    {
        $faculty_name = ResearchEthicsCommittee::distinct()->pluck('faculty_name');
        return view('frontend.research_ethics_committees', compact('faculty_name'));
    }
}
