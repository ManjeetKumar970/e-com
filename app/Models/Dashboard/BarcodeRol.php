<?php

namespace App\Models\Dashboard;

use Illuminate\Database\Eloquent\Model;

class BarcodeRol extends Model
{
   protected $table = 'barcodes_rols';
   protected $fillable = [
        'name',
        'size',
        'page_thickness',
        'color',
        'numberoflabel',
        'paper_type',
        'length',
        'core',
        'description',
        'images',
        'price',
    ];
}
