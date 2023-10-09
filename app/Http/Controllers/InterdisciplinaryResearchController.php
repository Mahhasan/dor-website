<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InterdisciplinaryResearch;
use Illuminate\Support\Facades\Session;

class InterdisciplinaryResearchController extends Controller
{
    public function index()
    {
        $interdisciplinaryResearches = InterdisciplinaryResearch::all();
        return view('backend.interdisciplinary_research', compact('interdisciplinaryResearches'));
    }

    public function create()
    {
        // Define an empty researchCoordinator object
        $interdisciplinaryResearch = new InterdisciplinaryResearch();
        return view('backend.interdisciplinary_research', compact('interdisciplinaryResearch'));
    }

    public function store(Request $request)
{
    $request->validate([
        'discipline' => 'required',
        'lab_name' => 'required',
        'link' => 'nullable',
        'picture' => 'nullable|array',
        'picture.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $pictures = [];

    // Upload pictures and store their filenames
    if ($request->hasFile('picture')) {
        foreach ($request->file('picture') as $pictureFile) {
            $imageName = time() . '_' . $pictureFile->getClientOriginalName();
            $pictureFile->move(public_path('uploads/interdisciplinary_research'), $imageName);
            $pictures[] = $imageName;
        }
    }

    InterdisciplinaryResearch::create([
        'discipline' => $request->discipline,
        'lab_name' => $request->lab_name,
        'link' => $request->link,
        'picture' => json_encode($pictures), // Store filenames as JSON
    ]);

    Session::flash('success', 'Record created successfully.');
    return redirect()->route('interdisciplinary-research.index');
}

    public function edit(InterdisciplinaryResearch $interdisciplinaryResearch)
    {
        $interdisciplinaryResearches = InterdisciplinaryResearch::all();
        return view('backend.interdisciplinary_research', compact('interdisciplinaryResearch', 'interdisciplinaryResearches'));
    }

    public function update(Request $request, InterdisciplinaryResearch $interdisciplinaryResearch)
    {
        $request->validate([
            'discipline' => 'required',
            'lab_name' => 'required',
            'link' => 'nullable',
            'picture' => 'nullable|array',
            'picture.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['discipline', 'lab_name', 'link']);
        $pictures = json_decode($interdisciplinaryResearch->picture, true) ?? [];

        // Upload new pictures and merge them with existing ones
        if ($request->hasFile('picture')) {
            foreach ($request->file('picture') as $pictureFile) {
                $imageName = time() . '_' . $pictureFile->getClientOriginalName();
                $pictureFile->move(public_path('uploads/interdisciplinary_research'), $imageName);
                $pictures[] = $imageName;
            }
        }

        // Handle deleted pictures
        if ($request->has('deleted_pictures')) {
            foreach ($request->input('deleted_pictures') as $deletedPicture) {
                $picturePath = public_path('uploads/interdisciplinary_research/' . $deletedPicture);
                if (file_exists($picturePath)) {
                    unlink($picturePath);
                }
                // Remove the deleted picture from the $pictures array
                $key = array_search($deletedPicture, $pictures);
                if ($key !== false) {
                    unset($pictures[$key]);
                }
            }
        }

        $data['picture'] = json_encode($pictures);

        $interdisciplinaryResearch->update($data);

        Session::flash('success', 'Record updated successfully.');
        return redirect()->route('interdisciplinary-research.index');
    }


    public function destroy(InterdisciplinaryResearch $interdisciplinaryResearch)
    {
    // Decode the JSON data and get the picture filenames
    $pictures = json_decode($interdisciplinaryResearch->picture, true);

    if (is_array($pictures)) {
        // Delete associated pictures and their files
        foreach ($pictures as $picture) {
            $picturePath = public_path('uploads/interdisciplinary_research/' . $picture);
            if (file_exists($picturePath)) {
                unlink($picturePath);
            }
        }
    }

    $interdisciplinaryResearch->delete();

    return redirect()->route('interdisciplinary-research.index')->with('success', 'Record deleted successfully');
    }

}
