<?php

namespace App\Models\Dashboard;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductAttribute extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'attribute_name',
        'attribute_value',
    ];

    /**
     * Relationship: A ProductAttribute belongs to a Product.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
