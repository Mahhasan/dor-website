<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\SourceOfPublication;

class SourceOfPublicationController extends Controller
{
    public function index()
    {
        $sourceOfPublications = SourceOfPublication::all();
        return view('backend.source_of_publication', compact('sourceOfPublications'));
    }

    public function create()
    {
        // Define an empty resource object
        $sourceOfPublication = new SourceOfPublication();
        return view('backend.source_of_publication', compact('sourceOfPublication'));
    }

    public function store(Request $request)
    {
        try{
            $request->validate([
                'source' => 'required|max:255',
            ]);
            
            SourceOfPublication::create([
                'source' => $request->source,
                'slug' => Str::slug($request->source),
            ]);

            return redirect()->route('source.of.publication.index')->with('success', 'Record created successfully');
        }
        catch (\Exception $e) {
            return redirect()->route('source.of.publication.index')->with('warning', "Failed to create record! Please try again");
        }
    }

    public function edit(SourceOfPublication $sourceOfPublication)
    {
        $sourceOfPublications = SourceOfPublication::all();
        return view('backend.source_of_publication', compact('sourceOfPublication', 'sourceOfPublications'));
    }

    public function update(Request $request, SourceOfPublication $sourceOfPublication)
    {
        try{
            $request->validate([
                'source' => 'required|max:255',
            ]);
        
            $sourceOfPublication->update([
                'source' => $request->source,
                'slug' => Str::slug($request->source), // Generate slug here
            ]);

            return redirect()->route('source.of.publication.index')->with('success', 'Record updated successfully');
        }
        catch (\Exception $e) {
            return redirect()->route('source.of.publication.index')->with('warning', "Failed to update record! Please try again");
        }
    }

    public function destroy(SourceOfPublication $sourceOfPublication)
    {
        try{
            // Delete the database record
            $sourceOfPublication->delete();

            return redirect()->route('source.of.publication.index')->with('success', 'Record and file deleted successfully');
        }
        catch (\Exception $e) {
            return redirect()->route('source.of.publication.index')->with('warning', "Failed to delete record! Please try again");
        }
    }
}