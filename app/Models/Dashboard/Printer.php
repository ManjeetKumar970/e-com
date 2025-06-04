<?php

namespace App\Models\Dashboard;

use Illuminate\Database\Eloquent\Model;

class Printer extends Model
{
    protected $fillable = [
        'name',
        'brand',
        'model_number',
        'dpi',
        'connectivity',
        'print_speed',
        'printer_type',
        'warranty',
        'description',
        'images',
        'price',
    ];

    protected $casts = [
        'images' => 'array',
    ];

}
