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
        'picture.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10048',
    ]);

    $pictures = [];

    if ($request->hasFile('picture')) {
        foreach ($request->file('picture') as $picture) {
            $imageName = time() . '_' . uniqid() . '.' . $picture->extension();
            $picture->move(public_path('uploads/interdisciplinary_research'), $imageName);
            $pictures[] = $imageName;
        }
    }

    InterdisciplinaryResearch::create([
        'discipline' => $request->discipline,
        'lab_name' => $request->lab_name,
        'link' => $request->link,
        'picture' => implode(',', $pictures),
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
        'picture.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10048',
    ]);

    $data = $request->only(['discipline', 'lab_name', 'link']);
    $pictures = [];

    if ($request->hasFile('picture')) {
        // Delete existing pictures
        $existingPictures = explode(',', $interdisciplinaryResearch->picture);
        foreach ($existingPictures as $existingPicture) {
            $oldPicturePath = public_path('uploads/interdisciplinary_research/' . $existingPicture);
            if (file_exists($oldPicturePath) && is_file($oldPicturePath)) {
                unlink($oldPicturePath);
            }
        }

        // Upload new pictures
        foreach ($request->file('picture') as $picture) {
            $imageName = time() . '_' . uniqid() . '.' . $picture->extension();
            $picture->move(public_path('uploads/interdisciplinary_research'), $imageName);
            $pictures[] = $imageName;
        }
    } else {
        // No new pictures uploaded, keep the existing ones
        $pictures = explode(',', $interdisciplinaryResearch->picture);
    }

    $data['picture'] = implode(',', $pictures);

    $interdisciplinaryResearch->update($data);

    Session::flash('success', 'Record updated successfully.');
    return redirect()->route('interdisciplinary-research.index');
}

    

    


    public function destroy(InterdisciplinaryResearch $interdisciplinaryResearch)
    {
        // Delete the associated picture file
        $picturePath = public_path('uploads/interdisciplinary_research/' . $interdisciplinaryResearch->picture);
        if (file_exists($picturePath)) {
            unlink($picturePath);
        }

        $interdisciplinaryResearch->delete();

        return redirect()->route('interdisciplinary-research.index')->with('success', 'Record deleted successfully');
    }
}
