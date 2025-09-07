<?php

namespace App\Models\Dashboard;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class MenuLocation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'display_name',
        'description',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // Many-to-many relationship with navbar items
    public function navbarItems(): BelongsToMany
    {
        return $this->belongsToMany(NavbarItem::class, 'menu_location_items')
                    ->withPivot('sort_order')
                    ->withTimestamps()
                    ->orderByPivot('sort_order');
    }

    public function activeNavbarItems(): BelongsToMany
    {
        return $this->navbarItems()->where('navbar_items.is_active', true);
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Helper methods
    public function getRouteKeyName()
    {
        return 'name';
    }
}

