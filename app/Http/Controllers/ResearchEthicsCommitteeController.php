<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\ResearchEthicsCommittee;
use Illuminate\Support\Facades\Session;
class ResearchEthicsCommitteeController extends Controller
{
    public function index()
    {
        // $researchEthicsCommittees = ResearchEthicsCommittee::all();
        $fsit = ResearchEthicsCommittee::WHERE('faculty_name', 'FSIT Research Ethics Committee')->get();
        $fbe = ResearchEthicsCommittee::WHERE('faculty_name', 'FBE Research Ethics Committee')->get();
        $fahs = ResearchEthicsCommittee::WHERE('faculty_name', 'FAHS Research Ethics Committee')->get();
        $fe = ResearchEthicsCommittee::WHERE('faculty_name', 'FE Research Ethics Committee')->get();
        $fhss = ResearchEthicsCommittee::WHERE('faculty_name', 'FHSS Research Ethics Committee')->get();
        return view('backend.research_ethics_committees', compact('fsit', 'fbe', 'fahs', 'fe', 'fhss'));
    }

    public function create()
    {
        // Define an empty ResearchEthicsCommittee object
        $researchEthicsCommittee = new ResearchEthicsCommittee();
        return view('backend.research_ethics_committees', compact('researchEthicsCommittee'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'faculty_name' => 'required',
            'position' => 'required',
        ]);

        ResearchEthicsCommittee::create($request->all());
        Session::flash('success', 'Record created successfully.');
        return redirect()->route('research-ethics-committees.index')
            ->with('success', 'Record created successfully');
    }

    // public function edit(ResearchEthicsCommittee $researchEthicsCommittee)
    // {
    //     return view('backend.research_ethics_committees', compact('researchEthicsCommittee'));
    // }

    public function edit(ResearchEthicsCommittee $researchEthicsCommittee)
    {
        // $researchEthicsCommittees = ResearchEthicsCommittee::all();
        $fsit = ResearchEthicsCommittee::WHERE('faculty_name', 'FSIT Research Ethics Committee')->get();
        $fbe = ResearchEthicsCommittee::WHERE('faculty_name', 'FBE Research Ethics Committee')->get();
        $fahs = ResearchEthicsCommittee::WHERE('faculty_name', 'FAHS Research Ethics Committee')->get();
        $fe = ResearchEthicsCommittee::WHERE('faculty_name', 'FE Research Ethics Committee')->get();
        $fhss = ResearchEthicsCommittee::WHERE('faculty_name', 'FHSS Research Ethics Committee')->get();
        return view('backend.research_ethics_committees', compact('researchEthicsCommittee', 'fsit', 'fbe', 'fahs', 'fe', 'fhss'));
    }





    public function update(Request $request, ResearchEthicsCommittee $researchEthicsCommittee)
    {
        $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'faculty_name' => 'required',
            'position' => 'required',
        ]);

        $researchEthicsCommittee->update($request->all());
        Session::flash('success', 'Record updated successfully.');
        return redirect()->route('research-ethics-committees.index')
            ->with('success', 'Record updated successfully');
    }

    public function destroy(ResearchEthicsCommittee $researchEthicsCommittee)
    {
        $researchEthicsCommittee->delete();

        return redirect()->route('research-ethics-committees.index')
            ->with('success', 'Record deleted successfully');
    }
}