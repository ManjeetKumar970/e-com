<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use Illuminate\Http\Request;
use App\Models\Dashboard\BarcodeRol;
use App\Models\Dashboard\Category;
use App\Models\Dashboard\Product;
use App\Models\Dashboard\Slider;
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
    $sliders=Slider::all();    
    $categories = Category::all();
    $products = Product::with(['primaryImage'])->where('status', 'published')->get();
    return view('index', compact('categories','products','sliders')); 
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




   function orderconfirmation(){
    return view('orderconfirmation');
   }
}
