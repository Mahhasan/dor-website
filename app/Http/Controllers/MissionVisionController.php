<?php

namespace App\Http\Controllers;

use App\Models\MissionVision;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
        
        MissionVision::create($request->all());
        return redirect()->route('mission-vision.index')
            ->with('success', 'Record created successfully');
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
    
        $missionVision->update($request->all());
        return redirect()->route('mission-vision.index')
            ->with('success', 'Record updated successfully');
    }

    public function destroy(MissionVision $missionVision)
    {
        // Delete the database record
        $missionVision->delete();

        return redirect()->route('mission-vision.index')
            ->with('success', 'Record and file deleted successfully');
    }
}