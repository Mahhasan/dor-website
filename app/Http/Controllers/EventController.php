<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
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
            'event_details' => 'required',
        ]);

        Event::create([
            'title' => $request->title,
            'event_details' => $request->event_details,
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
        $request->validate([
            'title' => 'required',
            'event_details' => 'required',
        ]);
    
        $event->update($request->all());
    
        Session::flash('success', 'Record updated successfully.');
        return redirect()->route('events.index');
    }
    

    public function destroy(event $event)
    {
        $event->delete();

        return redirect()->route('events.index')->with('success', 'Record deleted successfully');
    }

}
