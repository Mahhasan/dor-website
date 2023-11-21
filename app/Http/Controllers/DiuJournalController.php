<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\DiuJournal;

class DiuJournalController extends Controller
{
    public function index()
    {
        $diuJournals = DiuJournal::all();
        return view('backend.diu_journal', compact('diuJournals'));
    }

    public function create()
    {
        // Define an empty researchCoordinator object
        $diuJournal = new DiuJournal();
        return view('backend.diu_journal', compact('diuJournal'));
    }

    public function store(Request $request)
    {
        try{
            $request->validate([
                'name' => 'required',
                'picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'link' => 'required',
            ]);

            $imageName = time() . '.' . $request->picture->extension();
            $request->picture->move(public_path('uploads/diu_journal'), $imageName);

            DiuJournal::create([
                'name' => $request->name,
                'link' => $request->link,
                'picture' => $imageName,
                'slug' => Str::slug($request->name),
            ]);

            return redirect()->route('diu.journals.index')->with('success', 'Record created successfully.');
        }
        catch (\Exception $e) {
            return redirect()->route('diu.journals.index')->with('warning', "Failed to create record! Please try again");
        }
    }

    public function edit(DiuJournal $diuJournal)
    {
        $diuJournals = DiuJournal::all();
        return view('backend.diu_journal', compact('diuJournal', 'diuJournals'));
    }

    public function update(Request $request, DiuJournal $diuJournal)
    {
        try{
            $rules = [
                'name' => 'required',
                'link' => 'required',
                'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ];
        
            $data = $request->only(['name', 'link']);
            
            // Add slug to data
            $data['slug'] = Str::slug($request->name);
        
            if ($request->hasFile('picture')) {
                $oldPicturePath = public_path('uploads/diu_journal/' . $diuJournal->picture);
                if (file_exists($oldPicturePath)) {
                    unlink($oldPicturePath);
                }
        
                $imageName = time() . '.' . $request->picture->extension();
                $request->picture->move(public_path('uploads/diu_journal'), $imageName);
                $data['picture'] = $imageName;
            }
        
            $diuJournal->update($data);
        
            return redirect()->route('diu.journals.index')->with('success', 'Record updated successfully.');
        }
        catch (\Exception $e) {
            return redirect()->route('diu.journals.index')->with('warning', "Failed to update record! Please try again");
        }
    }
    

    public function destroy(DiuJournal $diuJournal)
    {
        try{
            // Delete the associated picture file
            $picturePath = public_path('uploads/diu_journal/' . $diuJournal->picture);
            if (file_exists($picturePath)) {
                unlink($picturePath);
            }

            $diuJournal->delete();

            return redirect()->route('diu.journals.index')->with('success', 'Record deleted successfully');
        }
        catch (\Exception $e) {
            return redirect()->route('diu.journals.index')->with('warning', "Failed to delete record! Please try again");
        }
    }
}
