<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
   public function category()
    {
        $categories = Category::orderBy('display_order', 'asc')->get();
        return view('dashboard.pages.createcategory', compact('categories'));
    }
    public function storecategory(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'slug' => 'required|max:100|unique:categories,slug',
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->description = $request->description;
        $category->parent_id = $request->parent_id;
        $category->display_order = $request->order ?? 0;
        $category->is_active = $request->has('is_active');

        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('categories', 'public');
            $category->image_url = $path; 
        } elseif ($request->filled('image_url')) {
            $category->image_url = $request->image_url;
        }

        $category->save();

        return redirect()->back()->with('success', 'Category created successfully!');
    }

// Get category data for editing
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return response()->json($category);
    }

    // Update existing category
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

  
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'slug' => 'required|string|max:100|unique:categories,slug,' . $id,
            'description' => 'nullable|string',
            'parent_id' => 'nullable|exists:categories,id',
            'order' => 'nullable|integer',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'image_url' => 'nullable|url|max:255',
            'is_active' => 'nullable'
        ]);

        if ($validated['parent_id'] == $id) {
            return back()->withErrors(['parent_id' => 'A category cannot be its own parent.']);
        }
        $category->name = $validated['name'];
        $category->slug = $validated['slug'];
        $category->description = $validated['description'] ?? null;
        $category->parent_id = $validated['parent_id'] ?? null;
        $category->display_order = $validated['order'] ?? 0;
        $category->is_active = $request->has('is_active') ? 1 : 0;
        if ($request->hasFile('image_file')) {
            if ($category->image_url && !filter_var($category->image_url, FILTER_VALIDATE_URL)) {
                Storage::disk('public')->delete($category->image_url);
            }
            
            $path = $request->file('image_file')->store('categories', 'public');
            $category->image_url = $path;
        } elseif ($request->filled('image_url')) {
            if ($category->image_url && !filter_var($category->image_url, FILTER_VALIDATE_URL)) {
                Storage::disk('public')->delete($category->image_url);
            }
            $category->image_url = $validated['image_url'];
        }

        $category->save();

        return redirect()->route('dashboard.category')
            ->with('success', 'Category updated successfully!');
    }

    // Delete category
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        if ($category->children()->count() > 0) {
            return back()->withErrors(['error' => 'Cannot delete category with subcategories. Please delete or reassign subcategories first.']);
        }

        if ($category->image_url && !filter_var($category->image_url, FILTER_VALIDATE_URL)) {
            Storage::disk('public')->delete($category->image_url);
        }

        $category->delete();

        return redirect()->back()
            ->with('success', 'Category deleted successfully!');
    }
}
