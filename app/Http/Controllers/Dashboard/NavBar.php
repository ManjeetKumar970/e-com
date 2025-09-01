<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dashboard\NavCategory;
use App\Models\Dashboard\SubCategory;

class NavBar extends Controller
{
    public function navcategory()
    {
        return view('dashboard.pages.navcategory');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'slug'     => 'required|string|unique:navcategories,slug',
            'sub_name' => 'required|string|max:255',
            'sub_slug' => 'required|string|unique:subcategories,slug',
        ]);

        // Create category
        $category = NavCategory::create([
            'name' => $request->name,
            'slug' => $request->slug,
        ]);

        // Create subcategory
        SubCategory::create([
            'navcategory_id' => $category->id,
            'name'           => $request->sub_name,
            'slug'           => $request->sub_slug,
        ]);

        return redirect()->back()->with('success', 'Category & SubCategory created successfully.');
    }

}
