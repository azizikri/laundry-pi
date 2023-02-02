<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;

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

Route::get('/', IndexController::class)->name('index');

Route::prefix('servis')->name('services.')->group(function () {
    Route::get('/', [ServiceController::class, 'index'])->name('index');
    Route::get('/{service}', [ServiceController::class, 'show'])->name('show');
});

Route::prefix('produk')->name('products.')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('index');
    Route::get('/{product}', [ProductController::class, 'show'])->name('show');
});

Route::get('/tentang-kami', AboutUsController::class)->name('about-us.index');


// Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->middleware(['auth', 'verified'])->name('dashboard');

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        Route::get('/keranjang', [CartController::class, 'index'])->name('cart.index');
        Route::post('/keranjang', [CartController::class, 'addToCart'])->name('cart.add');
        Route::patch('keranjang/update', [CartController::class, 'update'])->name('cart.update');
        Route::get('/keranjang/kosongkan', [CartController::class, 'clear'])->name('cart.clear');
        Route::post('/keranjang/hapus', [CartController::class, 'remove'])->name('cart.remove');

        Route::post('/checkout', [OrderController::class, 'store'])->name('orders.store');
        Route::get('/order', [OrderController::class, 'index'])->name('orders.index');
        Route::get('/order/{order}', [OrderController::class, 'show'])->name('orders.show');
        Route::patch('/order/{order}/bukti-pembayaran', [OrderController::class, 'uploadPaymentProof'])->name('orders.upload.payment-proof');
        Route::get('/order/{order}/ubah-status', [OrderController::class, 'changeOrderStatus'])->name('orders.change-status');

});

require __DIR__.'/auth.php';
