<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dashboard\BarcodeRol;

class Index extends Controller
{
    /**
     * Display the index page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
         $barcodes = BarcodeRol::all()->map(function($barcode){
         $barcode->images = json_decode($barcode->images, true); // decode to array
         return $barcode;
    });

    return view('index', compact('barcodes')); 
    }
    public function product()
    {
        return view('product'); 
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
}
