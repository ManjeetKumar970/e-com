<?php

namespace App\Models\Dashboard;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
    ];

    // Relationship: Category has many Products
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
