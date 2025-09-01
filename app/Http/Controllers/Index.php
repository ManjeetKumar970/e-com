<?php

namespace App\Http\Controllers;

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
        return view('index'); 
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
    }
}
