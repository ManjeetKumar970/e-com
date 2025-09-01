<?php

namespace App\Models\Dashboard;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $table = 'subcategories';
    protected $fillable = ['navcategory_id', 'name', 'slug'];

    public function navcategory()
    {
        return $this->belongsTo(NavCategory::class);
    }
}
