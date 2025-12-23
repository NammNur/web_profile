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
| USER PRODUK & PESANAN (LOGIN)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    // KATALOG PRODUK
    Route::get('/produk', [ProdukController::class, 'index'])
        ->name('produk.index');

    Route::get('/produk/{id}', [ProdukController::class, 'show'])
        ->name('produk.show');

    // BUAT PESANAN
    Route::get('/produk/{id}/pesan', [OrderController::class, 'create'])
        ->name('produk.pesan');

    Route::post('/produk/{id}/pesan', [OrderController::class, 'store'])
        ->name('produk.pesan.store');
});

/*
|--------------------------------------------------------------------------
| ADMIN AUTH (GUEST)
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->middleware('guest')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLogin'])
        ->name('admin.login');

    Route::post('/login', [AdminAuthController::class, 'login'])
        ->name('admin.login.post');

    Route::get('/register', [AdminAuthController::class, 'showRegister'])
        ->name('admin.register');

    Route::post('/register', [AdminAuthController::class, 'register'])
        ->name('admin.register.post');
});

/*
|--------------------------------------------------------------------------
| ADMIN PANEL (AUTH + ADMIN)
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {

    // DASHBOARD
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])
        ->name('admin.dashboard');

    // CUSTOMER
    Route::get('/customers', [CustomerController::class, 'index'])
        ->name('admin.customers');

    /*
    |--------------------------------------------------------------------------
    | PRODUCTS
    |--------------------------------------------------------------------------
    */
    Route::get('/products', [ProdukController::class, 'indexAdmin'])
        ->name('admin.products');

    Route::get('/products/create', [ProdukController::class, 'create'])
        ->name('admin.products.create');

    Route::post('/products', [ProdukController::class, 'store'])
        ->name('admin.products.store');

    /*
    |--------------------------------------------------------------------------
    | ORDERS (SATU TABEL)
    |--------------------------------------------------------------------------
    */
    Route::get('/admin/orders', [AdminOrderController::class, 'index'])
    ->name('admin.orders');

    
    Route::patch('/orders/{order}/status', [AdminOrderController::class, 'updateStatus'])
        ->name('admin.orders.updateStatus');

    /*
    |--------------------------------------------------------------------------
    | LOGOUT ADMIN
    |--------------------------------------------------------------------------
    */
    Route::post('/logout', [AdminAuthController::class, 'logout'])
        ->name('admin.logout');
});
