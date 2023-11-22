<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Resource;
class ResourceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $resources = Resource::orderByDesc('id')->get();
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
        try{
            $request->validate([
                'topic' => 'required',
                'document' => 'required|file|mimes:pdf,jpg,jpeg,png,doc,docx|max:3072'

            ]);
            $fileName = time().'.'.$request->document->extension();  
            $request->document->move(public_path('uploads/resource'), $fileName);
            
            Resource::create([
                'topic' => $request->topic,
                'document' => $fileName,
                'slug' => Str::slug($request->topic),
            ]);

            return redirect()->route('resources.index')->with('success', 'Record created successfully');
        }
        catch (\Exception $e) {
            return redirect()->route('resources.index')->with('warning', "Failed to create record! Please try again");
        }
    }

    public function edit(Resource $resource)
    {
        $resources = Resource::all();
        return view('backend.resources', compact('resource', 'resources'));
    }

    public function update(Request $request, Resource $resource)
{
    try {
        $request->validate([
            'topic' => 'required',
            'document' => 'nullable|file|mimes:pdf,jpg,jpeg,png,doc,docx|max:3072',
        ]);

        if ($request->hasFile('document')) {
            // Check if there is an existing document
            if ($resource->document) {
                // Delete the old file
                if (file_exists(public_path('uploads/resource/' . $resource->document))) {
                    unlink(public_path('uploads/resource/' . $resource->document));
                }
            }
            // Upload the new file
            $fileName = time() . '.' . $request->document->extension();
            $request->document->move(public_path('uploads/resource'), $fileName);
            $resource->document = $fileName;
        }

        $resource->topic = $request->topic;
        $resource->slug = Str::slug($request->topic); // Generate slug here
        $resource->save();

        return redirect()->route('resources.index')->with('success', 'Record updated successfully');
    }
    catch(\Exception $e) {
        return redirect()->route('resources.index')->with('warning', "Failed to update record! Please try again");
    }
}


    public function destroy(Resource $resource)
    {
        // Get the file name from the database
        $fileName = $resource->document;
        try{
            // Delete the file from the storage
            if (file_exists(public_path('uploads/resource/' . $fileName))) {
                unlink(public_path('uploads/resource/' . $fileName));
            }
            // Delete the database record
            $resource->delete();

            return redirect()->route('resources.index')->with('success', 'Record deleted successfully');
        }
        catch(\Exception $e) {
            return redirect()->route('resources.index')->with('warning', "Failed to delete record! Please try again"); 
        }
    }
}
