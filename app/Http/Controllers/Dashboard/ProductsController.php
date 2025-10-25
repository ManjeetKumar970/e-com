<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Category;
use App\Models\Dashboard\Product;
use App\Models\Dashboard\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductsController extends Controller
{
    public function products()
    {
        $category = Category::all();
        return view('dashboard.pages.createproduct', compact('category'));
    }

    public function createproduct(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'sku' => 'required|string|unique:products,sku',
            'category_id' => 'required|exists:categories,id',
            'brand' => 'required|string|max:255',
            'regular_price' => 'required|numeric|min:0',
            'sale_price' => 'nullable|numeric|min:0',
            'cost_price' => 'nullable|numeric|min:0',
            'stock_quantity' => 'required|integer|min:0',
            'low_stock_threshold' => 'nullable|integer|min:1',
            'status' => 'required|in:draft,published,archived',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'tax_rate' => 'nullable|numeric|min:0',
            'hsn_code' => 'nullable|string|max:50',
            'barcode' => 'nullable|string|max:255',
            'weight' => 'nullable|numeric|min:0',
            'length' => 'nullable|numeric|min:0',
            'width' => 'nullable|numeric|min:0',
            'height' => 'nullable|numeric|min:0',
            'warranty_period' => 'nullable|integer|min:0',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }
        $category = Category::find($request->category_id);

        if ($category) {
            $slug = $category->slug;
        } else {
            $slug = null; // or handle error
        }
        DB::beginTransaction();

        try {
            $product = Product::create([
                'name' => $request->name,
                'slug' => $slug . '-' . strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->name)),
                'sku' => $request->sku,
                'category_id' => $request->category_id,
                'brand' => $request->brand,
                'model_number' => $request->model_number,
                'manufacturer' => $request->manufacturer,
                'short_description' => $request->short_description,
                'description' => $request->description,
                'regular_price' => $request->regular_price,
                'sale_price' => $request->sale_price,
                'cost_price' => $request->cost_price,
                'stock_quantity' => $request->stock_quantity,
                'low_stock_threshold' => $request->low_stock_threshold ?? 5,
                'minimum_order_quantity' => $request->minimum_order_quantity ?? 1,
                'maximum_order_quantity' => $request->maximum_order_quantity,
                'track_inventory' => $request->boolean('track_inventory'),
                'allow_backorder' => $request->boolean('allow_backorder'),
                'weight' => $request->weight,
                'length' => $request->length,
                'width' => $request->width,
                'height' => $request->height,
                'free_shipping' => $request->boolean('free_shipping'),
                'hsn_code' => $request->hsn_code,
                'tax_rate' => $request->tax_rate ?? 18,
                'is_taxable' => $request->boolean('is_taxable'),
                'barcode' => $request->barcode,
                'product_type' => $request->product_type,
                'warranty_period' => $request->warranty_period,
                'warranty_type' => $request->warranty_type,
                'warranty_details' => $request->warranty_details,
                'product_manual_url' => $request->product_manual_url,
                'driver_download_url' => $request->driver_download_url,
                'package_contents' => $request->package_contents,
                'usage_instructions' => $request->usage_instructions,
                'status' => $request->status,
                'visibility' => $request->visibility,
                'is_active' => $request->boolean('is_active'),
                'is_featured' => $request->boolean('is_featured'),
                'is_new_arrival' => $request->boolean('is_new_arrival'),
                // Technical specifications
                'connectivity' => $request->connectivity,
                'interface_type' => $request->interface_type,
                'print_width' => $request->print_width,
                'resolution' => $request->resolution,
                'print_speed' => $request->print_speed,
                'scan_type' => $request->scan_type,
                'paper_size' => $request->paper_size,
                'paper_type' => $request->paper_type,
                'roll_length' => $request->roll_length,
                'roll_diameter' => $request->roll_diameter,
                'core_size' => $request->core_size,
                'gsm' => $request->gsm,
                'sheets_per_pack' => $request->sheets_per_pack,
                'ribbon_type' => $request->ribbon_type,
                'ribbon_size' => $request->ribbon_size,
            ]);

            // Images
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $index => $image) {
                    $path = $image->store('products/' . $product->id, 'public');

                    ProductImage::create([
                        'product_id' => $product->id,
                        'image_url' => $path,
                        'is_primary' => $index === 0,
                        'alt_text' => $product->name,
                        'order' => $index
                    ]);
                }
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Product created successfully!',
                'product_id' => $product->id,
                'redirect_url' => route('dashboard.products')
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => 'Failed to create product: ' . $e->getMessage()
            ], 500);
        }
    }

public function productList()
{
    $categories = Category::all();
    
    // Use the correct relationship name 'productImages'
    $products = Product::with(['category', 'primaryImage'])->paginate(10);
    foreach ($products as $product) {
}

    return view('dashboard.pages.productlist', compact('categories', 'products'));
}

public function updateLabel(Request $request)
{
    // Validate the incoming request
    $request->validate([
        'product_id' => 'required|exists:products,id',
        'label' => 'required|string|max:50', // use the same name as sent from AJAX
    ]);

    $product = Product::find($request->product_id);

    // Assign the label to your column
    $product->prodcutlabel = $request->label; // make sure column name is correct
    $product->save();

    return response()->json([
        'success' => true,
        'message' => 'Label updated successfully'
    ]);
}

public function updateStatus(Request $request)
{
    $request->validate([
        'product_id' => 'required|exists:products,id',
        'status' => 'required|in:published,draft,archived',
    ]);

    $product = Product::find($request->product_id);
    $product->status = $request->status;
    $product->save();

    return response()->json(['success' => true, 'message' => 'Status updated successfully']);
}
  public function edit($id)
    {
        try {
            $product = Product::with('primaryImage')->findOrFail($id);
            $categories = Category::where('is_active', true)->orderBy('name')->get();
            
            return view('dashboard.pages.editproduct', compact('product', 'categories'));
        } catch (\Exception $e) {
            return redirect()->route('dashboard.listproducts')
                ->with('error', 'Product not found');
        }
    }
    /**
     * Update the specified product in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'sku' => 'required|string|unique:products,sku,' . $id,
            'category_id' => 'required|exists:categories,id',
            'brand' => 'required|string|max:255',
            'regular_price' => 'required|numeric|min:0',
            'sale_price' => 'nullable|numeric|min:0',
            'cost_price' => 'nullable|numeric|min:0',
            'stock_quantity' => 'required|integer|min:0',
            'low_stock_threshold' => 'nullable|integer|min:1',
            'status' => 'required|in:draft,published,archived',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'tax_rate' => 'nullable|numeric|min:0',
            'hsn_code' => 'nullable|string|max:50',
            'barcode' => 'nullable|string|max:255',
            'weight' => 'nullable|numeric|min:0',
            'length' => 'nullable|numeric|min:0',
            'width' => 'nullable|numeric|min:0',
            'height' => 'nullable|numeric|min:0',
            'warranty_period' => 'nullable|integer|min:0',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $product = Product::findOrFail($id);
            
            // Get category slug for URL
            $category = Category::find($request->category_id);
            $slug = $category ? $category->slug : null;

            DB::beginTransaction();

            // Update product
            $product->update([
                'name' => $request->name,
                'slug' => $slug . '-' . strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->name)),
                'sku' => $request->sku,
                'category_id' => $request->category_id,
                'brand' => $request->brand,
                'model_number' => $request->model_number,
                'manufacturer' => $request->manufacturer,
                'short_description' => $request->short_description,
                'description' => $request->description,
                'regular_price' => $request->regular_price,
                'sale_price' => $request->sale_price,
                'cost_price' => $request->cost_price,
                'stock_quantity' => $request->stock_quantity,
                'low_stock_threshold' => $request->low_stock_threshold ?? 5,
                'minimum_order_quantity' => $request->minimum_order_quantity ?? 1,
                'maximum_order_quantity' => $request->maximum_order_quantity,
                'track_inventory' => $request->boolean('track_inventory'),
                'allow_backorder' => $request->boolean('allow_backorder'),
                'weight' => $request->weight,
                'length' => $request->length,
                'width' => $request->width,
                'height' => $request->height,
                'free_shipping' => $request->boolean('free_shipping'),
                'hsn_code' => $request->hsn_code,
                'tax_rate' => $request->tax_rate ?? 18,
                'is_taxable' => $request->boolean('is_taxable'),
                'barcode' => $request->barcode,
                'product_type' => $request->product_type,
                'warranty_period' => $request->warranty_period,
                'warranty_type' => $request->warranty_type,
                'warranty_details' => $request->warranty_details,
                'product_manual_url' => $request->product_manual_url,
                'driver_download_url' => $request->driver_download_url,
                'package_contents' => $request->package_contents,
                'usage_instructions' => $request->usage_instructions,
                'status' => $request->status,
                'visibility' => $request->visibility,
                'is_active' => $request->boolean('is_active'),
                'is_featured' => $request->boolean('is_featured'),
                'is_new_arrival' => $request->boolean('is_new_arrival'),
                // Technical specifications
                'connectivity' => $request->connectivity,
                'interface_type' => $request->interface_type,
                'print_width' => $request->print_width,
                'resolution' => $request->resolution,
                'print_speed' => $request->print_speed,
                'scan_type' => $request->scan_type,
                'paper_size' => $request->paper_size,
                'paper_type' => $request->paper_type,
                'roll_length' => $request->roll_length,
                'roll_diameter' => $request->roll_diameter,
                'core_size' => $request->core_size,
                'gsm' => $request->gsm,
                'sheets_per_pack' => $request->sheets_per_pack,
                'ribbon_type' => $request->ribbon_type,
                'ribbon_size' => $request->ribbon_size,
            ]);

            // Handle image deletion
            if ($request->has('deleted_images')) {
                $deletedImages = json_decode($request->deleted_images, true);
                if (is_array($deletedImages)) {
                    foreach ($deletedImages as $imageId) {
                        $image = ProductImage::where('id', $imageId)
                            ->where('product_id', $product->id)
                            ->first();
                        
                        if ($image) {
                            // Delete file from storage
                            if (Storage::disk('public')->exists($image->image_url)) {
                                Storage::disk('public')->delete($image->image_url);
                            }
                            $image->delete();
                        }
                    }
                }
            }

            // Handle new image uploads
            if ($request->hasFile('images')) {
                // Get current max order
                // $maxOrder = ProductImage::where('product_id', $product->id)->max('order') ?? -1;
                
                foreach ($request->file('images') as $index => $image) {
                    $path = $image->store('products/' . $product->id, 'public');

                   ProductImage::create([
                    'product_id' => $product->id,
                    'image_url' => $path,
                    'is_primary' => false,
                    'alt_text' => $product->name,
                ]);
             }
            }

            // Update primary image if specified
            if ($request->has('primary_image_id')) {
                ProductImage::where('product_id', $product->id)->update(['is_primary' => false]);
                ProductImage::where('id', $request->primary_image_id)
                    ->where('product_id', $product->id)
                    ->update(['is_primary' => true]);
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Product updated successfully!',
                'product_id' => $product->id,
                'redirect_url' => route('dashboard.products')
            ]);

        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => 'Failed to update product: ' . $e->getMessage()
            ], 500);
        }
    }

/**
     * Delete a product image (AJAX)
     */
    public function deleteImage($id)
{
    try {
        $image = ProductImage::findOrFail($id);
        $productId = $image->product_id;

        // Delete file from storage
        if (Storage::disk('public')->exists($image->image_url)) {
            Storage::disk('public')->delete($image->image_url);
        }

        $wasPrimary = $image->is_primary;
        $image->delete();

        // If it was primary, set another image as primary (first available)
        if ($wasPrimary) {
            $newPrimary = ProductImage::where('product_id', $productId)->first();
            if ($newPrimary) {
                $newPrimary->is_primary = true;
                $newPrimary->save();
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'Image deleted successfully'
        ]);

    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Error deleting image: ' . $e->getMessage()
        ], 500);
    }
}
public function deleteProduct($id)
{
    try {
        $product = Product::findOrFail($id);
        DB::beginTransaction();

        // Delete all product images
        foreach ($product->productImages as $image) {
            if (Storage::disk('public')->exists($image->image_url)) {
                Storage::disk('public')->delete($image->image_url);
            }
            $image->delete();
        }

        // Delete product folder if empty
        $productFolder = 'products/' . $product->id;
        if (Storage::disk('public')->exists($productFolder)) {
            Storage::disk('public')->deleteDirectory($productFolder);
        }

        // Delete product
        $product->delete();

        DB::commit();
        return redirect()->back()->with('success','Product deleted successfully');
       

    } catch (\Exception $e) {
        DB::rollBack();
      return redirect()->back()->with('Error','Error deleting product');
        // return response()->json([
        //     'success' => false,
        //     'message' => 'Error deleting product: ' . $e->getMessage()
        // ], 500);
    }
}

   /**
     * Set primary image (AJAX)
     */
    public function setPrimaryImage($productId, $imageId)
    {
        try {
            // Remove primary from all images of this product
            ProductImage::where('product_id', $productId)->update(['is_primary' => false]);
            
            // Set new primary
            $image = ProductImage::where('id', $imageId)
                ->where('product_id', $productId)
                ->firstOrFail();
            
            $image->is_primary = true;
            $image->save();

            return response()->json([
                'success' => true,
                'message' => 'Primary image updated successfully'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error updating primary image: ' . $e->getMessage()
            ], 500);
        }
    }
}
