<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Dashboard\BarcodeRolController;
use App\Http\Controllers\Dashboard\BillingRols;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\Dashboard;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\ImgSlides;
use App\Http\Controllers\Dashboard\PrintersController;
use App\Http\Controllers\Dashboard\ProductsController;
use App\Http\Controllers\Dashboard\SliderController;
use App\Http\Controllers\Frontend\ProductreviewController;
use App\Http\Controllers\Index;
use Illuminate\Support\Facades\Route;

Route::get('/', [Index::class, 'index'])->name('index');
Route::get('/product', [Index::class, 'product'])->name('product');
Route::get('/custombarcode', [Index::class, 'custombarcode'])->name('custombarcode');
Route::get('/contactus', [Index::class, 'contactus'])->name('contactus');
Route::get('/productreview', [Index::class, 'productreview'])->name('productreview');
Route::get('/productcheckout', [Index::class, 'productcheckout'])->name('productcheckout');
Route::get('orderconfirmation',[Index::class,'orderconfirmation'])->name('orderconfirmation');
Route::get('/userLogout', [AuthController::class, 'userLogout'])->name('userLogout');
Route::get('/product/{slug}/{id}', [ProductreviewController::class, 'show'])->name('product.show');
Route::post('/product/update-label', [ProductsController::class, 'updateLabel'])->name('product.updateLabel');
Route::post('/product/update-status', [ProductsController::class, 'updateStatus'])->name('product.updateStatus');

Route::get('/products/{id}', [Index::class, 'show'])->name('products.show');

// Optional: DataTables AJAX endpoint
Route::get('/products/data/ajax', [Index::class, 'getProductsData'])->name('products.data');

// Optional: API endpoints for cart/wishlist
Route::post('/cart/add/{id}', function($id) {
    // Add to cart logic
    return response()->json(['success' => true, 'message' => 'Product added to cart']);
})->name('cart.add');

Route::post('/wishlist/toggle/{id}', function($id) {
    // Toggle wishlist logic
    return response()->json(['success' => true, 'message' => 'Wishlist updated']);
})->name('wishlist.toggle');

//silder route

Route::post('/slider/upload', [SliderController::class, 'upload'])->name('slider.upload');
Route::delete('/slider/{id}', [SliderController::class, 'delete'])->name('slider.delete');

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
        Route::get('/home', [SliderController::class, 'home'])->name('dashboard.home');
        //category
        Route::get('/category', [CategoryController::class, 'category'])->name('dashboard.category');
        Route::post('/storecategory', [CategoryController::class, 'storecategory'])->name('dashboard.storecategory');
            // Get category for editing (AJAX)
        Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])
            ->name('categories.edit');
        
        // Update category
        Route::post('/categories/{id}/update', [CategoryController::class, 'update'])
            ->name('categories.update');
        
        // Delete category
        Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])
            ->name('categories.destroy');

        //Products
        Route::get('/products', [ProductsController::class, 'products'])->name('dashboard.products');
        Route::post('/createproduct', [ProductsController::class, 'createproduct'])->name('dashboard.createproduct');
         // routes/web.php
        Route::get('/listproducts', [ProductsController::class, 'productList'])->name('dashboard.listproducts');
        //Billing Rols

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
        //NavBar
        Route::post('/logout', [Dashboard::class, 'logout'])->name('dashboard.logout');
    });
});

