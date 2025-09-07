<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Dashboard\BarcodeRolController;
use App\Http\Controllers\Dashboard\BillingRols;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\Dashboard;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\NavBar;
use App\Http\Controllers\Dashboard\ImgSlides;
use App\Http\Controllers\Dashboard\NavbarController;
use App\Http\Controllers\Dashboard\PrintersController;
use App\Http\Controllers\Index;
use Illuminate\Support\Facades\Route;

Route::get('/', [Index::class, 'index'])->name('index');
Route::get('/product', [Index::class, 'product'])->name('product');
Route::get('/custombarcode', [Index::class, 'custombarcode'])->name('custombarcode');
Route::get('/contactus', [Index::class, 'contactus'])->name('contactus');




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
        //Billing Rols
        Route::get('/createbillingrols', [BillingRols::class, 'createBillingRols'])->name('dashboard.createbillingrols');
        Route::post('/storebillingrols', [BillingRols::class, 'storeBillingRols'])->name('dashboard.storebillingrols');
        //Barcode Rols
        Route::get('/barcodepage', [BarcodeRolController::class, 'barcodepage'])->name('dashboard.barcodepage');
        
        //Billing Printer
        Route::get('/billingprinter', [PrintersController::class, 'billingPrinter'])->name('dashboard.billingprinter');
        Route::get('/storegprinter', [PrintersController::class, 'storePrinter'])->name('dashboard.storeprinter');
        //Sidebar
        Route::get('/sidebar', [Dashboard::class, 'sidebar'])->name('dashboard.sidebar');
        //Slider
        Route::get('/slider', [ImgSlides::class, 'slider'])->name('dashboard.slider');
        Route::post('/slider/store', [ImgSlides::class, 'storeSlider'])->name('dashboard.slider.store');
        //NavBar
        Route::get('/navcategory', [NavBar::class, 'navcategory'])->name('dashboard.navcategory');
        // Route::post('/navcategory/store', [NavBar::class, 'store'])->name('dashboard.storeCategory');
        Route::post('/logout', [Dashboard::class, 'logout'])->name('dashboard.logout');


        // Categories Routes
        Route::prefix('categories')->name('dashboard.categories.')->group(function () {
            Route::get('/', [CategoryController::class, 'index'])->name('index');
            Route::get('/create', [CategoryController::class, 'create'])->name('create');
            Route::post('/store', [CategoryController::class, 'storeCategory'])->name('storeCategory');
            Route::get('/edit/{category}', [CategoryController::class, 'edit'])->name('edit');
            Route::put('/{category}', [CategoryController::class, 'update'])->name('update');
            Route::delete('/{category}', [CategoryController::class, 'destroy'])->name('destroy');
        });



            Route::prefix('navbar')->name('navbar.')->group(function () {
            Route::get('/', [NavbarController::class, 'index'])->name('index');
            Route::get('/create', [NavbarController::class, 'create'])->name('create');
            Route::post('/store', [NavbarController::class, 'store'])->name('store');
            Route::get('/{navbar}/edit', [NavbarController::class, 'edit'])->name('edit');
            Route::put('/{navbar}', [NavbarController::class, 'update'])->name('update');
            Route::delete('/{navbar}', [NavbarController::class, 'destroy'])->name('destroy');
        });

        
        // AJAX Routes for navbar functionality
        Route::post('navbar/{navbar}/toggle-status', [NavbarController::class, 'toggleStatus'])->name('navbar.toggle-status');

        Route::get('products', [ProductController::class, 'index'])->name('products.index');
        Route::post('store', [ProductController::class, 'store'])->name('products.store');
        Route::get('create', [ProductController::class, 'create'])->name('dashboard.products.create');
        Route::post('edit', [ProductController::class, 'edit'])->name('products.edit');

    
         
    });
    
});

Route::get('/test-navbar-routes', function() {
    return [
        'navbar_index' => route('dashboard.navbar.index'),
        'navbar_store' => route('dashboard.navbar.store'),
        'navbar_create' => route('dashboard.navbar.create'),
    ];
});