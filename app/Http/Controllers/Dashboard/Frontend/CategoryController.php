<?php

namespace App\Http\Controllers\Dashboard\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Category;
use App\Models\Dashboard\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display category page with products
     */
    public function show(Category $category, Request $request)
    {
        // Get products in this category (including subcategories)
        $productIds = $this->getCategoryProductIds($category);
        
        $query = Product::active()
            ->whereIn('id', $productIds)
            ->with('categories');

        // Apply filters
        if ($request->min_price) {
            $query->where('price', '>=', $request->min_price);
        }
        
        if ($request->max_price) {
            $query->where('price', '<=', $request->max_price);
        }

        if ($request->sort) {
            switch ($request->sort) {
                case 'price_low':
                    $query->orderBy('price', 'asc');
                    break;
                case 'price_high':
                    $query->orderBy('price', 'desc');
                    break;
                case 'newest':
                    $query->orderBy('created_at', 'desc');
                    break;
                default:
                    $query->orderBy('name', 'asc');
            }
        }

        $products = $query->paginate(12);

        // Get subcategories
        $subcategories = $category->children()
            ->active()
            ->inMenu()
            ->orderedBySortOrder()
            ->get();

        return view('frontend.category', compact('category', 'products', 'subcategories'));
    }

    /**
     * Get all product IDs for a category (including subcategories)
     */
    private function getCategoryProductIds(Category $category): array
    {
        $categoryIds = [$category->id];
        
        // Get all descendant category IDs
        $this->getAllDescendantIds($category, $categoryIds);
        
        // Get product IDs from all these categories
        return DB::table('product_categories')
            ->whereIn('category_id', $categoryIds)
            ->pluck('product_id')
            ->toArray();
    }

    /**
     * Recursively get all descendant category IDs
     */
    private function getAllDescendantIds(Category $category, array &$categoryIds): void
    {
        $children = $category->children()->active()->get();
        
        foreach ($children as $child) {
            $categoryIds[] = $child->id;
            $this->getAllDescendantIds($child, $categoryIds);
        }
    }
}
