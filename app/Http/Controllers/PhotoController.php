<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Photo;

class PhotoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $photos = Photo::orderByDesc('year')->orderByDesc('id')->get();
        return view('backend.photos', compact('photos'));
    }

    public function create()
    {
        // Define an empty researchCoordinator object
        $photo = new Photo();
        return view('backend.photos', compact('photo'));
    }

    public function edit(Photo $photo)
    {
        $photos = Photo::all();
        return view('backend.photos', compact('photo', 'photos'));
    }

    public function store(Request $request)
    {
        try{
            $request->validate([
                'title' => 'required',
                'year' => 'required',
                'pictures' => 'nullable|array',
                'pictures.*' => 'image|mimes:jpeg,png,jpg,svg|max:10240',
                'links' => 'nullable|array',
                'links.*' => 'url', // Validate links as URLs
            ]);

            $pictures = [];
            $links = [];

            // Upload pictures and store their filenames
            if ($request->hasFile('pictures')) {
                foreach ($request->file('pictures') as $pictureFile) {
                    $imageName = time() . '_' . $pictureFile->getClientOriginalName();
                    $pictureFile->move(public_path('uploads/photos'), $imageName);
                    $pictures[] = $imageName;
                }
            }

            // Store links
            if ($request->has('links')) {
                $links = $request->input('links');
            }

            // Create the main photo record with picture filenames and links
            Photo::create([
                'title' => $request->title,
                'year' => $request->year,
                'pictures' => json_encode($pictures), // Store filenames as JSON
                'links' => json_encode($links), // Store links as JSON
            ]);

            return redirect()->route('photos.index')->with('success', 'Record created successfully');
        }
        catch(\Exception $e) {
            return redirect()->route('photos.index')->with('warning', 'Failed to create record! Please try again');
        }
    }

    public function update(Request $request, Photo $photo)
    {
        try{
            $request->validate([
                'title' => 'required',
                'year' => 'required',
                'pictures' => 'nullable|array',
                'pictures.*' => 'image|mimes:jpeg,png,jpg,gif|max:10240',
                'links' => 'nullable|array',
                'links.*' => 'url', // Validate links as URLs
            ]);

            $pictures = json_decode($photo->pictures, true) ?? [];
            $links = json_decode($photo->links, true) ?? [];

            // Upload new pictures and store their filenames
            if ($request->hasFile('pictures')) {
                foreach ($request->file('pictures') as $pictureFile) {
                    $imageName = time() . '_' . $pictureFile->getClientOriginalName();
                    $pictureFile->move(public_path('uploads/photos'), $imageName);
                    $pictures[] = $imageName;
                }
            }

            // Store links
            if ($request->has('links')) {
                $links = $request->input('links');
            }

            // Remove deleted pictures
            if ($request->has('deleted_pictures')) {
                foreach ($request->input('deleted_pictures') as $deletedPicture) {
                    $picturePath = public_path('uploads/photos/' . $deletedPicture);
                    if (file_exists($picturePath)) {
                        unlink($picturePath);
                    }
                    $key = array_search($deletedPicture, $pictures);
                    if ($key !== false) {
                        unset($pictures[$key]);
                    }
                }
            }

            // Update the main photo record with updated picture filenames and links
            $photo->update([
                'title' => $request->title,
                'year' => $request->year,
                'pictures' => json_encode(array_values($pictures)), // Store filenames as JSON
                'links' => json_encode($links), // Store links as JSON
            ]);

            return redirect()->route('photos.index')->with('success', 'Record updated successfully');
        }
        catch(\Exception $e) {
            return redirect()->route('photos.index')->with('warning', 'Failed to update record! Please try again');
        }
    }

    public function destroy(Photo $photo)
    {
        // Decode the JSON data and get the picture filenames
        $pictures = json_decode($photo->pictures, true);
        try{
            if (is_array($pictures)) {
                // Delete associated pictures and their files
                foreach ($pictures as $picture) {
                    $picturePath = public_path('uploads/photos/' . $picture);
                    if (file_exists($picturePath)) {
                        unlink($picturePath);
                    }
                }
            }

            $photo->delete();

            return redirect()->route('photos.index')->with('success', 'Record deleted successfully');
        }
        catch(\Exception $e) {
            return redirect()->route('photos.index')->with('warning', 'Failed to delete record! Please try again');
        }
    }
}
