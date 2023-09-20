<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\ResearchEthicsCommittee;

class FrontendController extends Controller
{
    public function ResearchEthicsFaculty()
    {
        $faculty_name = ResearchEthicsCommittee::distinct()->pluck('faculty_name');
        return view('frontend.research_ethics_committees', compact('faculty_name'));
    }
}
