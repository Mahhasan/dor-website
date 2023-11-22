<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ResearchCoordinator;
use App\Models\Department;
use App\Models\Faculty;
use Illuminate\Support\Facades\DB;

class ResearchCoordinatorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $researchCoordinators = ResearchCoordinator::all();
        $departments = Department::all();
        $faculties = Faculty::all();
        return view('backend.research_coordinator', compact('researchCoordinators', 'departments', 'faculties'));
    }

    public function create()
    {
        // Define an empty researchCoordinator object
        $researchCoordinator = new ResearchCoordinator();
        return view('backend.research_coordinator', compact('researchCoordinator'));
    }

    public function store(Request $request)
    {
        try{
            $request->validate([
                'name' => 'required',
                'designation' => 'required',
                'email' => 'required|email',
                'department_id' => 'required',
                'faculty_id' => 'required',
                'picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $imageName = time() . '.' . $request->picture->extension();
            $request->picture->move(public_path('uploads/research_coordinator'), $imageName);

            ResearchCoordinator::create([
                'name' => $request->name,
                'designation' => $request->designation,
                'email' => $request->email,
                'cell' => $request->cell,
                'department_id' => $request->department_id,
                'faculty_id' => $request->faculty_id,
                'picture' => $imageName,
            ]);

            return redirect()->route('research.coordinator.index')->with('success', 'Record created successfully');
        }
        catch (\Exception $e) {
            return redirect()->route('research.coordinator.index')->with('warning', "Failed to create record! Please try again");
        }
    }

    public function edit(ResearchCoordinator $researchCoordinator)
    {
        $departments = Department::all();
        $faculties = Faculty::all();
        $researchCoordinators = ResearchCoordinator::all();
        return view('backend.research_coordinator', compact('researchCoordinator', 'researchCoordinators', 'departments', 'faculties'));
    }

    public function update(Request $request, ResearchCoordinator $researchCoordinator)
    {
        try{
            $request->validate([
                'name' => 'required',
                'designation' => 'required',
                'email' => 'required|email',
                'department_id' => 'required',
                'faculty_id' => 'required',
                'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $data = $request->only(['name', 'designation', 'email', 'cell', 'department_id', 'faculty_id']);

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

            return redirect()->route('research.coordinator.index')->with('success', 'Record updated successfully');
        }
        catch (\Exception $e) {
            return redirect()->route('research.coordinator.index')->with('warning', "Failed to update record! Please try again");
        }
    }

    public function destroy(ResearchCoordinator $researchCoordinator)
    {
        try{
            // Delete the associated picture file
            $picturePath = public_path('uploads/research_coordinator/' . $researchCoordinator->picture);
            if (file_exists($picturePath)) {
                unlink($picturePath);
            }

            $researchCoordinator->delete();

            return redirect()->route('research.coordinator.index')->with('success', 'Record deleted successfully');
        }
        catch (\Exception $e) {
            return redirect()->route('research.coordinator.index')->with('warning', "Failed to delete record! Please try again");
        }
    }

    //Get Department depend on faculty
    public function getTopic($id){
        $departments = DB::table("departments")->where("faculty_id",$id)->pluck("full_name","id");
        return json_encode($departments);
    }

}