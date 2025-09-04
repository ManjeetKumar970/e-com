<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dashboard\Product;
use App\Models\Dashboard\ProductAttribute;
use Illuminate\Support\Str;

class ProductsController extends Controller
{
    public function storeProduct(Request $request)
{
    // Step 1: Create product
    $images = [];
    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $file) {
            $images[] = $file->store('uploads/products', 'public');
        }
    }

    $product = Product::create([
        'name'        => $request->name,
        'category'=>$request->category,
        'description' => $request->description,
        'price'       => $request->price,
        'sku'         => strtoupper(Str::random(8)),
        'stock'       => 0,
        'images'      => json_encode($images),
    ]);

    // Step 2: Attach attributes dynamically
    foreach (ProductAttribute::all() as $attribute) {
        if ($request->has($request->category)) {
            $product->attributes()->attach($attribute->id, [
                'value' => $request->input($request->category)
            ]);
        }
    }

    return response()->json(['status' => 'success', 'message' => 'Product created successfully']);
}


}
