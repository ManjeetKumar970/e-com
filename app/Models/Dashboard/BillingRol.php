<?php

namespace App\Models\Dashboard;

use Illuminate\Database\Eloquent\Model;

class BillingRol extends Model
{
    protected $fillable = [
        'name',
        'size',
        'page_thickness',
        'color',
        'paper_type',
        'length',
        'core',
        'description',
        'images',
        'price',
    ];
}
