<?php

namespace App\Models\Dashboard;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
   use HasFactory;

    protected $fillable = [
        'product_id',
        'image_url',
        'is_primary',
        'display_order',
    ];

    protected $casts = [
        'is_primary' => 'boolean',
    ];

    // Relationship: Image belongs to product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Scope: Primary image
    public function scopePrimary($query)
    {
        return $query->where('is_primary', true);
    }

    // Scope: Order by display order
    public function scopeOrdered($query)
    {
        return $query->orderBy('display_order', 'asc');
    }
}
