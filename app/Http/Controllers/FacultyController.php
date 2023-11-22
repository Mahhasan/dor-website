<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Models\Faculty;
use Illuminate\Http\Request;

class FacultyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $faculties = Faculty::all();
        return view('backend.faculty', compact('faculties'));
    }

    public function create()
    {
        $faculty = new Faculty();
        return view('backend.faculty', compact('faculty'));
    }

    public function store(Request $request)
    {
        try{
            $request->validate([
                'full_name' => 'required',
                'short_name' => 'required',
            ]);

            Faculty::create([
                'full_name' => $request->full_name,
                'short_name' => $request->short_name,
                'slug' => Str::slug($request->full_name),
            ]);

            return redirect()->route('faculty.index')->with('success', 'Record created successfully');
        }
        catch (\Exception $e) {
            return redirect()->route('faculty.index')->with('warning', "Failed to create record! Please try again");
        }
    }

    public function edit(Faculty $faculty)
    {
        $faculties = Faculty::all();
        return view('backend.faculty', compact('faculty', 'faculties'));
    }

    public function update(Request $request, Faculty $faculty)
    {
        try{
            $request->validate([
                'full_name' => 'required',
                'short_name' => 'required',
            ]);
        
            $faculty->update([
                'full_name' => $request->full_name,
                'short_name' => $request->short_name,
                'slug' => Str::slug($request->full_name), // Generate slug here
            ]);
        
            return redirect()->route('faculty.index')->with('success', 'Record updated successfully');
        }
        catch (\Exception $e) {
            return redirect()->route('faculty.index')->with('warning', "Failed to update record! Please try again");
        }
    }

    public function destroy(Faculty $faculty)
    {
        try{
            $faculty->delete();

            return redirect()->route('faculty.index')->with('success', 'Record deleted successfully');
        }
        catch (\Exception $e) {
            return redirect()->route('faculty.index')->with('warning', "Failed to delete record! Please try again");
        }
    }
}
