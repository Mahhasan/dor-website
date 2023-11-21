<?php

namespace App\Http\Controllers;

use App\Models\OurTeam;
use App\Models\Faculty;
use Illuminate\Http\Request;

class OurTeamController extends Controller
{
    public function index()
    {
        $ourTeams = OurTeam::all();
        $faculties = Faculty::all();
    return view('backend.our_team', compact('faculties', 'ourTeams'));
    }

    public function create()
    {
        // Define an empty researchCoordinator object
        $ourTeam = new OurTeam();
        return view('backend.our_team', compact('ourTeam'));
    }

    public function store(Request $request)
    {
        try{
            $request->validate([
                'name' => 'required',
                'designation' => 'required',
                'level' => 'required',
                'picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
            $imageName = time() . '.' . $request->picture->extension();
            $request->picture->move(public_path('uploads/our_team'), $imageName);

            OurTeam::create([
                'name' => $request->name,
                'designation' => $request->designation,
                'email' => $request->email,
                'cell' => $request->cell,
                'department' => $request->department,
                'faculty_id' => $request->faculty_id,
                'level' => $request->level,
                'picture' => $imageName,
            ]);
            return redirect()->route('our.team.index')->with('success', "Record created successfully.");
        }
        catch (\Exception $e) {
            return redirect()->route('our.team.index')->with('warning', "Failed to create record! Please try again");
        }
    }

    public function edit(OurTeam $ourTeam)
    {
        $ourTeams = OurTeam::all();
        $faculties = Faculty::all();
        return view('backend.our_team', compact('ourTeam', 'faculties', 'ourTeams'));
    }

    public function update(Request $request, OurTeam $ourTeam)
    {
        $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'level' => 'required',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try{
            $data = $request->only(['name', 'designation', 'email', 'cell', 'department', 'faculty_id', 'level']);
        
            if ($request->hasFile('picture')) {
                $oldPicturePath = public_path('uploads/our_team/' . $ourTeam->picture);
                if (file_exists($oldPicturePath)) {
                    unlink($oldPicturePath);
                }

                $imageName = time() . '.' . $request->picture->extension();
                $request->picture->move(public_path('uploads/our_team'), $imageName);
                $data['picture'] = $imageName;
            }

            $ourTeam->update($data);
            return redirect()->route('our.team.index')->with('success', "Record updated successfully.");
        }
        catch (\Exception $e) {
            return redirect()->route('our.team.index')->with('warning', "Failed to update record! Please try again");
        }
    }

    public function destroy(OurTeam $ourTeam)
    {
        // Delete the associated picture file
        $picturePath = public_path('uploads/our_team/' . $ourTeam->picture);
        if (file_exists($picturePath)) {
            unlink($picturePath);
        }
        try{
            $ourTeam->delete();

            return redirect()->route('our.team.index')->with('success', "Record deleted successfully.");
        }
        catch(\Exception $e) {
            return redirect()->route('our.team.index')->with('warning', "Failed to delete record! Please try again"); 
        }
    }
}