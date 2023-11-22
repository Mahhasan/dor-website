<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\ResearchEthicsCommittee;
use App\Models\Department;

class ResearchEthicsCommitteeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {

        $departments = Department::all();
        $fsit = ResearchEthicsCommittee::WHERE('committee_name', 'FSIT Research Ethics Committee')->get();
        $fbe = ResearchEthicsCommittee::WHERE('committee_name', 'FBE Research Ethics Committee')->get();
        $fahs = ResearchEthicsCommittee::WHERE('committee_name', 'FAHS Research Ethics Committee')->get();
        $fe = ResearchEthicsCommittee::WHERE('committee_name', 'FE Research Ethics Committee')->get();
        $fhss = ResearchEthicsCommittee::WHERE('committee_name', 'FHSS Research Ethics Committee')->get();
        return view('backend.research_ethics_committees', compact('departments', 'fsit', 'fbe', 'fahs', 'fe', 'fhss'));
    }

    public function create()
    {
        // Define an empty ResearchEthicsCommittee object
        $researchEthicsCommittee = new ResearchEthicsCommittee();
        return view('backend.research_ethics_committees', compact('researchEthicsCommittee'));
    }

    public function store(Request $request)
    {
        try{
            $request->validate([
                'name' => 'required',
                'designation' => 'required',
                'department_id' => 'required',
                'committee_name' => 'required',
                'position' => 'required',
            ]);
        
            ResearchEthicsCommittee::create($request->all());
            return redirect()->route('research.ethics.ommittees.index')->with('success', 'Record created successfully');
        }
        catch(\Exception $e) {
            return redirect()->route('research.ethics.ommittees.index')->with('warning', "Failed to create record! Please try again"); 
        } 
    }


    public function edit(ResearchEthicsCommittee $researchEthicsCommittee)
    {
        $departments = Department::all();
        // $researchEthicsCommittees = ResearchEthicsCommittee::all();
        $fsit = ResearchEthicsCommittee::WHERE('committee_name', 'FSIT Research Ethics Committee')->get();
        $fbe = ResearchEthicsCommittee::WHERE('committee_name', 'FBE Research Ethics Committee')->get();
        $fahs = ResearchEthicsCommittee::WHERE('committee_name', 'FAHS Research Ethics Committee')->get();
        $fe = ResearchEthicsCommittee::WHERE('committee_name', 'FE Research Ethics Committee')->get();
        $fhss = ResearchEthicsCommittee::WHERE('committee_name', 'FHSS Research Ethics Committee')->get();
        return view('backend.research_ethics_committees', compact('departments', 'researchEthicsCommittee', 'fsit', 'fbe', 'fahs', 'fe', 'fhss'));
    }

    public function update(Request $request, ResearchEthicsCommittee $researchEthicsCommittee)
    {
        try{
            $request->validate([
                'name' => 'required',
                'designation' => 'required',
                'department_id' => 'required',
                'committee_name' => 'required',
                'position' => 'required',
            ]);
        
            $researchEthicsCommittee->update($request->all());
            return redirect()->route('research.ethics.ommittees.index')->with('success', 'Record updated successfully');
        }
        catch(\Exception $e) {
            return redirect()->route('research.ethics.ommittees.index')->with('warning', "Failed to update record! Please try again"); 
        } 
    }

    public function destroy(ResearchEthicsCommittee $researchEthicsCommittee)
    {
        try{
            $researchEthicsCommittee->delete();

            return redirect()->route('research.ethics.ommittees.index')->with('success', 'Record deleted successfully');
        }
        catch(\Exception $e) {
            return redirect()->route('research.ethics.ommittees.index')->with('warning', "Failed to delete record! Please try again"); 
        }     
    }
}