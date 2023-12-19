<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InterdisciplinaryResearch;

class InterdisciplinaryResearchController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        // $interdisciplinaryResearches = InterdisciplinaryResearch::all();
        $interdiscipline = InterdisciplinaryResearch::all();
        $sciencediscipline = InterdisciplinaryResearch::WHERE('discipline', 'Science Discipline')->get();
        return view('backend.interdisciplinary_research', compact('interdiscipline', 'sciencediscipline'));
    }

    public function create()
    {
        // Define an empty researchCoordinator object
        $interdisciplinaryResearch = new InterdisciplinaryResearch();
        return view('backend.interdisciplinary_research', compact('interdisciplinaryResearch'));
    }

    public function store(Request $request)
{
    try{
        $request->validate([
            'discipline' => 'required',
            'lab_name' => 'required',
            'lab_number' => 'nullable',
            'link' => 'nullable',
            'picture' => 'nullable|array',
            'picture.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'person_name' => 'nullable',
            'designation' => 'nullable',
            'cell' => 'nullable',
            'email' => 'nullable',
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
            'lab_number' => $request->lab_number,
            'picture' => json_encode($pictures), // Store filenames as JSON
            'person_name' => $request->person_name,
            'designation' => $request->designation,
            'cell' => $request->cell,
            'email' => $request->email,
        ]);

        return redirect()->route('interdisciplinary.research.index')->with('success', 'Record Created successfully');
    }
    catch (\Exception $e) {
        return redirect()->route('interdisciplinary.research.index')->with('warning', "Failed to create record! Please try again");
    }
}

    public function edit(InterdisciplinaryResearch $interdisciplinaryResearch)
    {
        // $interdisciplinaryResearches = InterdisciplinaryResearch::all();
        $interdiscipline = InterdisciplinaryResearch::all();
        $sciencediscipline = InterdisciplinaryResearch::WHERE('discipline', 'Science Discipline')->get();
        return view('backend.interdisciplinary_research', compact('interdisciplinaryResearch', 'interdiscipline', 'sciencediscipline'));
    }

    public function update(Request $request, InterdisciplinaryResearch $interdisciplinaryResearch)
    {
        try{
            $request->validate([
                'discipline' => 'required',
                'lab_name' => 'required',
                'link' => 'nullable',
                'picture' => 'nullable|array',
                'picture.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $data = $request->only(['discipline', 'lab_name', 'lab_number', 'link', 'person_name', 'designation', 'cell', 'email']);
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
            return redirect()->route('interdisciplinary.research.index')->with('success', 'Record Updated successfully');
        }
        catch (\Exception $e) {
            return redirect()->route('interdisciplinary.research.index')->with('warning', "Failed to update record! Please try again");
        }
    }


    public function destroy(InterdisciplinaryResearch $interdisciplinaryResearch)
    {
        // Decode the JSON data and get the picture filenames
        $pictures = json_decode($interdisciplinaryResearch->picture, true);

        try{
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

            return redirect()->route('interdisciplinary.research.index')->with('success', 'Record deleted successfully');
        }
        catch (\Exception $e) {
            return redirect()->route('interdisciplinary.research.index')->with('warning', "Failed to delete record! Please try again");
        }
    }

}
