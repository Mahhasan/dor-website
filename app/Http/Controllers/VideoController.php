<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Video;

class VideoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $videos = Video::orderByDesc('year')->orderByDesc('id')->paginate(20);
        return view('backend.videos', compact('videos'));
    }

    public function create()
    {
        // Define an empty video object
        $video = new Video();
        return view('backend.videos', compact('video'));
    }

    public function edit(Video $video)
    {
        $videos = Video::paginate(3);
        return view('backend.videos', compact('video', 'videos'));
    }

    public function store(Request $request)
    {
        try{
            $request->validate([
                'title' => 'required',
                'year' => 'required',
                'video_links' => 'required|array',
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

            return redirect()->route('videos.index')->with('success', 'Video Uploaded successfully');
        } 
        catch(\Exception $e) {
            return redirect()->route('videos.index')->with('warning', 'Failed to Create! Please try again');
        }
    }

    public function update(Request $request, Video $video)
    {
        try{
            $request->validate([
                'title' => 'required',
                'year' => 'required',
                'video_links' => 'required|array',
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

        return redirect()->route('videos.index')->with('success', 'Video Updated successfully');
        } 
        catch(\Exception $e) {
            return redirect()->route('videos.index')->with('warning', 'Failed to Update! Please try again');
        }
    }

    public function destroy(Video $video)
    {
        try{
            // Delete the database record
            $video->delete();

            return redirect()->route('videos.index')->with('success', 'Video deleted successfully');
        } 
        catch(\Exception $e) {
            return redirect()->route('videos.index')->with('warning', 'Failed to delete! Please try again');
        }
    }
}
