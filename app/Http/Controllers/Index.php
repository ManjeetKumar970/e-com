<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use Illuminate\Http\Request;
use App\Models\Dashboard\BarcodeRol;
use App\Models\Dashboard\Category;
use App\Models\Dashboard\Product;
use App\Models\Dashboard\Slider;
use App\Models\Notification;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class Index extends Controller
{
    /**
     * Display the index page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
{
    $sliders = Slider::all();    
    $categories = Category::all();
    $products = Product::with(['primaryImage'])
        ->where('status', 'published')
        ->get();
      $notification=Notification::all()->take(5);
    // Fetch orders for the logged-in user
    $orderDetails = [];
    if (Auth::check()) {
        $orderDetails = Order::where('user_id', Auth::id())->get();
    }

    return view('index', compact('categories', 'products', 'sliders', 'orderDetails','notification'));
}

   public function product()
    {
        $allProducts = Product::with('primaryImage')
            ->where('status', 'published')
            ->latest()  
            ->get();

        return view('product', compact('allProducts'));
    }
    public function custombarcode()
    {
        return view('custombarcode'); 
    }
    public function contactus()
    {
        return view('contactus'); 
        
    } 
 public function productReview($slug, $id)
{
    $userId = Auth::id();

    $product = Product::with(['primaryImage','productImages', 'category'])
        ->findOrFail($id);
    $relatedProducts = Product::with('primaryImage')
        ->where('category_id', $product->category_id)
        ->where('id', '!=', $product->id)
        ->take(4)
        ->get();

    return view('productreview', compact('product', 'relatedProducts'));
}
    public function orderConfirmation($userId)
    {
        $authUserId = Auth::id();

        if ($authUserId != $userId) {
            return redirect()->route('index')->with('error', 'Unauthorized access.');
        }

        $orderDetails = Order::with('orderItems')
                            ->where('user_id', $userId)
                            ->orderBy('created_at', 'desc')
                            ->get();

        if ($orderDetails->isEmpty()) {
            return view('orderconfirmation')->with('warning', 'There are no orders.');
        }

        return view('orderconfirmation', compact('orderDetails'));
    }


}
