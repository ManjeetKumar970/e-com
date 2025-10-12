<?php

namespace App\Http\ViewComposers;

use App\Models\Dashboard\Category;
use Illuminate\View\View;

class NavbarComposer
{
    public function compose(View $view)
    {
        $categories = Category::all();
        $view->with('categories', $categories);
    }
}
