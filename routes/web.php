<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\AdminPengirimanController; // ⬅️ TAMBAH INI

/*
|--------------------------------------------------------------------------
| PUBLIC
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::view('/about', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact');

/*
|--------------------------------------------------------------------------
| USER AUTH (GUEST)
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');

    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
});

/*
|--------------------------------------------------------------------------
| USER LOGOUT
|--------------------------------------------------------------------------
*/
Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

/*
|--------------------------------------------------------------------------
| USER PROFILE & PESANAN
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    Route::get('/profile', [UserProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [UserProfileController::class, 'update'])->name('profile.update');

    Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
    Route::get('/produk/{id}', [ProdukController::class, 'show'])->name('produk.show');

    // PESAN
    Route::get('/produk/{id}/pesan', [OrderController::class, 'create'])
        ->name('produk.pesan');

    Route::post('/produk/{id}/pesan', [OrderController::class, 'store'])
        ->name('produk.pesan.store');

    // PEMBAYARAN
    Route::get('/produk/pembayaran/{id}', [OrderController::class, 'pembayaran'])
        ->name('pembayaran.show');

    Route::post('/produk/pembayaran/{id}', [OrderController::class, 'pembayaranStore'])
        ->name('pembayaran.store');
});

/*
|--------------------------------------------------------------------------
| ADMIN AUTH (GUEST)
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->middleware('guest')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login.post');

    Route::get('/register', [AdminAuthController::class, 'showRegister'])->name('admin.register');
    Route::post('/register', [AdminAuthController::class, 'register'])->name('admin.register.post');
});

/*
|--------------------------------------------------------------------------
| ADMIN PANEL
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {

    Route::get('/dashboard', [AdminDashboardController::class, 'index'])
        ->name('admin.dashboard');

    Route::get('/customers', [CustomerController::class, 'index'])
        ->name('admin.customers');

    // PRODUCTS
    Route::get('/products', [ProdukController::class, 'indexAdmin'])
        ->name('admin.products');

    Route::get('/products/manage/{type}', [ProdukController::class, 'manage'])
        ->name('admin.products.manage');

    Route::get('/products/create', [ProdukController::class, 'create'])
        ->name('admin.products.create');

    Route::post('/products', [ProdukController::class, 'store'])
        ->name('admin.products.store');

    // ORDERS
    Route::get('/orders', [AdminOrderController::class, 'index'])
        ->name('admin.orders');

    Route::patch('/orders/{order}/status', [AdminOrderController::class, 'updateStatus'])
        ->name('admin.orders.updateStatus');

    // 📦 DATA PENGIRIMAN (BARU)
    Route::get('/pengiriman', [AdminPengirimanController::class, 'index'])
        ->name('admin.pengiriman');

    // LOGOUT ADMIN
    Route::post('/logout', [AdminAuthController::class, 'logout'])
        ->name('admin.logout');

        Route::get('/admin/orders/{id}/resi', [AdminOrderController::class, 'resiForm'])
    ->name('admin.orders.resiForm');

Route::patch('/admin/orders/{id}/resi', [AdminOrderController::class, 'storeResi'])
    ->name('admin.orders.storeResi');

});
