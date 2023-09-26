<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SourceOfPublication;
use Illuminate\Support\Facades\Session;
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
        $request->validate([
            'source' => 'required',
        ]);
        
        SourceOfPublication::create($request->all());
        return redirect()->route('source-of-publication.index')
            ->with('success', 'Record created successfully');
    }

    public function edit(SourceOfPublication $sourceOfPublication)
    {
        $sourceOfPublications = SourceOfPublication::all();
        return view('backend.source_of_publication', compact('sourceOfPublication', 'sourceOfPublications'));
    }

    public function update(Request $request, SourceOfPublication $sourceOfPublication)
    {
        $request->validate([
            'source' => 'required',
        ]);
    
        $sourceOfPublication->update($request->all());
        return redirect()->route('source-of-publication.index')
            ->with('success', 'Record updated successfully');
    }

    public function destroy(SourceOfPublication $sourceOfPublication)
    {
        // Delete the database record
        $sourceOfPublication->delete();

        return redirect()->route('source-of-publication.index')
            ->with('success', 'Record and file deleted successfully');
    }
}