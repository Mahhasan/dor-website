<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CollaboratingResearch;
use Illuminate\Support\Facades\Session;
class CollaboratingResearchController extends Controller
{
    public function index()
    {
        $collaboratingResearches = CollaboratingResearch::all();
        return view('backend.collaborating_research', compact('collaboratingResearches'));
    }

    public function create()
    {
        // Define an empty resource object
        $collaboratingResearch = new CollaboratingResearch();
        return view('backend.collaborating_research', compact('collaboratingResearch'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'institute_name' => 'required',
        ]);
        
        CollaboratingResearch::create($request->all());
        return redirect()->route('collaborating-research.index')
            ->with('success', 'Record created successfully');
    }

    public function edit(CollaboratingResearch $collaboratingResearch)
    {
        $collaboratingResearches = CollaboratingResearch::all();
        return view('backend.collaborating_research', compact('collaboratingResearch', 'collaboratingResearches'));
    }

    public function update(Request $request, CollaboratingResearch $collaboratingResearch)
    {
        $request->validate([
            'institute_name' => 'required',
        ]);
    
        $collaboratingResearch->update($request->all());
        return redirect()->route('collaborating-research.index')
            ->with('success', 'Record updated successfully');
    }

    public function destroy(CollaboratingResearch $collaboratingResearch)
    {
        // Delete the database record
        $collaboratingResearch->delete();

        return redirect()->route('collaborating-research.index')
            ->with('success', 'Record and file deleted successfully');
    }
}
