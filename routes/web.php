<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::view('/about', 'about')->name('about');

Route::view('/admin-login', 'admin-login')->name('admin.login');

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::get('/admin/products', function () {
    return view('admin.products');
})->name('admin.products');

Route::get('/admin/products/manage/{type}', function ($type) {
    switch ($type) {
        case 'jersey':
            return view('admin.manage-product', compact('type'));
        case 'printing':
            return view('admin.manage-productPrinting', compact('type'));
        case 'konveksi':
            return view('admin.manage-productKonveksi', compact('type'));
        case 'bordir':
            return view('admin.manage-productBordir', compact('type'));
        case 'logam':
            return view('admin.manage-productLogam', compact('type'));
        default:
            abort(404);
    }
})->name('admin.products.manage');


// ==== LOGIN ====
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');


// ==== REGISTER ====
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

Route::get('/logout', function () {
    return redirect()->route('home');
})->name('logout');
Route::get('/katalog', function () {
    return view('katalog');
})->name('katalog');
