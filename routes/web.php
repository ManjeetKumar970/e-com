<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Dashboard\OrderHandleController;
use App\Http\Controllers\Dashboard\BarcodeRolController;
use App\Http\Controllers\Dashboard\BillingRols;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\PrintersController;
use App\Http\Controllers\Dashboard\ProductsController;
use App\Http\Controllers\Dashboard\SliderController;
use App\Http\Controllers\ErrorController;
use App\Http\Controllers\Frontend\ProductreviewController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\ContactMessageController;
use App\Http\Controllers\Frontend\Customebarcods;
use App\Http\Controllers\Frontend\OrderController;
use App\Http\Controllers\Frontend\WishlistController;
use App\Http\Controllers\Index;
use Illuminate\Support\Facades\Route;

// =======================
// 🌐 PUBLIC ROUTES
// =======================
Route::get('/', [Index::class, 'index'])->name('index');
Route::get('/product', [Index::class, 'product'])->name('product');
Route::get('/custombarcode', [Index::class, 'custombarcode'])->name('custombarcode');
Route::get('/contactus', [Index::class, 'contactus'])->name('contactus');

// Product Review & Order Confirmation
Route::get('/productreview/{slug}/{id}', [Index::class, 'productreview'])->name('productreview');
Route::get('/orderconfirmation/{user_id}', [Index::class, 'orderconfirmation'])->name('orderconfirmation');

// =======================
// 🛒 CHECKOUT & ORDERS
// =======================
Route::get('/productcheckout', [CheckoutController::class, 'productcheckout'])->name('productcheckout');
Route::post('/checkout', [OrderController::class, 'store'])->name('checkout.store');
Route::get('/orderconfirmationbyid/{orderId}', [OrderController::class, 'orderconfirmationbyid'])->name('orderconfirmations');

// =======================
// 🔐 AUTHENTICATION
// =======================
Route::get('/userLogout', [AuthController::class, 'userLogout'])->name('userLogout');

// =======================
// 🧾 PRODUCTS
// =======================
Route::get('/product/{slug}/{id}', [ProductreviewController::class, 'show'])->name('product.show');
Route::post('/product/update-label', [ProductsController::class, 'updateLabel'])->name('product.updateLabel');
Route::post('/product/update-status', [ProductsController::class, 'updateStatus'])->name('product.updateStatus');

// Product listing and AJAX data
Route::get('/products/{id}', [Index::class, 'show'])->name('products.show');
Route::get('/products/data/ajax', [Index::class, 'getProductsData'])->name('products.data');

// =======================
// 🛍️ CART ROUTES
// =======================
Route::prefix('cart')->group(function () {
    Route::post('/add', [CartController::class, 'add'])->name('cart.add');
    Route::get('/', [CartController::class, 'viewCart'])->name('cart.view');
    Route::post('/update', [CartController::class, 'updateCart'])->name('cart.update');
    Route::delete('/remove', [CartController::class, 'removeFromCart'])->name('cart.remove');
    Route::delete('/clear', [CartController::class, 'clearCart'])->name('cart.clear');
});

// =======================
// 💖 WISHLIST ROUTES
// =======================
Route::prefix('wishlist')->group(function () {
    Route::post('/toggle', [WishlistController::class, 'toggle'])->name('wishlist.toggle');
    Route::get('/', [WishlistController::class, 'index'])->name('wishlist.index');
    Route::delete('/remove', [WishlistController::class, 'remove'])->name('wishlist.remove');
    Route::delete('/clear', [WishlistController::class, 'clear'])->name('wishlist.clear');
    Route::post('/check', [WishlistController::class, 'check'])->name('wishlist.check');
});

// =======================
// 🖼️ SLIDER ROUTES
// =======================
Route::prefix('slider')->group(function () {
    Route::post('/upload', [SliderController::class, 'upload'])->name('slider.upload');
    Route::delete('/{id}', [SliderController::class, 'delete'])->name('slider.delete');
});

// =======================
// 🧾 CUSTOM BARCODE
// =======================
Route::prefix('barcode-orders')->group(function () {
    Route::get('/{id}', [Customebarcods::class, 'show'])->name('barcode-orders.show');
    Route::post('/', [Customebarcods::class, 'store'])->name('barcode-orders.store');
    Route::delete('/{id}', [Customebarcods::class, 'destroy'])->name('barcode-orders.destroy');
});

// =======================
// ✉️ CONTACT US
// =======================
Route::post('/contact-message', [ContactMessageController::class, 'store'])->name('contact-message.store');

// =======================
// 🧠 DASHBOARD (ADMIN SECTION)
// =======================
Route::prefix('dashboard')->group(function () {

    // --- Login & Register ---
    Route::get('/', [AuthController::class, 'index'])->name('dashboard.index');
    Route::post('/register', [AuthController::class, 'register'])->name('dashboard.register');
    Route::post('/login', [AuthController::class, 'login'])->name('dashboard.login');
    Route::get('/login', fn() => redirect()->route('dashboard.index'))->name('login');

    // --- Protected Admin Routes ---
    Route::middleware('auth')->group(function () {

        // Dashboard pages
        Route::get('/admindashboard', fn() => view('dashboard.admindashboard'))->name('dashboard.admindashboard');
        Route::get('/home', [SliderController::class, 'home'])->name('dashboard.home');
        Route::get('/admindashboard', [DashboardController::class, 'adminDashboard'])
        ->name('dashboard.admindashboard');

        // --- Category Management ---
        Route::get('/category', [CategoryController::class, 'category'])->name('dashboard.category');
        Route::post('/storecategory', [CategoryController::class, 'storecategory'])->name('dashboard.storecategory');
        Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
        Route::post('/categories/{id}/update', [CategoryController::class, 'update'])->name('categories.update');
        Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');

        // --- Products ---
        Route::get('/products', [ProductsController::class, 'products'])->name('dashboard.products');
        Route::post('/createproduct', [ProductsController::class, 'createproduct'])->name('dashboard.createproduct');
        Route::get('/listproducts', [ProductsController::class, 'productList'])->name('dashboard.listproducts');
        Route::post('/storeProduct', [ProductsController::class, 'storeProduct'])->name('dashboard.storeProduct');
        // --- Order  ---
        Route::get('/showorder', [OrderHandleController::class, 'orderview'])->name('order.show');
        Route::get('/order/{id}/details', [OrderHandleController::class, 'getOrderDetails'])->name('order.details');
        Route::post('/order/update', [OrderHandleController::class, 'updateOrder'])->name('order.update');
        Route::get('/order/track/{trackingId}', [OrderHandleController::class, 'trackOrder'])->name('order.track');
        Route::get('/order/{id}/download-bill', [OrderHandleController::class, 'downloadBill'])->name('order.download.bill');
        Route::post('/order/{id}/cancel', [OrderHandleController::class, 'cancelOrder'])->name('order.cancel');
        Route::get('/order/stats', [OrderHandleController::class, 'getOrderStats'])->name('order.stats');

        // --- Billing Roles ---
        Route::get('/createbillingrols', [BillingRols::class, 'createBillingRols'])->name('dashboard.createbillingrols');
        Route::post('/storebillingrols', [BillingRols::class, 'storeBillingRols'])->name('dashboard.storebillingrols');

        // --- Barcode Roles ---
        Route::get('/barcodepage', [BarcodeRolController::class, 'barcodepage'])->name('dashboard.barcodepage');

        // --- Printers ---
        Route::get('/billingprinter', [PrintersController::class, 'billingPrinter'])->name('dashboard.billingprinter');
        Route::get('/storegprinter', [PrintersController::class, 'storePrinter'])->name('dashboard.storeprinter');

        // --- UI Components ---
        Route::get('/sidebar', [DashboardController::class, 'sidebar'])->name('dashboard.sidebar');

        // --- Logout ---
        Route::post('/logout', [DashboardController::class, 'logout'])->name('dashboard.logout');
    });
});

// =======================
// 🚨 FALLBACK (404 PAGE)
// =======================
// In routes/web.php
Route::fallback(function () {
    return response()->view('404', [], 404);
});