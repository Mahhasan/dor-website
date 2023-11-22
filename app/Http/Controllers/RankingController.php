<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ranking;

class RankingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $rankings = Ranking::orderByDesc('year')->orderByDesc('id')->get();
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
        try{
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

            return redirect()->route('rankings.index')->with('success', 'Record created successfully.');
        }
        catch (\Exception $e) {
            return redirect()->route('rankings.index')->with('warning', "Failed to create record! Please try again");
        }
    }

    public function edit(Ranking $ranking)
    {
        $rankings = Ranking::all();
        return view('backend.ranking', compact('ranking', 'rankings'));
    }

    public function update(Request $request, Ranking $ranking)
    {
        try{
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
        
            return redirect()->route('rankings.index')->with('success', 'Record updated successfully.');
        }
        catch (\Exception $e) {
            return redirect()->route('rankings.index')->with('warning', "Failed to update record! Please try again");
        }
    }
    

    public function destroy(Ranking $ranking)
    {
        try{
            // Delete the associated picture file
            $picturePath = public_path('uploads/ranking/' . $ranking->picture);
            if (file_exists($picturePath)) {
                unlink($picturePath);
            }

            $ranking->delete();

            return redirect()->route('rankings.index')->with('success', 'Record deleted successfully');
        }
        catch (\Exception $e) {
            return redirect()->route('rankings.index')->with('warning', "Failed to delete record! Please try again");
        }
    }
}
