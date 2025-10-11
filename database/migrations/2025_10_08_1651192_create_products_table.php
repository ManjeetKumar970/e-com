<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            
            // Basic Information
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->string('name', 255);
            $table->string('slug', 255)->unique();
            $table->text('description')->nullable();
            $table->string('short_description', 500)->nullable();
            
            // Pricing
            $table->decimal('regular_price', 10, 2);
            $table->decimal('sale_price', 10, 2)->nullable();
            $table->decimal('cost_price', 10, 2)->nullable();
            $table->boolean('is_taxable')->default(true);
            $table->decimal('tax_rate', 5, 2)->default(0); // GST percentage
            
            // Product Identity
            $table->string('sku', 100)->unique();
            $table->string('barcode', 100)->nullable()->unique(); // Product barcode
            $table->string('hsn_code', 50)->nullable(); // HSN/SAC code for GST
            $table->string('brand', 100)->nullable();
            $table->string('manufacturer', 150)->nullable();
            $table->string('model_number', 100)->nullable(); // For printers, scanners
            
            // Inventory Management
            $table->integer('stock_quantity')->default(0);
            $table->integer('low_stock_threshold')->default(5);
            $table->boolean('track_inventory')->default(true);
            $table->boolean('allow_backorder')->default(false);
            $table->enum('stock_status', ['in_stock', 'out_of_stock', 'low_stock'])->default('in_stock');
            
            // Product Specifications (for IT products)
            $table->json('specifications')->nullable(); // Technical specs
            $table->string('connectivity', 100)->nullable(); // USB, Bluetooth, WiFi, etc.
            $table->string('interface_type', 100)->nullable(); // USB 2.0, USB 3.0, Serial, Parallel
            $table->string('resolution', 100)->nullable(); // For printers/scanners (DPI)
            $table->string('print_speed', 100)->nullable(); // Pages/minute or mm/sec
            $table->string('print_width', 50)->nullable(); // For thermal printers (58mm, 80mm)
            $table->string('scan_type', 100)->nullable(); // 1D, 2D, QR for barcode scanners
            
            // Paper/Roll Specifications
            $table->string('paper_size', 100)->nullable(); // A4, 80mm x 50mm, 57mm x 40mm
            $table->string('paper_type', 100)->nullable(); // Thermal, Bond, Pre-printed
            $table->integer('roll_length')->nullable(); // In meters
            $table->integer('roll_diameter')->nullable(); // In mm
            $table->integer('core_size')->nullable(); // 12mm, 25mm core
            $table->integer('sheets_per_pack')->nullable(); // For paper sheets
            $table->string('gsm', 50)->nullable(); // Paper weight
            
            // Dimensions & Weight (for shipping)
            $table->decimal('weight', 8, 2)->nullable(); // in kg
            $table->decimal('length', 8, 2)->nullable(); // in cm
            $table->decimal('width', 8, 2)->nullable(); // in cm
            $table->decimal('height', 8, 2)->nullable(); // in cm
            $table->boolean('free_shipping')->default(false);
            
            // Warranty & Support
            $table->integer('warranty_period')->nullable(); // in months
            $table->enum('warranty_type', ['manufacturer', 'seller', 'none'])->default('manufacturer');
            $table->text('warranty_details')->nullable();
            
            // Product Media
            $table->string('primary_image', 255)->nullable();
            $table->json('gallery_images')->nullable(); // Multiple images
            $table->string('product_video_url', 255)->nullable();
            $table->string('product_manual_url', 255)->nullable(); // PDF manual link
            $table->string('driver_download_url', 255)->nullable(); // For printers
            
            // Compatibility (for consumables)
            $table->json('compatible_models')->nullable(); // Printer models compatible with rolls/ribbons
            $table->string('ribbon_type', 100)->nullable(); // Wax, Resin, Wax-Resin
            $table->string('ribbon_size', 100)->nullable(); // 110mm x 300m
            
            // SEO
            $table->string('meta_title', 255)->nullable();
            $table->string('meta_description', 500)->nullable();
            $table->string('meta_keywords', 255)->nullable();
            
            // Status & Visibility
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_new_arrival')->default(false);
            $table->boolean('is_active')->default(true);
            $table->enum('status', ['draft', 'published', 'archived'])->default('draft');
            $table->enum('visibility', ['public', 'private', 'hidden'])->default('public');
            
            // Tags & Additional Info
            $table->json('tags')->nullable();
            $table->text('usage_instructions')->nullable();
            $table->text('package_contents')->nullable(); // What's in the box
            
            // Business Fields
            $table->integer('minimum_order_quantity')->default(1);
            $table->integer('maximum_order_quantity')->nullable();
            $table->boolean('bulk_discount_available')->default(false);
            $table->json('bulk_pricing')->nullable(); // Quantity-based pricing
            
            // Analytics
            $table->integer('view_count')->default(0);
            $table->integer('sale_count')->default(0);
            $table->decimal('average_rating', 3, 2)->default(0);
            $table->integer('review_count')->default(0);
            
            $table->timestamps();
            $table->softDeletes(); // For soft deletion
            
            // Indexes for better performance
            $table->index('category_id');
            $table->index('sku');
            $table->index('barcode');
            $table->index('brand');
            $table->index('is_active');
            $table->index('is_featured');
            $table->index('status');
            $table->index('stock_status');
            $table->index(['category_id', 'is_active']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};