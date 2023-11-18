<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Event;

class EventController extends Controller
{
    public function index()
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
            'year' => 'required',
            'event_details' => 'required',
        ]);

        Event::create([
            'title' => $request->title,
            'year' => $request->year,
            'event_details' => $request->event_details,
        ]);

        return redirect()->route('events.index')->with('success', 'Record created successfully');
    }

    public function edit(Event $event)
    {
        $events = Event::all();
        return view('backend.event', compact('event', 'events'));
    }

    public function update(Request $request, Event $event)
    {
        $request->validate([
            'title' => 'required',
            'year' => 'required',
            'event_details' => 'required',
        ]);
    
        $event->update($request->all());
    
        return redirect()->route('events.index')->with('success', 'Record updated successfully');
    }
    

    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('events.index')->with('success', 'Record deleted successfully');
    }

}
