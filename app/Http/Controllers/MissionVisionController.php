<?php

namespace App\Http\Controllers;

use App\Models\MissionVision;
use Illuminate\Http\Request;

class MissionVisionController extends Controller
{
    public function index()
    {
        $missionVisions = MissionVision::all();
        return view('backend.mission_vision', compact('missionVisions'));
    }

    public function create()
    {
        // Define an empty resource object
        $missionVision = new MissionVision();
        return view('backend.mission_vision', compact('missionVision'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'mission' => 'required',
            'vision' => 'required',
        ]);
        try{    
            MissionVision::create($request->all());
            return redirect()->route('mission.vision.index')->with('success', 'Record created successfully');
        }
        catch(\Exception $e) {
            return redirect()->route('mission.vision.index')->with('warning', "Failed to create record! Please try again"); 
        } 
    }

    public function edit(MissionVision $missionVision)
    {
        $missionVisions = MissionVision::all();
        return view('backend.mission_vision', compact('missionVision', 'missionVisions'));
    }

    public function update(Request $request, MissionVision $missionVision)
    {
        $request->validate([
            'mission' => 'required',
            'vision' => 'required',
        ]);
        try{
            $missionVision->update($request->all());
            return redirect()->route('mission.vision.index')->with('success', 'Record updated successfully');
        }
        catch(\Exception $e) {
            return redirect()->route('mission.vision.index')->with('warning', "Failed to update record! Please try again"); 
        } 
    }

    public function destroy(MissionVision $missionVision)
    {
        // Delete the database record
        try{
            $missionVision->delete();

            return redirect()->route('mission.vision.index')->with('success', 'Record deleted successfully');
        }
        catch(\Exception $e) {
            return redirect()->route('mission.vision.index')->with('warning', "Failed to delete record! Please try again"); 
        } 
    }
}