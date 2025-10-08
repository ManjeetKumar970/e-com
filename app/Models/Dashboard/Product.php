<?php

namespace App\Models\Dashboard;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
   use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'description',
        'short_description',
        'price',
        'sale_price',
        'sku',
        'stock_quantity',
        'image_url',
        'is_featured',
        'is_active',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'sale_price' => 'decimal:2',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
    ];

    // Relationship: Product belongs to category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relationship: Product has many images
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    // Scope: Only active products
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Scope: Only featured products
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    // Scope: Products on sale
    public function scopeOnSale($query)
    {
        return $query->whereNotNull('sale_price');
    }

    // Get display price (sale price if available, otherwise regular price)
    public function getDisplayPriceAttribute()
    {
        return $this->sale_price ?? $this->price;
    }

    // Check if product has discount
    public function getHasDiscountAttribute()
    {
        return $this->sale_price && $this->sale_price < $this->price;
    }

    // Calculate discount percentage
    public function getDiscountPercentageAttribute()
    {
        if (!$this->has_discount) {
            return 0;
        }
        return round((($this->price - $this->sale_price) / $this->price) * 100);
    }

    // Check if product is in stock
    public function getInStockAttribute()
    {
        return $this->stock_quantity > 0;
    }
}
