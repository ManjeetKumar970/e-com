<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function home() {
    $sliders = Slider::orderBy('order')->get();
    return view('dashboard.pages.home', compact('sliders'));
}

public function upload(Request $request) {
    // Validate files and required fields
    $request->validate([
        'title' => 'required|string|max:255',
        'dscription' => 'required|string|max:500',
        'slider_images.*' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048'
    ]);

    $currentCount = Slider::count();
    $newImages = count($request->file('slider_images'));

    if ($currentCount + $newImages > 4) {
        return back()->with('error', 'Maximum 4 slider images allowed!');
    }

    foreach ($request->file('slider_images') as $image) {
        $path = $image->store('sliders', 'public');

        Slider::create([
            'image_path'  => $path,
            'title'       => $request->input('title'),
            'description' => $request->input('dscription')
        ]);
    }

    return back()->with('success', 'Images uploaded successfully!');
}

}
