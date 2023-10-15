<?php

namespace App\Http\Controllers;

use App\Models\WebsiteSlider;
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
        try{
            $imageName = time() . '.' . $request->picture->extension();
            $request->picture->move(public_path('uploads/website_slider'), $imageName);

            WebsiteSlider::create([
                'picture' => $imageName,
            ]);
            return redirect()->route('website-slider.index')->with('success', "New slider image added successfully."); 
        }
        catch(\Exception $e) {
            // $msg = $e->getMessage();
            return redirect('website-slider.index')->with('fail', "Failed to create record! Please try again"); 
        } 
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
    
        $data = $request->only([]);
        try{
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
        
            return redirect()->route('website-slider.index')->with('success', "Slider image updated successfully."); 
        }
        catch(\Exception) {
            return redirect('website-slider.index')->with('fail', "Failed to update record! Please try again"); 
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

            return redirect()->route('website-slider.index')->with('success', 'Slider image deleted successfully');
        }
        catch(\Exception) {
            return redirect('website-slider.index')->with('fail', "Failed to delete record! Please try again"); 
        } 
    }
}
