<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of categories
     */
    public function index()
    {
        $categories = Category::with('parent')
            ->orderBy('sort_order')
            ->orderBy('name')
            ->paginate(20);
            
        return view('dashboard.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new category
     */
  // File: app/Http/Controllers/Admin/CategoryController.php

public function create()
{
    // Only get categories that can be parents (main categories or level 1)
    $parentCategories = Category::whereNull('parent_id')
        ->orWhereHas('parent', function($query) {
            $query->whereNull('parent_id'); // Allow 2-level hierarchy
        })
        ->active()
        ->orderBy('name')
        ->get();
        
    return view('dashboard.categories.create', compact('parentCategories'));
}

    /**
     * Store a newly created category
     */
    public function storeCategory(Request $request)
    {
      
        $request->validate([
            'name' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:categories,id',
            'description' => 'nullable|string',
            'sort_order' => 'nullable|integer',
            'category_type'=>'nullable|string'
        ]);

        $category = Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'parent_id' => $request->parent_id,
            'categories_types'=>$request->category_type,
            'sort_order' => $request->sort_order ?? 0,
            'is_active' => $request->has('is_active'),
            'show_in_menu' => $request->has('show_in_menu'),
        ]);

        return redirect()
            ->route('dashboard.categories.index')
            ->with('success', 'Category created successfully!');
    }

    /**
     * Show the form for editing the specified category
     */
    public function edit($id)
    {
        $category = Category::where('id', $id)->firstOrFail();
        
        $parentCategories = Category::whereNull('parent_id')
            ->where('id', '!=', $category->id)
            ->active()
            ->orderBy('name')
            ->get();

        return view('dashboard.categories.edit', compact('category', 'parentCategories'));
    }


    /**
     * Update the specified category
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:categories,id',
            'description' => 'nullable|string',
            'sort_order' => 'nullable|integer',
        ]);

        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'parent_id' => $request->parent_id,
            'sort_order' => $request->sort_order ?? 0,
            'is_active' => $request->has('is_active'),
            'show_in_menu' => $request->has('show_in_menu'),
        ]);

        return redirect()
            ->route('dashboard.categories.index')
            ->with('success', 'Category updated successfully!');
    }

    /**
     * Remove the specified category
     */
    public function destroy($id)
    {
         $category = Category::where('id', $id)->firstOrFail();
        // Check if category has products
        if ($category->products()->count() > 0) {
            return back()->with('error', 'Cannot delete category with products!');
        }

        // Check if category has children
        if ($category->children()->count() > 0) {
            return back()->with('error', 'Cannot delete category with subcategories!');
        }

        $category->delete();

        return redirect()
            ->route('dashboard.categories.index')
            ->with('success', 'Category deleted successfully!');
    }
}

