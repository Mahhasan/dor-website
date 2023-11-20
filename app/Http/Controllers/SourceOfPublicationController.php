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
            
            SourceOfPublication::create($request->all());
            return redirect()->route('source.of.publication.index')->with('success', 'Record created successfully');
        }
        catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->route('source.of.publication.index')->with('warning', "Validation failed. Please check your inputs.");
        }
        catch (\Exception $e) {
            return redirect()->route('source.of.publication.index')->with('fail', "Failed to create record! Please try again");
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
        
            $sourceOfPublication->update($request->all());
            return redirect()->route('source.of.publication.index')->with('success', 'Record updated successfully');
        }
        catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->route('source.of.publication.index')->with('warning', "Validation failed. Please check your inputs.");
        }
        catch (\Exception $e) {
            return redirect()->route('source.of.publication.index')->with('fail', "Failed to update record! Please try again");
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
            return redirect()->route('source.of.publication.index')->with('fail', "Failed to delete record! Please try again");
        }
    }
}