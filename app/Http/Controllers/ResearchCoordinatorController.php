<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ResearchCoordinator;

class ResearchCoordinatorController extends Controller
{
    public function index()
    {
        $researchCoordinators = ResearchCoordinator::all();
        return view('backend.research_coordinator', compact('researchCoordinators'));
    }

    public function create()
    {
        // Define an empty researchCoordinator object
        $researchCoordinator = new ResearchCoordinator();
        return view('backend.research_coordinator', compact('researchCoordinator'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'email' => 'required|email',
            'department' => 'required',
            'faculty' => 'required',
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imageName = time() . '.' . $request->picture->extension();
        $request->picture->move(public_path('uploads/research_coordinator'), $imageName);

        ResearchCoordinator::create([
            'name' => $request->name,
            'designation' => $request->designation,
            'email' => $request->email,
            'cell' => $request->cell,
            'department' => $request->department,
            'faculty' => $request->faculty,
            'picture' => $imageName,
        ]);

        return redirect()->route('research-coordinator.index')->with('success', 'Record created successfully');
    }

    public function edit(ResearchCoordinator $researchCoordinator)
    {
        $researchCoordinators = ResearchCoordinator::all();
        return view('backend.research_coordinator', compact('researchCoordinator', 'researchCoordinators'));
    }

    public function update(Request $request, ResearchCoordinator $researchCoordinator)
    {
        $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'email' => 'required|email',
            'department' => 'required',
            'faculty' => 'required',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['name', 'designation', 'email', 'cell', 'department', 'faculty']);

        if ($request->hasFile('picture')) {
            $oldPicturePath = public_path('uploads/research_coordinator/' . $researchCoordinator->picture);
            if (file_exists($oldPicturePath)) {
                unlink($oldPicturePath);
            }

            $imageName = time() . '.' . $request->picture->extension();
            $request->picture->move(public_path('uploads/research_coordinator'), $imageName);
            $data['picture'] = $imageName;
        }

        $researchCoordinator->update($data);

        return redirect()->route('research-coordinator.index')->with('success', 'Record updated successfully');
    }

    public function destroy(ResearchCoordinator $researchCoordinator)
    {
        // Delete the associated picture file
        $picturePath = public_path('uploads/research_coordinator/' . $researchCoordinator->picture);
        if (file_exists($picturePath)) {
            unlink($picturePath);
        }

        $researchCoordinator->delete();

        return redirect()->route('research-coordinator.index')->with('success', 'Record deleted successfully');
    }
}