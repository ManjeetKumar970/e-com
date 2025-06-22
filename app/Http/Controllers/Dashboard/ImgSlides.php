<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\ImgSlide;
use Illuminate\Http\Request;

class ImgSlides extends Controller
{

    public function slider()
    {
        return view('dashboard.pages.sliderImg');
    }
    public function storeSlider(Request $request)
    {
    
       
        $validated = $request->validate([
            'title1' => 'required|string|max:255',
            'title2' => 'required|string|max:255',
            'title3' => 'required|string|max:255',
            'description1' => 'nullable|string|max:500',
            'description2' => 'nullable|string|max:500',
            'description3' => 'nullable|string|max:500',
            'img1' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'img2' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'img3' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

      $data=request()->all();

        // Handle image uploads
        $imagePaths = [];

        if ($request->hasFile('img1')) {
            $imagePaths['images1'] = $request->file('img1')->store('uploads/slider', 'public');
        } else {
            $imagePaths['images1'] = null;
        }
        if ($request->hasFile('img2')) {
            $imagePaths['images2'] = $request->file('img2')->store('uploads/slider', 'public');
        } else {
            $imagePaths['images2'] = null;
        }
        if ($request->hasFile('img3')) {
            $imagePaths['images3'] = $request->file('img3')->store('uploads/slider', 'public');
        } else {
            $imagePaths['images3'] = null;
        }

        $data = array_merge($data, $imagePaths);
        // Clear existing entries and insert new one
        $imgSlide = ImgSlide::query()->create($data);

        if ($imgSlide) {
            return redirect()->route('dashboard.slider')->with('success', 'Slider images updated successfully.');
        } else {
            return redirect()->route('dashboard.slider')->with('error', 'Failed to update slider images.');
        }
    }
}
