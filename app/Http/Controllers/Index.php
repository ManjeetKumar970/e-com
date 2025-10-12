<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dashboard\BarcodeRol;
use App\Models\Dashboard\Category;
use App\Models\Dashboard\Product;
use App\Models\Dashboard\Slider;
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
        
    } function productreview(){
     return view('productreview'); 
  }

   function productcheckout(){
    return view('productcheckout');
   }
   function orderconfirmation(){
    return view('orderconfirmation');
   }
}
