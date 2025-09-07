<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Category;
use App\Models\Dashboard\NavbarItem;
use Illuminate\Http\Request;

class NavbarController extends Controller
{
    /**
     * Display a listing of navbar items
     */
    public function index()
    {
        $navbarItems = NavbarItem::with(['parent', 'category', 'children'])
            ->whereNull('parent_id') // Only top-level items
            ->orderBy('sort_order')
            ->get();
            
        return view('dashboard.navbar.index', compact('navbarItems'));
    }

    /**
     * Show the form for creating a new navbar item
     */
    public function create()
    {
        $parentItems = NavbarItem::whereNull('parent_id')
            ->orderBy('sort_order')
            ->get();
            
        $categories = Category::where('is_active', 1) // Use where instead of active() if scope doesn't exist
            ->orderBy('name')
            ->get();
            
        return view('dashboard.navbar.create', compact('parentItems', 'categories'));
    }

    /**
     * Store a newly created navbar item
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'url' => 'nullable|string',
            'type' => 'required|in:link,dropdown',
            'parent_id' => 'nullable|exists:navbar_items,id',
            'category_id' => 'nullable|exists:categories,id',
            'sort_order' => 'nullable|integer',
        ]);

        $menuItem = NavbarItem::create([
            'title' => $request->title,
            'url' => $request->url,
            'type' => $request->type,
            'parent_id' => $request->parent_id,
            'category_id' => $request->category_id,
            'sort_order' => $request->sort_order ?? 0,
            'is_active' => $request->has('is_active') ? 1 : 0,
            'target' => $request->target ?? '_self',
            'icon' => $request->icon,
        ]);

        // Return JSON response for AJAX
        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Menu item created successfully!',
                'data' => $menuItem
            ]);
        }

        return redirect()
            ->route('navbar.index')
            ->with('success', 'Menu item created successfully!');
    }

    /**
     * Show the form for editing the specified navbar item
     */
    public function edit(NavbarItem $navbar)
    {
        $parentItems = NavbarItem::whereNull('parent_id')
            ->where('id', '!=', $navbar->id)
            ->orderBy('sort_order')
            ->get();
            
        $categories = Category::where('is_active', 1)
            ->orderBy('name')
            ->get();
            
        return view('navbar.edit', compact('navbar', 'parentItems', 'categories'));
    }

    /**
     * Update the specified navbar item
     */
    public function update(Request $request, NavbarItem $navbar)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'url' => 'nullable|string',
            'type' => 'required|in:link,dropdown',
            'parent_id' => 'nullable|exists:navbar_items,id',
            'category_id' => 'nullable|exists:categories,id',
            'sort_order' => 'nullable|integer',
        ]);

        $navbar->update([
            'title' => $request->title,
            'url' => $request->url,
            'type' => $request->type,
            'parent_id' => $request->parent_id,
            'category_id' => $request->category_id,
            'sort_order' => $request->sort_order ?? 0,
            'is_active' => $request->has('is_active') ? 1 : 0,
            'target' => $request->target ?? '_self',
            'icon' => $request->icon,
        ]);

        return redirect()
            ->route('navbar.index')
            ->with('success', 'Menu item updated successfully!');
    }

    /**
     * Remove the specified navbar item
     */
    public function destroy(NavbarItem $navbar)
    {
        // Check if item has children
        if ($navbar->children()->count() > 0) {
            if (request()->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Cannot delete menu item with sub-items!'
                ], 400);
            }
            return back()->with('error', 'Cannot delete menu item with sub-items!');
        }

        $navbar->delete();

        if (request()->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Menu item deleted successfully!'
            ]);
        }

        return redirect()
            ->route('navbar.index')
            ->with('success', 'Menu item deleted successfully!');
    }

    /**
     * Toggle the active status of navbar item
     */
    public function toggleStatus(NavbarItem $navbar)
    {
        $navbar->update(['is_active' => !$navbar->is_active]);
        
        return response()->json([
            'success' => true, 
            'status' => $navbar->is_active,
            'message' => 'Menu item status updated!'
        ]);
    }
}
