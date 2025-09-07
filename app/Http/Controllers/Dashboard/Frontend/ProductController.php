<?php

namespace App\Http\Controllers\Dashboard\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display product detail page
     */
    public function show(Product $product)
    {
        // Get related products from same categories
        $relatedProducts = Product::active()
            ->whereHas('categories', function($query) use ($product) {
                $query->whereIn('categories.id', $product->categories->pluck('id'));
            })
            ->where('id', '!=', $product->id)
            ->with('categories')
            ->take(8)
            ->get();

        return view('frontend.product', compact('product', 'relatedProducts'));
    }

    /**
     * Search products
     */
    public function search(Request $request)
    {
        $query = Product::active()->with('categories');
        
        if ($request->q) {
            $query->where(function($q) use ($request) {
                $q->where('name', 'LIKE', '%' . $request->q . '%')
                  ->orWhere('description', 'LIKE', '%' . $request->q . '%')
                  ->orWhere('sku', 'LIKE', '%' . $request->q . '%');
            });
        }

        $products = $query->paginate(12);
        
        return view('frontend.search', compact('products'));
    }
}
