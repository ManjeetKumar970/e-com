<?php

namespace App\Models;

use App\Models\Dashboard\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        // Basic Information
        'category_id',
        'name',
        'slug',
        'description',
        'short_description',
        
        // Pricing
        'regular_price',
        'sale_price',
        'cost_price',
        'is_taxable',
        'tax_rate',
        
        // Product Identity
        'sku',
        'barcode',
        'hsn_code',
        'brand',
        'manufacturer',
        'model_number',
        
        // Inventory
        'stock_quantity',
        'low_stock_threshold',
        'track_inventory',
        'allow_backorder',
        'stock_status',
        
        // Specifications
        'specifications',
        'connectivity',
        'interface_type',
        'resolution',
        'print_speed',
        'print_width',
        'scan_type',
        
        // Paper/Roll Specifications
        'paper_size',
        'paper_type',
        'roll_length',
        'roll_diameter',
        'core_size',
        'sheets_per_pack',
        'gsm',
        
        // Dimensions & Weight
        'weight',
        'length',
        'width',
        'height',
        'free_shipping',
        
        // Warranty
        'warranty_period',
        'warranty_type',
        'warranty_details',
        
        // Media
        'primary_image',
        'gallery_images',
        'product_video_url',
        'product_manual_url',
        'driver_download_url',
        
        // Compatibility
        'compatible_models',
        'ribbon_type',
        'ribbon_size',
        
        // SEO
        'meta_title',
        'meta_description',
        'meta_keywords',
        
        // Status
        'is_featured',
        'is_new_arrival',
        'is_active',
        'status',
        'visibility',
        
        // Additional
        'tags',
        'usage_instructions',
        'package_contents',
        'minimum_order_quantity',
        'maximum_order_quantity',
        'bulk_discount_available',
        'bulk_pricing',
        
        // Analytics
        'view_count',
        'sale_count',
        'average_rating',
        'review_count',
    ];

    protected $casts = [
        'regular_price' => 'decimal:2',
        'sale_price' => 'decimal:2',
        'cost_price' => 'decimal:2',
        'tax_rate' => 'decimal:2',
        'is_taxable' => 'boolean',
        'stock_quantity' => 'integer',
        'low_stock_threshold' => 'integer',
        'track_inventory' => 'boolean',
        'allow_backorder' => 'boolean',
        'weight' => 'decimal:2',
        'length' => 'decimal:2',
        'width' => 'decimal:2',
        'height' => 'decimal:2',
        'free_shipping' => 'boolean',
        'warranty_period' => 'integer',
        'is_featured' => 'boolean',
        'is_new_arrival' => 'boolean',
        'is_active' => 'boolean',
        'minimum_order_quantity' => 'integer',
        'maximum_order_quantity' => 'integer',
        'bulk_discount_available' => 'boolean',
        'view_count' => 'integer',
        'sale_count' => 'integer',
        'average_rating' => 'decimal:2',
        'review_count' => 'integer',
        'specifications' => 'array',
        'gallery_images' => 'array',
        'compatible_models' => 'array',
        'tags' => 'array',
        'bulk_pricing' => 'array',
    ];

    // Relationships
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // public function orderItems()
    // {
    //     return $this->hasMany(OrderItem::class);
    // }

    // public function reviews()
    // {
    //     return $this->hasMany(Review::class);
    // }

    // public function wishlists()
    // {
    //     return $this->hasMany(Wishlist::class);
    // }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true)->where('status', 'published');
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true)->where('is_active', true);
    }

    public function scopeNewArrivals($query)
    {
        return $query->where('is_new_arrival', true)->where('is_active', true);
    }

    public function scopeInStock($query)
    {
        return $query->where('stock_status', 'in_stock');
    }

    public function scopeLowStock($query)
    {
        return $query->where('stock_status', 'low_stock');
    }

    public function scopeByBrand($query, $brand)
    {
        return $query->where('brand', $brand);
    }

    public function scopeByCategory($query, $categoryId)
    {
        return $query->where('category_id', $categoryId);
    }

    public function scopeSearch($query, $search)
    {
        return $query->where(function($q) use ($search) {
            $q->where('name', 'like', "%{$search}%")
              ->orWhere('sku', 'like', "%{$search}%")
              ->orWhere('barcode', 'like', "%{$search}%")
              ->orWhere('description', 'like', "%{$search}%")
              ->orWhere('brand', 'like', "%{$search}%")
              ->orWhere('model_number', 'like', "%{$search}%");
        });
    }

    // Accessors
    public function getCurrentPriceAttribute()
    {
        return $this->sale_price ?? $this->regular_price;
    }

    public function getDiscountPercentageAttribute()
    {
        if ($this->sale_price && $this->regular_price > $this->sale_price) {
            return round((($this->regular_price - $this->sale_price) / $this->regular_price) * 100, 2);
        }
        return 0;
    }

    public function getIsOnSaleAttribute()
    {
        return $this->sale_price && $this->sale_price < $this->regular_price;
    }

    public function getProfitMarginAttribute()
    {
        if ($this->cost_price && $this->regular_price > $this->cost_price) {
            return round((($this->regular_price - $this->cost_price) / $this->regular_price) * 100, 2);
        }
        return 0;
    }

    public function getFormattedPriceAttribute()
    {
        return '₹' . number_format($this->current_price, 2);
    }

    public function getFormattedRegularPriceAttribute()
    {
        return '₹' . number_format($this->regular_price, 2);
    }

    // Mutators
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucfirst($value);
    }

    // Methods
    public function updateStockStatus()
    {
        if ($this->stock_quantity == 0) {
            $this->stock_status = 'out_of_stock';
        } elseif ($this->stock_quantity <= $this->low_stock_threshold) {
            $this->stock_status = 'low_stock';
        } else {
            $this->stock_status = 'in_stock';
        }
        $this->save();
    }

    public function decrementStock($quantity)
    {
        if ($this->track_inventory) {
            $this->decrement('stock_quantity', $quantity);
            $this->updateStockStatus();
        }
    }

    public function incrementStock($quantity)
    {
        if ($this->track_inventory) {
            $this->increment('stock_quantity', $quantity);
            $this->updateStockStatus();
        }
    }

    public function incrementViewCount()
    {
        $this->increment('view_count');
    }

    public function incrementSaleCount($quantity = 1)
    {
        $this->increment('sale_count', $quantity);
    }

    public function updateAverageRating()
    {
        $avgRating = $this->reviews()->avg('rating');
        $this->average_rating = $avgRating ?? 0;
        $this->review_count = $this->reviews()->count();
        $this->save();
    }

    public function isCompatibleWith($model)
    {
        if (!$this->compatible_models) {
            return false;
        }
        return in_array($model, $this->compatible_models);
    }

    public function hasTag($tag)
    {
        if (!$this->tags) {
            return false;
        }
        return in_array($tag, $this->tags);
    }

    public function getBulkPrice($quantity)
    {
        if (!$this->bulk_discount_available || !$this->bulk_pricing) {
            return $this->current_price;
        }

        $bulkPrices = collect($this->bulk_pricing)->sortByDesc('min_quantity');
        
        foreach ($bulkPrices as $pricing) {
            if ($quantity >= $pricing['min_quantity']) {
                return $pricing['price'];
            }
        }

        return $this->current_price;
    }

    public function canOrder($quantity)
    {
        if (!$this->is_active || $this->status != 'published') {
            return false;
        }

        if ($quantity < $this->minimum_order_quantity) {
            return false;
        }

        if ($this->maximum_order_quantity && $quantity > $this->maximum_order_quantity) {
            return false;
        }

        if ($this->track_inventory && !$this->allow_backorder && $quantity > $this->stock_quantity) {
            return false;
        }

        return true;
    }
}