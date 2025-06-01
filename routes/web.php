<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Dashboard\BillingRols;
use App\Http\Controllers\Dashboard\Dashboard;
use App\Http\Controllers\Index;
use Illuminate\Support\Facades\Route;

Route::get('/', [Index::class, 'index'])->name('index');


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
        Route::get('/createbillingrols', [BillingRols::class, 'createBillingRols'])->name('dashboard.createbillingrols');
        Route::post('/storebillingrols', [BillingRols::class, 'storeBillingRols'])->name('dashboard.storebillingrols');
        Route::post('/logout', [Dashboard::class, 'logout'])->name('dashboard.logout');
    });
});

