<?php

namespace App\Http\ViewComposers;

use App\Models\Dashboard\Category;
use App\Models\CartItem;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class NavbarComposer
{
    public function compose(View $view)
    {
        $categories = Category::all();
        $cartCount = 0;
        $wishlistIds = [];

        if (Auth::check()) {
            $userId = Auth::id();
            $cartItems = CartItem::with('product')
            ->where('user_id', $userId)
            ->get();

          $cartCount = $cartItems->sum('quantity');
          $wishlistItems = Wishlist::with('product')
                              ->where('user_id', $userId)
                              ->get();

            $wishlistCount = $wishlistItems->count();
        }
        $view->with([
            'categories'   => $categories ?? [],
            'cartCount'    => $cartCount ?? 0,
            'cartItems'    => $cartItems ?? [],
            'wishlistCount'  => $wishlistCount ?? 0,
        ]);
    }
}
