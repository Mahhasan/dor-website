<?php

namespace App\Http\Controllers;

use App\Models\DirectorMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DirectorMessageController extends Controller
{
    public function index()
    {
        $directorMessages = DirectorMessage::all();
        return view('backend.director_message', compact('directorMessages'));
    }

    public function create()
    {
        // Define an empty researchCoordinator object
        $directorMessage = new DirectorMessage();
        return view('backend.director_message', compact('directorMessage'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'message' => 'required',
        ]);

        $imageName = time() . '.' . $request->picture->extension();
        $request->picture->move(public_path('uploads/director_message'), $imageName);

        DirectorMessage::create([
            'title' => $request->title,
            'message' => $request->message,
            'picture' => $imageName,
        ]);

        Session::flash('success', 'Record created successfully.');
        return redirect()->route('director-message.index');
    }

    public function edit(DirectorMessage $directorMessage)
    {
        $directorMessages = DirectorMessage::all();
        return view('backend.director_message', compact('directorMessage', 'directorMessages'));
    }

    public function update(Request $request, DirectorMessage $directorMessage)
    {
        $rules = [
            'title' => 'required',
            'message' => 'required',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    
        $data = $request->only(['title', 'message']);
    
        if ($request->hasFile('picture')) {
            $oldPicturePath = public_path('uploads/director_message/' . $directorMessage->picture);
            if (file_exists($oldPicturePath)) {
                unlink($oldPicturePath);
            }
    
            $imageName = time() . '.' . $request->picture->extension();
            $request->picture->move(public_path('uploads/director_message'), $imageName);
            $data['picture'] = $imageName;
        }
    
        $directorMessage->update($data);
    
        Session::flash('success', 'Record updated successfully.');
        return redirect()->route('director-message.index');
    }
    

    public function destroy(DirectorMessage $directorMessage)
    {
        // Delete the associated picture file
        $picturePath = public_path('uploads/director_message/' . $directorMessage->picture);
        if (file_exists($picturePath)) {
            unlink($picturePath);
        }

        $directorMessage->delete();

        return redirect()->route('director-message.index')->with('success', 'Record deleted successfully');
    }
}
