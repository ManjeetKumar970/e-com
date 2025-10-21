<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CheckoutRequest;
use App\Models\CartItem;
use App\Models\Dashboard\Product;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
    $discount = $regularPrice - $total;
    $gstRate = 18; // 18%
    $gstAmount = ($total * $gstRate) / 100;
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
