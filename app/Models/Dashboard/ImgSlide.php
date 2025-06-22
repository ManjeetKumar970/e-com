<?php

namespace App\Models\Dashboard;

use Illuminate\Database\Eloquent\Model;

class ImgSlide extends Model
{
    protected $table = 'imgSliders';

    // You can define fillable attributes if needed
    protected $fillable = [
        'title1',
        'title2',
        'title3',
        'description1',
        'description2',
        'description3',
        'images1',
        'images2',
        'images3',
    ];
}
