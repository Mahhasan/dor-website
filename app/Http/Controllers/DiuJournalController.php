<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DiuJournal;
use Illuminate\Support\Facades\Session;

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
        ]);

        Session::flash('success', 'Record created successfully.');
        return redirect()->route('diu-journals.index');
    }

    public function edit(DiuJournal $diuJournal)
    {
        $diuJournals = DiuJournal::all();
        return view('backend.diu_journal', compact('diuJournal', 'diuJournals'));
    }

    public function update(Request $request, DiuJournal $diuJournal)
    {
        $rules = [
            'name' => 'required',
            'link' => 'required',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    
        
    
        $data = $request->only(['name', 'link']);
    
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
    
        Session::flash('success', 'Record updated successfully.');
        return redirect()->route('diu-journals.index');
    }
    

    public function destroy(DiuJournal $diuJournal)
    {
        // Delete the associated picture file
        $picturePath = public_path('uploads/diu_journal/' . $diuJournal->picture);
        if (file_exists($picturePath)) {
            unlink($picturePath);
        }

        $diuJournal->delete();

        return redirect()->route('diu-journals.index')->with('success', 'Record deleted successfully');
    }
}
