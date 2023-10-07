<?php

namespace App\Http\Controllers;

use App\Models\WebsiteSlider;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class WebsiteSliderController extends Controller
{
    public function index()
    {
        $websiteSliders = WebsiteSlider::all();
        return view('backend.website_slider', compact('websiteSliders'));
    }

    public function create()
    {
        // Define an empty researchCoordinator object
        $websiteSlider = new WebsiteSlider();
        return view('backend.website_slider', compact('websiteSlider'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imageName = time() . '.' . $request->picture->extension();
        $request->picture->move(public_path('uploads/website_slider'), $imageName);

        WebsiteSlider::create([
            'picture' => $imageName,
        ]);

        Session::flash('success', 'Record created successfully.');
        return redirect()->route('website-slider.index');
    }

    public function edit(WebsiteSlider $websiteSlider)
    {
        $websiteSliders = WebsiteSlider::all();
        return view('backend.website_slider', compact('websiteSlider', 'websiteSliders'));
    }

    public function update(Request $request, WebsiteSlider $websiteSlider)
    {
        $rules = [
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    
        // $data = $request->only(['title',]);
    
        if ($request->hasFile('picture')) {
            $oldPicturePath = public_path('uploads/website_slider/' . $websiteSlider->picture);
            if (file_exists($oldPicturePath)) {
                unlink($oldPicturePath);
            }
    
            $imageName = time() . '.' . $request->picture->extension();
            $request->picture->move(public_path('uploads/website_slider'), $imageName);
            $data['picture'] = $imageName;
        }
    
        $websiteSlider->update($data);
    
        Session::flash('success', 'Record updated successfully.');
        return redirect()->route('website-slider.index');
    }
    

    public function destroy(WebsiteSlider $websiteSlider)
    {
        // Delete the associated picture file
        $picturePath = public_path('uploads/website_slider/' . $websiteSlider->picture);
        if (file_exists($picturePath)) {
            unlink($picturePath);
        }

        $websiteSlider->delete();

        return redirect()->route('website-slider.index')->with('success', 'Record deleted successfully');
    }
}
