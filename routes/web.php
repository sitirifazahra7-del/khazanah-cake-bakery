<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;

/*
|--------------------------------------------------------------------------
| Web Routes — Khazanah Cake & Bakery
|--------------------------------------------------------------------------
*/

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/pesan', [OrderController::class, 'store'])->name('order.store');

// Auth Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// User Routes
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
    Route::get('/orders/{order}/payment', [UserController::class, 'showPayment'])->name('user.payment');
    Route::post('/orders/{order}/payment', [UserController::class, 'uploadPayment']);
});

// Admin Routes
Route::middleware(['auth', AdminMiddleware::class])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::patch('/orders/{order}/status', [AdminController::class, 'updateStatus'])->name('orders.updateStatus');
    Route::patch('/orders/{order}/verify-payment', [AdminController::class, 'verifyPayment'])->name('orders.verifyPayment');
    Route::delete('/orders/{order}', [AdminController::class, 'destroy'])->name('orders.destroy');
});
