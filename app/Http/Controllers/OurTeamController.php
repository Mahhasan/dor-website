<?php

namespace App\Http\Controllers;

use App\Models\OurTeam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OurTeamController extends Controller
{
    public function index()
    {
        $ourTeams = OurTeam::all();
        return view('backend.our_team', compact('ourTeams'));
    }

    public function create()
    {
        // Define an empty researchCoordinator object
        $ourTeam = new OurTeam();
        return view('backend.our_team', compact('ourTeam'));
    }

    public function store(Request $request)
    {
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
            'faculty' => $request->faculty,
            'level' => $request->level,
            'picture' => $imageName,
        ]);

        Session::flash('success', 'Record created successfully.');
        return redirect()->route('our-team.index');
    }

    public function edit(OurTeam $ourTeam)
    {
        $ourTeams = OurTeam::all();
        return view('backend.our_team', compact('ourTeam', 'ourTeams'));
    }

    public function update(Request $request, OurTeam $ourTeam)
    {
        $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'level' => 'required',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['name', 'designation', 'email', 'cell', 'department', 'faculty', 'level']);

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

        Session::flash('success', 'Record updated successfully.');
        return redirect()->route('our-team.index');
    }

    public function destroy(OurTeam $ourTeam)
    {
        // Delete the associated picture file
        $picturePath = public_path('uploads/our_team/' . $ourTeam->picture);
        if (file_exists($picturePath)) {
            unlink($picturePath);
        }

        $ourTeam->delete();

        return redirect()->route('our-team.index')->with('success', 'Record deleted successfully');
    }
}