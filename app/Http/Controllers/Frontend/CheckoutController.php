<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
use App\Models\Dashboard\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
 public function productcheckout()
{
    if (!Auth::check()) {
        return redirect()->route('login')->with('error', 'Please login to continue checkout.');
    }
    $cartItems = CartItem::with('product')
        ->where('user_id', Auth::id())
        ->get();

    if ($cartItems->isEmpty()) {
        return redirect()->route('index')->with('error', 'Your cart is empty.');
    }
    $total = $cartItems->sum(function ($item) {
        return $item->product->sale_price * $item->quantity;
    });

    $regularPrice = $cartItems->sum(function ($item) {
        return $item->product->regular_price * $item->quantity;
    });

    // Calculate discount
    $discount = $regularPrice - $total;
    $gstRate = 18; // 18%
    $gstAmount = ($total * $gstRate) / 100;

    // Final total (including GST)
    $grandTotal = $total + $gstAmount;

    return view('productcheckout', compact(
        'cartItems',
        'total',
        'regularPrice',
        'discount',
        'gstAmount',
        'gstRate',
        'grandTotal'
    ));
}



}
