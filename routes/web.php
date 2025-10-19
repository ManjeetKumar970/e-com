<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Dashboard\BarcodeRolController;
use App\Http\Controllers\Dashboard\BillingRols;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\Dashboard;
use App\Http\Controllers\Dashboard\PrintersController;
use App\Http\Controllers\Dashboard\ProductsController;
use App\Http\Controllers\Dashboard\SliderController;
use App\Http\Controllers\Frontend\ProductreviewController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\WishlistController;
use App\Http\Controllers\Index;
use Illuminate\Support\Facades\Route;

Route::get('/', [Index::class, 'index'])->name('index');
Route::get('/product', [Index::class, 'product'])->name('product');
Route::get('/custombarcode', [Index::class, 'custombarcode'])->name('custombarcode');
Route::get('/contactus', [Index::class, 'contactus'])->name('contactus');
Route::get('/productreview/{slug}/{id}', [Index::class, 'productreview'])->name('productreview');

// checkout route
Route::get('/productcheckout', [CheckoutController::class, 'productcheckout'])->name('productcheckout');

Route::get('orderconfirmation', [Index::class, 'orderconfirmation'])->name('orderconfirmation');
Route::get('/userLogout', [AuthController::class, 'userLogout'])->name('userLogout');
Route::get('/product/{slug}/{id}', [ProductreviewController::class, 'show'])->name('product.show');
Route::post('/product/update-label', [ProductsController::class, 'updateLabel'])->name('product.updateLabel');
Route::post('/product/update-status', [ProductsController::class, 'updateStatus'])->name('product.updateStatus');
//cart routes
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view');
Route::post('/cart/update', [CartController::class, 'updateCart'])->name('cart.update');
Route::delete('/cart/remove', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::delete('/cart/clear', [CartController::class, 'clearCart'])->name('cart.clear');
// Wishlist Routes
Route::post('/wishlist/toggle', [WishlistController::class, 'toggle'])->name('wishlist.toggle');
Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
Route::delete('/wishlist/remove', [WishlistController::class, 'remove'])->name('wishlist.remove');
Route::delete('/wishlist/clear', [WishlistController::class, 'clear'])->name('wishlist.clear');
Route::post('/wishlist/check', [WishlistController::class, 'check'])->name('wishlist.check');


Route::get('/products/{id}', [Index::class, 'show'])->name('products.show');
Route::get('/products/data/ajax', [Index::class, 'getProductsData'])->name('products.data');
Route::post('/cart/add/{id}', function ($id) {
    return response()->json(['success' => true, 'message' => 'Product added to cart']);
})->name('cart.add');

Route::post('/wishlist/toggle/{id}', function ($id) {
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
