<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Category;
use App\Models\Dashboard\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of products
     */
 public function index(Request $request)
    {
        $query = Product::with('categories');

        if ($request->search) {
            $query->where(function($q) use ($request) {
                $q->where('name', 'LIKE', '%' . $request->search . '%')
                  ->orWhere('sku', 'LIKE', '%' . $request->search . '%');
            });
        }

        if ($request->category_id) {
            $query->whereHas('categories', function($q) use ($request) {
                $q->where('categories.id', $request->category_id);
            });
        }

        if ($request->status) {
            $query->where('status', $request->status);
        }

        $products = $query->orderBy('created_at', 'desc')->paginate(20);
        $categories = Category::active()->orderBy('name')->get();

        return view('dashboard.products.index', compact('products', 'categories'));
    }

    /**
     * Show the form for creating a new product
     */
    public function create()
    {
        $categories = Category::active()
            ->orderBy('name')
            ->get()
            ->map(function($category) {
                return [
                    'id' => $category->id,
                    'name' => $category->parent ? $category->parent->name . ' > ' . $category->name : $category->name
                ];
            });
            
        return view('dashboard.products.create', compact('categories'));
    }

    /**
     * Store a newly created product
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'sku' => 'required|string|unique:products,sku',
            'price' => 'required|numeric|min:0',
            'sale_price' => 'nullable|numeric|min:0',
            'stock_quantity' => 'nullable|integer|min:0',
            'categories' => 'required|array',
            'categories.*' => 'exists:categories,id',
            'description' => 'nullable|string',
            'short_description' => 'nullable|string',
            'status' => 'required|in:active,inactive,draft',
        ]);

        $product = Product::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'sku' => $request->sku,
            'price' => $request->price,
            'sale_price' => $request->sale_price,
            'stock_quantity' => $request->stock_quantity ?? 0,
            'description' => $request->description,
            'short_description' => $request->short_description,
            'status' => $request->status,
            'is_active' => $request->has('is_active'),
            'is_featured' => $request->has('is_featured'),
            'in_stock' => ($request->stock_quantity ?? 0) > 0,
        ]);

        // Attach categories (first one as primary)
        foreach ($request->categories as $index => $categoryId) {
            $product->categories()->attach($categoryId, [
                'is_primary' => $index === 0 // First category is primary
            ]);
        }

        return redirect()
            ->route('products.index')
            ->with('success', 'Product created successfully!');
    }

    /**
     * Show the form for editing the specified product
     */
    public function edit(Product $product)
    {
        $categories = Category::active()
            ->orderBy('name')
            ->get()
            ->map(function($category) {
                return [
                    'id' => $category->id,
                    'name' => $category->parent ? $category->parent->name . ' > ' . $category->name : $category->name
                ];
            });

        $selectedCategories = $product->categories->pluck('id')->toArray();

        return view('products.edit', compact('product', 'categories', 'selectedCategories'));
    }

    /**
     * Update the specified product
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'sku' => 'required|string|unique:products,sku,' . $product->id,
            'price' => 'required|numeric|min:0',
            'sale_price' => 'nullable|numeric|min:0',
            'stock_quantity' => 'nullable|integer|min:0',
            'categories' => 'required|array',
            'categories.*' => 'exists:categories,id',
            'description' => 'nullable|string',
            'short_description' => 'nullable|string',
            'status' => 'required|in:active,inactive,draft',
        ]);

        $product->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'sku' => $request->sku,
            'price' => $request->price,
            'sale_price' => $request->sale_price,
            'stock_quantity' => $request->stock_quantity ?? 0,
            'description' => $request->description,
            'short_description' => $request->short_description,
            'status' => $request->status,
            'is_active' => $request->has('is_active'),
            'is_featured' => $request->has('is_featured'),
            'in_stock' => ($request->stock_quantity ?? 0) > 0,
        ]);

        // Sync categories (first one as primary)
        $categoryData = [];
        foreach ($request->categories as $index => $categoryId) {
            $categoryData[$categoryId] = ['is_primary' => $index === 0];
        }
        $product->categories()->sync($categoryData);

        return redirect()
            ->route('products.index')
            ->with('success', 'Product updated successfully!');
    }

    /**
     * Remove the specified product
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()
            ->route('dashboard.products.index')
            ->with('success', 'Product deleted successfully!');
    }
}
