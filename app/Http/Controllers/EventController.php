<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Session;

class EventController extends Controller
{public function index()
    {
        $events = Event::all();
        return view('backend.event', compact('events'));
    }

    public function create()
    {
        // Define an empty researchCoordinator object
        $event = new Event();
        return view('backend.event', compact('event'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'event_details' => 'required',
        ]);

        $imageName = time() . '.' . $request->picture->extension();
        $request->picture->move(public_path('uploads/event'), $imageName);

        Event::create([
            'title' => $request->title,
            'event_details' => $request->event_details,
            'picture' => $imageName,
        ]);

        Session::flash('success', 'Record created successfully.');
        return redirect()->route('events.index');
    }

    public function edit(event $event)
    {
        $events = Event::all();
        return view('backend.event', compact('event', 'events'));
    }

    public function update(Request $request, event $event)
    {
        $rules = [
            'title' => 'required',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'event_details' => 'required',
        ];
    
        
    
        $data = $request->only(['title', 'event_details']);
    
        if ($request->hasFile('picture')) {
            $oldPicturePath = public_path('uploads/event/' . $event->picture);
            if (file_exists($oldPicturePath)) {
                unlink($oldPicturePath);
            }
    
            $imageName = time() . '.' . $request->picture->extension();
            $request->picture->move(public_path('uploads/event'), $imageName);
            $data['picture'] = $imageName;
        }
    
        $event->update($data);
    
        Session::flash('success', 'Record updated successfully.');
        return redirect()->route('events.index');
    }
    

    public function destroy(event $event)
    {
        // Delete the associated picture file
        $picturePath = public_path('uploads/event/' . $event->picture);
        if (file_exists($picturePath)) {
            unlink($picturePath);
        }

        $event->delete();

        return redirect()->route('events.index')->with('success', 'Record deleted successfully');
    }

// for image upload using check editor
    public function uploadEventImage(Request $request)
    {
        $request->validate([
            'upload' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('upload')) {
            $image = $request->file('upload');
            $imageName = Str::random(20) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/event'), $imageName);

            return response()->json(['url' => asset('uploads/event/' . $imageName)]);
        }

        return response()->json(['error' => 'Image upload failed.']);
    }
}
