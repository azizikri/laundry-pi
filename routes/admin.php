<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CourierController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::middleware(['auth:admin'])->group(function () {
    Route::get('dashboard', DashboardController::class)->name('dashboard');

    Route::resource('products', ProductController::class)->except(['show']);

    Route::resource('orders', OrderController::class)->only(['index', 'show', 'destroy']);
    Route::patch('/orders/{order}/ubah-status-pemesanan', [OrderController::class, 'changeOrderStatus'])->name('orders.change-order-status');
    Route::patch('/orders/{order}/ubah-status-pembayaran', [OrderController::class, 'changePaymentStatus'])->name('orders.change-payment-status');


    Route::resource('services', ServiceController::class)->except(['show']);

    Route::resource('couriers', CourierController::class)->except(['show']);

    Route::resource('users', UserController::class);

    Route::resource('admins', AdminController::class)->except(['show']);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth-admin.php';
