<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Category;

class ProductsController extends Controller
{
    public function products()
    {
        $category=Category::all();
        return view('dashboard.pages.createproduct',compact('category'));
    }
}


