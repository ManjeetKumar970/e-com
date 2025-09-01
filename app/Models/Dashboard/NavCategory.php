<?php

namespace App\Models\Dashboard;

use Illuminate\Database\Eloquent\Model;

class NavCategory extends Model
{
    protected $table = 'navcategories';
    protected $fillable = ['name', 'slug'];

    public function subcategories()
    {
        return $this->hasMany(SubCategory::class);
    }
}
