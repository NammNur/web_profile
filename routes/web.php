<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\CustomerController;

/*
|--------------------------------------------------------------------------
| PUBLIC (BISA DIAKSES SEMUA)
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::view('/about', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact');

/*
|--------------------------------------------------------------------------
| USER AUTH (GUEST ONLY)
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {

    // LOGIN USER
    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login'])
        ->name('login.post');

    // REGISTER USER
    Route::get('/register', [AuthController::class, 'showRegister'])
        ->name('register');

    Route::post('/register', [AuthController::class, 'register'])
        ->name('register.post');
});

/*
|--------------------------------------------------------------------------
| USER LOGOUT (AUTH ONLY)
|--------------------------------------------------------------------------
*/
Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

/*
|--------------------------------------------------------------------------
| ADMIN AUTH (GUEST ONLY)
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->middleware('guest')->group(function () {

    // LOGIN ADMIN
    Route::get('/login', [AdminAuthController::class, 'showLogin'])
        ->name('admin.login');

    Route::post('/login', [AdminAuthController::class, 'login'])
        ->name('admin.login.post');

    // REGISTER ADMIN
    Route::get('/register', [AdminAuthController::class, 'showRegister'])
        ->name('admin.register');

    Route::post('/register', [AdminAuthController::class, 'register'])
        ->name('admin.register.post');
});

/*
|--------------------------------------------------------------------------
| ADMIN PANEL (AUTH + ROLE ADMIN)
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {

    // DASHBOARD
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])
        ->name('admin.dashboard');

    // CUSTOMERS ✅
    Route::get('/customers', [CustomerController::class, 'index'])
        ->name('admin.customers');

    // PRODUCTS
    Route::get('/products', function () {
        return view('admin.products');
    })->name('admin.products');

    // MANAGE PRODUCTS BY TYPE
    Route::get('/products/manage/{type}', function ($type) {

        $views = [
            'jersey'   => 'admin.manage-product',
            'printing' => 'admin.manage-productPrinting',
            'konveksi' => 'admin.manage-productKonveksi',
            'bordir'   => 'admin.manage-productBordir',
            'logam'    => 'admin.manage-productLogam',
        ];

        abort_if(!array_key_exists($type, $views), 404);

        return view($views[$type], compact('type'));

    })->name('admin.products.manage');

    // LOGOUT ADMIN
    Route::post('/logout', [AdminAuthController::class, 'logout'])
        ->name('admin.logout');
});

/*
|--------------------------------------------------------------------------
| USER AREA (AUTH ONLY)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    Route::view('/katalog', 'katalog')->name('katalog');

});
