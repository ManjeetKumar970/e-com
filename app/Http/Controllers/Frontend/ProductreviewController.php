<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Product;


class ProductreviewController extends Controller
{
 public function show($slug, $id)
{
    $products = Product::with('primaryImage')->where('category_id', $id)->get();
    $allProducts = Product::with('primaryImage')->latest()->take(100)->get();
    return view('product', compact('products', 'allProducts'));
}

}
