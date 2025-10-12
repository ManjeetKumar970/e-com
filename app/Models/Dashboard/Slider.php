<?php

namespace App\Models\Dashboard;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
     use HasFactory;

    protected $fillable = [
        'image_path',
        'title',
        'description',
        'link_url',
        'order',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // Scope to get only active sliders
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Scope to get sliders in order
    public function scopeOrdered($query)
    {
        return $query->orderBy('order');
    }
}
