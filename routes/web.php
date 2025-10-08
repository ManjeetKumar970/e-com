<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Dashboard\BarcodeRolController;
use App\Http\Controllers\Dashboard\BillingRols;
use App\Http\Controllers\Dashboard\Dashboard;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\NavBar;
use App\Http\Controllers\Dashboard\ImgSlides;
use App\Http\Controllers\Dashboard\PrintersController;
use App\Http\Controllers\Dashboard\ProductsController;
use App\Http\Controllers\Index;
use Illuminate\Support\Facades\Route;

Route::get('/', [Index::class, 'index'])->name('index');
Route::get('/product', [Index::class, 'product'])->name('product');
Route::get('/custombarcode', [Index::class, 'custombarcode'])->name('custombarcode');
Route::get('/contactus', [Index::class, 'contactus'])->name('contactus');
Route::get('/productreview', [Index::class, 'productreview'])->name('productreview');
Route::get('/productcheckout', [Index::class, 'productcheckout'])->name('productcheckout');
Route::get('orderconfirmation',[Index::class,'orderconfirmation'])->name('orderconfirmation');


// Dashboard routes
Route::prefix('dashboard')->group(function () {

    Route::get('/', [AuthController::class, 'index'])->name('dashboard.index');
    Route::post('/register', [AuthController::class, 'register'])->name('dashboard.register');
    Route::post('/login', [AuthController::class, 'login'])->name('dashboard.login');
    Route::get('/login', function () {
    return redirect()->route('dashboard.index');
    })->name('login');


    Route::middleware('auth')->group(function () {
        Route::get('/admindashboard', function () {
            return view('dashboard.admindashboard');
        })->name('dashboard.admindashboard');
        //home controller
        Route::get('/home', [HomeController::class, 'home'])->name('dashboard.home');
        //
        Route::get('/createbillingrols', [BillingRols::class, 'createBillingRols'])->name('dashboard.createbillingrols');
        Route::post('/storebillingrols', [BillingRols::class, 'storeBillingRols'])->name('dashboard.storebillingrols');
        //Barcode Rols
        Route::get('/barcodepage', [BarcodeRolController::class, 'barcodepage'])->name('dashboard.barcodepage');
        Route::post('/storeProduct', [ProductsController::class, 'storeProduct'])->name('dashboard.storeProduct');
        
        //Billing Printer
        Route::get('/billingprinter', [PrintersController::class, 'billingPrinter'])->name('dashboard.billingprinter');
        Route::get('/storegprinter', [PrintersController::class, 'storePrinter'])->name('dashboard.storeprinter');
        //Sidebar
        Route::get('/sidebar', [Dashboard::class, 'sidebar'])->name('dashboard.sidebar');
        //Slider
        Route::get('/slider', [ImgSlides::class, 'slider'])->name('dashboard.slider');
        Route::post('/slider/store', [ImgSlides::class, 'storeSlider'])->name('dashboard.slider.store');
        //NavBar
        Route::post('/logout', [Dashboard::class, 'logout'])->name('dashboard.logout');
    });
});

