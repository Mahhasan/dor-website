<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resource;
class ResourceController extends Controller
{
    public function index()
    {
        $resources = Resource::all();
        return view('backend.resources', compact('resources'));
    }

    public function create()
    {
        // Define an empty resource object
        $resource = new Resource();
        return view('backend.resources', compact('resource'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'topic' => 'required',
            'document' => 'required',
        ]);
        try{
            $fileName = time().'.'.$request->document->extension();  
            $request->document->move(public_path('uploads/resource'), $fileName);
            
            Resource::create([
                'topic' => $request->topic,
                'document' => $fileName,
            ]);

            return redirect()->route('resources.index')->with('success', 'Record created successfully');
        }
        catch(\Exception) {
            return redirect('resources.index')->with('fail', "Failed to create record! Please try again"); 
        }
    }

    public function edit(Resource $resource)
    {
        $resources = Resource::all();
        return view('backend.resources', compact('resource', 'resources'));
    }

    public function update(Request $request, Resource $resource)
    {
        $request->validate([
            'topic' => 'required',
            'document' => 'nullable',
        ]);
        try{
            // Check if a new file has been uploaded
            if ($request->hasFile('document')) {
                // Delete the old file if it exists
                if ($resource->document) {
                    unlink(public_path('uploads/resource/' . $resource->document));
                }
        
                // Upload the new file
                $fileName = time().'.'.$request->document->extension();  
                $request->document->move(public_path('uploads/resource'), $fileName);
                $resource->document = $fileName;
            }
        
            $resource->topic = $request->topic;
            $resource->save();
            
            return redirect()->route('resources.index')->with('success', 'Record updated successfully');
        }
        catch(\Exception) {
            return redirect('resources.index')->with('fail', "Failed to update record! Please try again"); 
        }
    }

    public function destroy(Resource $resource)
    {
        // Get the file name from the database
        $fileName = $resource->document;

        // Delete the file from the storage
        if (file_exists(public_path('uploads/resource/' . $fileName))) {
            unlink(public_path('uploads/resource/' . $fileName));
        }
        try{
            // Delete the database record
            $resource->delete();

            return redirect()->route('resources.index')->with('success', 'Record deleted successfully');
        }
        catch(\Exception) {
            return redirect('resources.index')->with('fail', "Failed to delete record! Please try again"); 
        }
    }
}
