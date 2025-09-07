<?php

namespace App\Models\Dashboard;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class NavbarItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'url',
        'type',
        'parent_id',
        'category_id',
        'sort_order',
        'is_active',
        'target',
        'icon',
        'extra_attributes',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
        'extra_attributes' => 'array',
    ];

    // Self-referencing relationship for hierarchy
    public function parent(): BelongsTo
    {
        return $this->belongsTo(NavbarItem::class, 'parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(NavbarItem::class, 'parent_id')
                    ->where('is_active', true)
                    ->orderBy('sort_order');
    }

    // Linked category
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeTopLevel($query)
    {
        return $query->whereNull('parent_id');
    }

    public function scopeOrderedBySortOrder($query)
    {
        return $query->orderBy('sort_order');
    }

    public function scopeByType($query, $type)
    {
        return $query->where('type', $type);
    }

    // Helper methods
    public function isDropdown(): bool
    {
        return $this->type === 'dropdown';
    }

    public function isMegaMenu(): bool
    {
        return $this->type === 'mega_menu';
    }

    public function hasChildren(): bool
    {
        return $this->children()->exists();
    }

    public function getFullUrl(): string
    {
        if ($this->category) {
            return "/category/{$this->category->slug}";
        }
        
        return $this->url ?: '#';
    }
}