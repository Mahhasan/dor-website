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
        try{
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
        catch (\Exception $e) {
            return redirect()->route('events.index')->with('warning', "Failed to create record! Please try again");
        }
    }

    public function edit(Event $event)
    {
        $events = Event::all();
        return view('backend.event', compact('event', 'events'));
    }

    public function update(Request $request, Event $event)
    {
        try{
            $request->validate([
                'title' => 'required',
                'year' => 'required',
                'event_details' => 'required',
            ]);
        
            $event->update($request->all());
        
            return redirect()->route('events.index')->with('success', 'Record updated successfully');
        }
        catch (\Exception $e) {
            return redirect()->route('events.index')->with('warning', "Failed to update record! Please try again");
        }
    }
    

    public function destroy(Event $event)
    {
        try{
            $event->delete();

            return redirect()->route('events.index')->with('success', 'Record deleted successfully');
        }
        catch (\Exception $e) {
            return redirect()->route('events.index')->with('warning', "Failed to delete record! Please try again");
        }
    }

}
