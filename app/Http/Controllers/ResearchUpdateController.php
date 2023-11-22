<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ResearchUpdate;

class ResearchUpdateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $researchUpdates = ResearchUpdate::orderByDesc('id')->get();
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
        try{
            $request->validate([
                'volume' => 'required',
                'file' => 'required|file|mimes:pdf|max:10240'
            ]);

            $fileName = time().'.'.$request->file->extension();  
            $request->file->move(public_path('uploads/research_update'), $fileName);
            
            ResearchUpdate::create([
                'volume' => $request->volume,
                'file' => $fileName,
                'slug' => Str::slug($request->volume),
            ]);

            return redirect()->route('research.update.index')->with('success', 'Record created successfully');
        }
        catch (\Exception $e) {
            return redirect()->route('research.update.index')->with('warning', "Failed to create record! Please try again");
        }
    }

    public function edit(ResearchUpdate $researchUpdate)
    {
        $researchUpdates = ResearchUpdate::all();
        return view('backend.research_update', compact('researchUpdate', 'researchUpdates'));
    }

    public function update(Request $request, ResearchUpdate $researchUpdate)
    {
        try{
            $request->validate([
                'volume' => 'required',
                'file' => 'nullable|file|mimes:pdf|max:10240'
            ]);
        
            // Check if a new file has been uploaded
            if ($request->hasFile('file')) {
                // Delete the old file if it exists
                if ($researchUpdate->file) {
                    if (file_exists(public_path('uploads/research_update/' . $researchUpdate->file))) {
                        unlink(public_path('uploads/research_update/' . $researchUpdate->file));
                    }
                }
        
                // Upload the new file
                $fileName = time().'.'.$request->file->extension();  
                $request->file->move(public_path('uploads/research_update'), $fileName);
                $researchUpdate->file = $fileName;
            }
        
            $researchUpdate->volume = $request->volume;
            $researchUpdate->slug = Str::slug($request->volume); // Generate slug here
            $researchUpdate->save();
            
            return redirect()->route('research.update.index')->with('success', 'Record updated successfully');
        }
        catch (\Exception $e) {
            return redirect()->route('research.update.index')->with('warning', "Failed to update record! Please try again");
        }
    }

    public function destroy(ResearchUpdate $researchUpdate)
    {
        // Get the file name from the database
        $fileName = $researchUpdate->file;

        try{
            // Delete the file from the storage
            if (file_exists(public_path('uploads/research_update/' . $fileName))) {
                unlink(public_path('uploads/research_update/' . $fileName));
            }

            // Delete the database record
            $researchUpdate->delete();

            return redirect()->route('research.update.index')->with('success', 'Record and file deleted successfully');
        }
        catch (\Exception $e) {
            return redirect()->route('research.update.index')->with('warning', "Failed to delete record! Please try again");
        }
    }
}
