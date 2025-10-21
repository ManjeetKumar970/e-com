<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customebarcod extends Model
{
       use HasFactory;

    protected $fillable = [
        'user_id',
        'unitSystem',
        'width',
        'length',
        'quantity',
        'material',
        'adhesive',
        'barcodeType',
        'options',
        'totalPrice',
    ];

    protected $casts = [
        'options' => 'array', 
    ];
}
