<?php

namespace App\Http\Controllers;

use App\Models\Dashboard\BarcodeRol;
use App\Models\Dashboard\BillingRol;
use App\Models\Dashboard\ImgSlide;
use App\Models\Dashboard\Printer;
use Illuminate\Http\Request;

class Index extends Controller
{
    /**
     * Display the index page.
     *
     * @return \Illuminate\View\View
     */
   public function index()
    {
        $barcodes = BarcodeRol::all();
        $billingroll = BillingRol::all();
        $printer = Printer::all();
        $img = ImgSlide::all();

        return view('index', [
            'img' => $img,
            'barcodes' => $barcodes,
            'billingroll' => $billingroll,
            'printer' => $printer
        ]); 
    }

    public function product()
    {
    $barcodes = BarcodeRol::all(); 
    return view('product', ['barcodes' => $barcodes]);
   }
   public function billingRoll()
    {
    $barcodes = BillingRol::all(); 
    return view('billingroll', ['billingroll' => $barcodes]);
   }

   public function billingPrinter()
    {
    $billingprinter = Printer::all(); 
    return view('printers', ['billingprinter' => $billingprinter]);
   }

}
