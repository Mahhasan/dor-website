<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\CollaboratingResearch;

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
        try{
            $request->validate([
                'institute_name' => 'required|max:255',
            ]);

            CollaboratingResearch::create([
                'institute_name' => $request->institute_name,
                'slug' => Str::slug($request->institute_name),
            ]);
            
            return redirect()->route('collaborating.research.index')->with('success', 'Record created successfully');
        }
        catch (\Exception $e) {
            return redirect()->route('collaborating.research.index')->with('warning', "Failed to create record! Please try again");
        }
    }

    public function edit(CollaboratingResearch $collaboratingResearch)
    {
        $collaboratingResearches = CollaboratingResearch::all();
        return view('backend.collaborating_research', compact('collaboratingResearch', 'collaboratingResearches'));
    }

    public function update(Request $request, CollaboratingResearch $collaboratingResearch)
    {
        try{  
            $request->validate([
                'institute_name' => 'required|max:255',
            ]);
        
            $collaboratingResearch->update([
                'institute_name' => $request->institute_name,
                'slug' => Str::slug($request->institute_name), // Generate slug here
            ]);

            return redirect()->route('collaborating.research.index')->with('success', 'Record updated successfully');
        }
        catch (\Exception $e) {
            return redirect()->route('collaborating.research.index')->with('warning', "Failed to update record! Please try again");
        }
    }

    public function destroy(CollaboratingResearch $collaboratingResearch)
    {
        try{
            // Delete the database record
            $collaboratingResearch->delete();

            return redirect()->route('collaborating.research.index')->with('success', 'Record and file deleted successfully');
        }
        catch (\Exception $e) {
            return redirect()->route('collaborating.research.index')->with('warning', "Failed to delete record! Please try again");
        }
    }
}
