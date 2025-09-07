<?php

namespace App\Models\Dashboard;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class MenuLocationItem extends Pivot
{
    protected $table = 'menu_location_items';

    protected $fillable = [
        'menu_location_id',
        'navbar_item_id',
        'sort_order',
    ];

    protected $casts = [
        'sort_order' => 'integer',
    ];

    public $timestamps = true;
}
