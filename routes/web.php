<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Seller\ProductController;
use App\Http\Controllers\Seller\DashboardController as SellerDashboardController;
use App\Http\Controllers\Seller\LoginController as SellerLoginController;
use App\Http\Controllers\Seller\RegisterController as SellerRegisterController;
use App\Http\Controllers\Seller\SettingController;
use App\Http\Controllers\Seller\ReportController;
use App\Http\Controllers\Seller\VerificationController;
use App\Http\Controllers\Seller\ProfileController; // <-- tambahkan ini
use App\Http\Controllers\Buyer\LoginController as BuyerLoginController;
use App\Http\Controllers\Buyer\RegisterController as BuyerRegisterController;
use App\Http\Controllers\Buyer\DashboardController as BuyerDashboardController;
use App\Http\Controllers\LandingpageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController as AdminLoginController;
use App\Http\Controllers\Auth\ConfirmPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;

/*
|--------------------------------------------------------------------------
| Landing Page
|--------------------------------------------------------------------------
*/
Route::get('/', [LandingpageController::class, 'index'])->name('landing');

/*
|--------------------------------------------------------------------------
| Seller Routes
|--------------------------------------------------------------------------
*/
Route::prefix('seller')->name('seller.')->group(function () {
    // Auth
    Route::get('login', [SellerLoginController::class, 'index'])->name('login');
    Route::post('login', [SellerLoginController::class, 'login'])->name('login.process');
    Route::get('logout', [SellerLoginController::class, 'logout'])->name('logout');

    Route::get('register', [SellerRegisterController::class, 'index'])->name('register');
    Route::post('register', [SellerRegisterController::class, 'register'])->name('register.store');

    // Hanya seller login
    Route::middleware(['auth:seller'])->group(function () {
        Route::get('dashboard', [SellerDashboardController::class, 'index'])->name('dashboard');

        // Product CRUD
        Route::get('product', [ProductController::class, 'index'])->name('product');
        Route::get('product/create', [ProductController::class, 'create'])->name('product.create');
        Route::post('product', [ProductController::class, 'store'])->name('product.store');
        Route::get('product/{product:slug}/edit', [ProductController::class, 'edit'])->name('product.edit');
        Route::patch('product/{product:slug}', [ProductController::class, 'update'])->name('product.update');
        Route::delete('product/{product:slug}', [ProductController::class, 'destroy'])->name('product.destroy');

        // Setting & Report
        Route::get('setting', [SettingController::class, 'index'])->name('setting');
        Route::post('setting', [SettingController::class, 'update'])->name('setting.update');
        Route::get('report', [ReportController::class, 'index'])->name('report');

        // ✅ Tambahkan Profile Route
        Route::get('profile', [ProfileController::class, 'index'])->name('profile');

        // Verification
        Route::get('verification/resend', [VerificationController::class, 'resend'])->name('verification.resend');
    });
});

/*
|--------------------------------------------------------------------------
| Buyer Routes (pakai guard web = tabel users)
|--------------------------------------------------------------------------
*/
Route::prefix('buyer')->name('buyer.')->group(function () {
    // Auth
    Route::get('login', [BuyerLoginController::class, 'index'])->name('login');
    Route::post('login', [BuyerLoginController::class, 'process'])->name('login.process');
    Route::post('logout', [BuyerLoginController::class, 'logout'])->name('logout');

    Route::get('register', [BuyerRegisterController::class, 'showRegisterForm'])->name('register');
    Route::post('register', [BuyerRegisterController::class, 'register'])->name('register.store');

    // Hanya buyer login
    Route::middleware('auth')->group(function () {
        Route::get('dashboard', [BuyerDashboardController::class, 'index'])->name('dashboard');
    });
});

/*
|--------------------------------------------------------------------------
| Admin Panel Routes
|--------------------------------------------------------------------------
*/
Route::prefix('admin-panel')->name('admin.')->group(function () {
    // Auth
    Route::get('login', [AdminLoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AdminLoginController::class, 'login'])->name('login.process');

    Route::post('logout', [AdminLoginController::class, 'logout'])->name('logout');
    Route::get('logout', [AdminLoginController::class, 'logout']);

    // Forgot Password
    Route::get('password/confirm', [ConfirmPasswordController::class, 'showConfirmForm'])->name('password.confirm');
    Route::post('password/confirm', [ConfirmPasswordController::class, 'confirm']);
    Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('password/reset', [ForgotPasswordController::class, 'reset'])->name('password.update');
    Route::get('password/reset/{token}', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');

    // Dashboard Admin
    Route::get('/', [HomeController::class, 'index'])->name('dashboard');
});
