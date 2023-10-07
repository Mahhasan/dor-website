<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Video;
use Illuminate\Support\Facades\Session;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::all();
        return view('backend.videos', compact('videos'));
    }

    public function create()
    {
        // Define an empty researchCoordinator object
        $video = new Video();
        return view('backend.videos', compact('video'));
    }

    public function edit(Video $video)
    {
        $videos = Video::all();
        return view('backend.videos', compact('video', 'videos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'year' => 'required',
            'video_links' => 'nullable|array',
            'video_links.*' => 'url', // Validate video_links as URLs
        ]);

        $videoLinks = [];

        // Store video links
        if ($request->has('video_links')) {
            $videoLinks = $request->input('video_links');
        }

        // Create the video record with title, year, and video links
        Video::create([
            'title' => $request->title,
            'year' => $request->year,
            'video_links' => json_encode($videoLinks), // Store video links as JSON
        ]);

        Session::flash('success', 'Record created successfully.');
        return redirect()->route('videos.index');
    }

    public function update(Request $request, Video $video)
    {
        $request->validate([
            'title' => 'required',
            'year' => 'required',
            'video_links' => 'nullable|array',
            'video_links.*' => 'url', // Validate video_links as URLs
        ]);

        $videoLinks = json_decode($video->video_links, true) ?? [];

        // Store video links
        if ($request->has('video_links')) {
            $videoLinks = $request->input('video_links');
        }

        // Update the video record with title, year, and video links
        $video->update([
            'title' => $request->title,
            'year' => $request->year,
            'video_links' => json_encode($videoLinks), // Store video links as JSON
        ]);

        Session::flash('success', 'Record updated successfully.');
        return redirect()->route('videos.index');
    }

    public function destroy(Video $video)
    {
        // Delete the database record
        $video->delete();

        return redirect()->route('videos.index')->with('success', 'Record deleted successfully');
    }
}
