<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ResearchUpdate;
use Illuminate\Support\Facades\Session;
class ResearchUpdateController extends Controller
{
    public function index()
    {
        $researchUpdates = ResearchUpdate::all();
        return view('backend.research_update', compact('researchUpdates'));
    }

    public function create()
    {
        // Define an empty resource object
        $researchUpdate = new ResearchUpdate();
        return view('backend.research_update', compact('researchUpdate'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'volume' => 'required',
            'file' => 'required',
        ]);

        $fileName = time().'.'.$request->file->extension();  
        $request->file->move(public_path('uploads/research_update'), $fileName);
        
        ResearchUpdate::create([
            'volume' => $request->volume,
            'file' => $fileName,
        ]);

        return redirect()->route('research-update.index')
            ->with('success', 'Record created successfully');
    }

    public function edit(ResearchUpdate $researchUpdate)
    {
        $researchUpdates = ResearchUpdate::all();
        return view('backend.research_update', compact('researchUpdate', 'researchUpdates'));
    }

    public function update(Request $request, ResearchUpdate $researchUpdate)
    {
        $request->validate([
            'volume' => 'required',
            'file' => 'nullable',
        ]);
    
        // Check if a new file has been uploaded
        if ($request->hasFile('file')) {
            // Delete the old file if it exists
            if ($researchUpdate->file) {
                unlink(public_path('uploads/research_update/' . $researchUpdate->file));
            }
    
            // Upload the new file
            $fileName = time().'.'.$request->file->extension();  
            $request->file->move(public_path('uploads/research_update'), $fileName);
            $researchUpdate->file = $fileName;
        }
    
        $researchUpdate->volume = $request->volume;
        $researchUpdate->save();
        
        return redirect()->route('research-update.index')
            ->with('success', 'Record updated successfully');
    }

    public function destroy(ResearchUpdate $researchUpdate)
    {
        // Get the file name from the database
        $fileName = $researchUpdate->file;

        // Delete the file from the storage
        if (file_exists(public_path('uploads/research_update/' . $fileName))) {
            unlink(public_path('uploads/research_update/' . $fileName));
        }

        // Delete the database record
        $researchUpdate->delete();

        return redirect()->route('research-update.index')
            ->with('success', 'Record and file deleted successfully');
    }
}
