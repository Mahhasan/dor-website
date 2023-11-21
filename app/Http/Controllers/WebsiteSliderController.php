<?php

namespace App\Http\Controllers;

use App\Models\WebsiteSlider;
use Illuminate\Http\Request;

class WebsiteSliderController extends Controller
{
    public function index()
    {
        $websiteSliders = WebsiteSlider::orderBy('slider_serial')->get();
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
        try{
            $request->validate([
                'picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'slider_serial' => 'required|integer|unique:website_sliders,slider_serial',
            ]);
            $imageName = time() . '.' . $request->picture->extension();
            $request->picture->move(public_path('uploads/website_slider'), $imageName);

            WebsiteSlider::create([
                'picture' => $imageName,
                'slider_serial' => $request->slider_serial,
                'is_visible' => true,
            ]);
            return redirect()->route('website.slider.index')->with('success', "New slider image added successfully."); 
        }
        catch (\Exception $e) {
            return redirect()->route('website.slider.index')->with('warning', "Failed to create record! Please try again");
        }
    }

    public function edit(WebsiteSlider $websiteSlider)
    {
        $websiteSliders = WebsiteSlider::all();
        return view('backend.website_slider', compact('websiteSlider', 'websiteSliders'));
    }

    public function update(Request $request, WebsiteSlider $websiteSlider)
    {
        try{
            $rules = [
                'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'slider_serial' => 'required|integer|unique:website_sliders,slider_serial,' . $websiteSlider->id,
            ];
        
            $data = $request->only(['slider_serial', 'is_visible']);

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
        
            return redirect()->route('website.slider.index')->with('success', "Slider image updated successfully."); 
        }
        catch (\Exception $e) {
            return redirect()->route('website.slider.index')->with('warning', "Failed to update record! Please try again");
        }
    }
    

    public function destroy(WebsiteSlider $websiteSlider)
    {
        // Delete the associated picture file\
        try{
            $picturePath = public_path('uploads/website_slider/' . $websiteSlider->picture);
            if (file_exists($picturePath)) {
                unlink($picturePath);
            }

            $websiteSlider->delete();

            return redirect()->route('website.slider.index')->with('success', 'Slider image deleted successfully');
        }
        catch(\Exception) {
            return redirect('website.slider.index')->with('warning', "Failed to delete record! Please try again"); 
        } 
    }

    public function toggleVisibility($sliderId)
    {
        try {
            $slider = WebsiteSlider::findOrFail($sliderId);
            $slider->update(['is_visible' => !$slider->is_visible]);

            return response()->json(['success' => true, 'is_visible' => $slider->is_visible]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Failed to toggle visibility.']);
        }
    }

}
