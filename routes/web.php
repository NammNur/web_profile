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
use App\Models\Produk;


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
| USER LOGOUT
|--------------------------------------------------------------------------
*/
Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

/*
|--------------------------------------------------------------------------
| USER PRODUK & PESANAN (WAJIB LOGIN)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    // KATALOG PRODUK
    Route::get('/produk', [ProdukController::class, 'index'])
        ->name('produk.index');

    Route::get('/produk/{id}', [ProdukController::class, 'show'])
        ->name('produk.show');

    // ===============================
    // BUAT PESANAN (ORDER)
    // ===============================

    // halaman buat pesanan
    Route::get('/produk/{id}/pesan', [OrderController::class, 'create'])
        ->name('produk.pesan');

    // simpan pesanan
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

    Route::get('/dashboard', [AdminDashboardController::class, 'index'])
        ->name('admin.dashboard');

    Route::get('/customers', [CustomerController::class, 'index'])
        ->name('admin.customers');

    Route::get('/products', function () {
        return view('admin.products');
    })->name('admin.products');

    Route::get('/products/create', [ProdukController::class, 'create'])
        ->name('admin.products.create');

    Route::post('/products', [ProdukController::class, 'store'])
        ->name('admin.products.store');

    Route::get('/products/manage/{type}', function ($type) {

    $views = [
        'jersey'   => 'admin.manage-product',
        'printing' => 'admin.manage-productPrinting',
        'konveksi' => 'admin.manage-productKonveksi',
        'bordir'   => 'admin.manage-productBordir',
        'logam'    => 'admin.manage-productLogam',
    ];

    $kategoriMap = [
        'jersey'   => 'produksi jersey',
        'printing' => 'produksi printing',
        'konveksi' => 'produksi konveksi',
        'bordir'   => 'produksi bordir',
        'logam'    => 'produksi logam',
    ];

    abort_if(!array_key_exists($type, $views), 404);

    $produk = Produk::where('kategori', $kategoriMap[$type])->get();

    return view($views[$type], compact('produk', 'type'));

})->name('admin.products.manage');


    Route::post('/logout', [AdminAuthController::class, 'logout'])
        ->name('admin.logout');

    // Admin order reports by kategori
    Route::get('/orders/jersey', [AdminOrderController::class, 'jersey'])->name('admin.orders.jersey');
    Route::get('/orders/konveksi', [AdminOrderController::class, 'konveksi'])->name('admin.orders.konveksi');
    Route::get('/orders/printing', [AdminOrderController::class, 'printing'])->name('admin.orders.printing');
    Route::get('/orders/logam', [AdminOrderController::class, 'logam'])->name('admin.orders.logam');
    Route::get('/orders/bordir', [AdminOrderController::class, 'bordir'])->name('admin.orders.bordir');
});



Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {

    Route::get('/orders/index', [AdminOrderController::class, 'jersey'])
        ->name('admin.orders.index');

    Route::get('/orders/jersey', [AdminOrderController::class, 'jersey'])
        ->name('admin.orders.jersey');

    Route::get('/orders/konveksi', [AdminOrderController::class, 'konveksi'])
        ->name('admin.orders.konveksi');

    Route::get('/orders/printing', [AdminOrderController::class, 'printing'])
        ->name('admin.orders.printing');

    Route::get('/orders/logam', [AdminOrderController::class, 'logam'])
        ->name('admin.orders.logam');

    Route::get('/orders/bordir', [AdminOrderController::class, 'bordir'])
        ->name('admin.orders.bordir');
    });
    
    Route::get('/admin/produk/bordir', [AdminProductController::class, 'indexBordir'])
        ->name('admin.produk.bordir');
