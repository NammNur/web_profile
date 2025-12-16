<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\KatalogController;
use App\Http\Controllers\ProdukController;

/*
|--------------------------------------------------------------------------
| PUBLIC (BISA DIAKSES SEMUA)
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::view('/about', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact');

/* ✅ KATALOG (INI YANG SEBELUMNYA BIKIN 404) */
Route::get('/katalog', function () {
    return view('katalog.index');
})->name('katalog');

/*
|--------------------------------------------------------------------------
| USER AUTH (GUEST ONLY)
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {

    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login'])
        ->name('login.post');

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
| ADMIN PANEL (AUTH + ROLE ADMIN)
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {

    Route::get('/dashboard', [AdminDashboardController::class, 'index'])
        ->name('admin.dashboard');

    Route::get('/customers', [CustomerController::class, 'index'])
        ->name('admin.customers');

    Route::get('/products', function () {
        return view('admin.products');
    })->name('admin.products');

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

    Route::post('/logout', [AdminAuthController::class, 'logout'])
        ->name('admin.logout');
});

/*
|--------------------------------------------------------------------------
| USER AREA
|--------------------------------------------------------------------------
*/

Route::get('/katalog', [ProdukController::class, 'index'])->name('produk.index');
Route::get('/produk/{id}', [ProdukController::class, 'show'])->name('produk.show');



