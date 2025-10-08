<?php

namespace App\Models\Dashboard;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'image_url',
        'parent_id',
        'display_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // Relationship: Category has many products
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    // Relationship: Parent category
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    // Relationship: Child categories (subcategories)
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    // Scope: Only active categories
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Scope: Order by display order
    public function scopeOrdered($query)
    {
        return $query->orderBy('display_order', 'asc');
    }

    // Get products count
    public function getProductsCountAttribute()
    {
        return $this->products()->where('is_active', true)->count();
    }
}
