<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ranking;
use Illuminate\Support\Facades\Session;

class RankingController extends Controller
{
    public function index()
    {
        $rankings = Ranking::all();
        return view('backend.ranking', compact('rankings'));
    }

    public function create()
    {
        // Define an empty researchCoordinator object
        $ranking = new Ranking();
        return view('backend.ranking', compact('ranking'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'year' => 'required',
            'link' => 'required',
        ]);

        $imageName = time() . '.' . $request->picture->extension();
        $request->picture->move(public_path('uploads/ranking'), $imageName);

        Ranking::create([
            'title' => $request->title,
            'year' => $request->year,
            'link' => $request->link,
            'picture' => $imageName,
        ]);

        Session::flash('success', 'Record created successfully.');
        return redirect()->route('ranking.index');
    }

    public function edit(Ranking $ranking)
    {
        $rankings = Ranking::all();
        return view('backend.ranking', compact('ranking', 'rankings'));
    }

    public function update(Request $request, Ranking $ranking)
    {
        $rules = [
            'title' => 'required',
            'year' => 'required',
            'link' => 'required',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    
        
    
        $data = $request->only(['title', 'year', 'link']);
    
        if ($request->hasFile('picture')) {
            $oldPicturePath = public_path('uploads/ranking/' . $ranking->picture);
            if (file_exists($oldPicturePath)) {
                unlink($oldPicturePath);
            }
    
            $imageName = time() . '.' . $request->picture->extension();
            $request->picture->move(public_path('uploads/ranking'), $imageName);
            $data['picture'] = $imageName;
        }
    
        $ranking->update($data);
    
        Session::flash('success', 'Record updated successfully.');
        return redirect()->route('ranking.index');
    }
    

    public function destroy(Ranking $ranking)
    {
        // Delete the associated picture file
        $picturePath = public_path('uploads/ranking/' . $ranking->picture);
        if (file_exists($picturePath)) {
            unlink($picturePath);
        }

        $ranking->delete();

        return redirect()->route('ranking.index')->with('success', 'Record deleted successfully');
    }
}
