<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Models\Department;
use App\Models\Faculty;

use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::all();
        $faculties = Faculty::all();
        return view('backend.department', compact('departments', 'faculties'));
    }

    public function create()
    {
        $department = new Department();
        return view('backend.department', compact('department'));
    }

    public function store(Request $request)
    {
        try{
            $request->validate([
                'full_name' => 'required',
                'short_name' => 'required',
                'faculty_id' => 'required',
            ]);

            Department::create([
                'faculty_id' => $request->faculty_id,
                'full_name' => $request->full_name,
                'short_name' => $request->short_name,
                'slug' => Str::slug($request->full_name),
            ]);

            return redirect()->route('department.index')->with('success', 'Record created successfully');
        }
        catch (\Exception $e) {
            return redirect()->route('department.index')->with('warning', "Failed to create record! Please try again");
        }
    }

    public function edit(Department $department)
    {
        $departments = Department::all();
        $faculties = Faculty::all();
        return view('backend.department', compact('department', 'departments', 'faculties'));
    }

    public function update(Request $request, Department $department)
    {
        try{
            $request->validate([
                'full_name' => 'required',
                'short_name' => 'required',
                'faculty_id' => 'required',

            ]);

            $department->update([
                'faculty_id' => $request->faculty_id,
                'full_name' => $request->full_name,
                'short_name' => $request->short_name,
                'slug' => Str::slug($request->full_name), // Generate slug here
            ]);
        
            return redirect()->route('department.index')->with('success', 'Record updated successfully');
        }
        catch (\Exception $e) {
            return redirect()->route('department.index')->with('warning', "Failed to update record! Please try again");
        }
    }

    public function destroy(Department $department)
    {
        try{
            $department->delete();

            return redirect()->route('department.index')->with('success', 'Record deleted successfully');
        }
        catch (\Exception $e) {
            return redirect()->route('department.index')->with('warning', "Failed to delete record! Please try again");
        }
    }
}
