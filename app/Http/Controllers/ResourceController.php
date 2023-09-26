<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resource;
use Illuminate\Support\Facades\Session;
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

        $fileName = time().'.'.$request->document->extension();  
        $request->document->move(public_path('uploads/resource'), $fileName);
        
        Resource::create([
            'topic' => $request->topic,
            'document' => $fileName,
        ]);

        return redirect()->route('resources.index')
            ->with('success', 'Record created successfully');
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
            'document' => 'required',
        ]);
    
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
        
        return redirect()->route('resources.index')
            ->with('success', 'Record updated successfully');
    }

    public function destroy(Resource $resource)
    {
        // Get the file name from the database
        $fileName = $resource->document;

        // Delete the file from the storage
        if (file_exists(public_path('uploads/resource/' . $fileName))) {
            unlink(public_path('uploads/resource/' . $fileName));
        }

        // Delete the database record
        $resource->delete();

        return redirect()->route('resources.index')
            ->with('success', 'Record and file deleted successfully');
    }
}
