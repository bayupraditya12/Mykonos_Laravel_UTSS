<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UserController;

// ====================================
// HALAMAN UTAMA (USER)
// ====================================
Route::get('/', function () {
    $judul = 'Semua Produk';
    $produk = [
        ['nama' => 'Mykonos - California Signature', 'kategori' => 'Aquatic & Aromatic', 'gambar' => asset('images/California_signature.webp')],
        ['nama' => 'Mykonos - Xoxo Rosy', 'kategori' => 'Fresh Florals', 'gambar' => asset('images/Xoxo Rosy.webp')],
        ['nama' => 'Mykonos - Sansa', 'kategori' => 'Oriental', 'gambar' => asset('images/sansa.webp')],
        ['nama' => 'Mykonos - Satin Blanc', 'kategori' => 'Sweet Fruity', 'gambar' => asset('images/Mykonos - Satin blanc.webp')],
        ['nama' => 'Mykonos x Sapeyeeee - Rouge', 'kategori' => 'Powdery Elegance', 'gambar' => asset('images/rouge.webp')],
        ['nama' => 'Mykonos - Bonfire Vanilla', 'kategori' => 'Gourmand Galore', 'gambar' => asset('images/bonfire.webp')],
    ];

    return view('home', compact('judul', 'produk'));
})->name('home');

// ====================================
// HALAMAN KONTAK
// ====================================
Route::view('/kontak', 'kontak')->name('kontak');

// ====================================
// LOGIN & REGISTER
// ====================================
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.post');

    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register'])->name('register.post');
});

// ====================================
// LOGOUT
// ====================================
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// ====================================
// REDIRECT SETELAH LOGIN
// ====================================
Route::get('/redirect', function () {
    $user = Auth::user();

    if (!$user) {
        return redirect()->route('login');
    }

    return $user->role === 'admin'
        ? redirect()->route('admin.dashboard')
        : redirect()->route('home');
})->middleware('auth')->name('redirect');

// ====================================
// ADMIN AREA (MIDDLEWARE ROLE)
// ====================================
Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('/kategori', KategoriController::class);
        Route::resource('/produk', ProdukController::class);

        // Kelola User Lengkap (CRUD)
        Route::resource('/users', UserController::class)->names([
            'index' => 'users.index',
            'create' => 'users.create',
            'store' => 'users.store',
            'show' => 'users.show',
            'edit' => 'users.edit',
            'update' => 'users.update',
            'destroy' => 'users.destroy',
        ]);
    });

// ====================================
// USER AREA (MIDDLEWARE ROLE USER)
// ====================================
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/home', fn() => redirect()->route('home'))->name('user.home');
});

// ====================================
// OPSIONAL: supaya link sidebar TETAP berfungsi tanpa ubah
// ====================================
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('/produk', ProdukController::class)->names([
        'index' => 'produk.index',
        'create' => 'produk.create',
        'store' => 'produk.store',
        'show' => 'produk.show',
        'edit' => 'produk.edit',
        'update' => 'produk.update',
        'destroy' => 'produk.destroy',
    ]);

    Route::resource('/kategori', KategoriController::class)->names([
        'index' => 'kategori.index',
        'create' => 'kategori.create',
        'store' => 'kategori.store',
        'show' => 'kategori.show',
        'edit' => 'kategori.edit',
        'update' => 'kategori.update',
        'destroy' => 'kategori.destroy',
    ]);

    Route::resource('/user', UserController::class)->names([
        'index' => 'user.index',
        'create' => 'user.create',
        'store' => 'user.store',
        'show' => 'user.show',
        'edit' => 'user.edit',
        'update' => 'user.update',
        'destroy' => 'user.destroy',
    ]);
});
