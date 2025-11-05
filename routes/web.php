<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/halo', function () {
    return "Haloo ini laravel";
});

Route::get('/club', function () {
    return "Selamat datang di club 21+";
})->middleware('cekusia');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/about', function () {
    return view('about');
})->name('about');

// Semua route yang butuh login
Route::middleware('auth')->group(function () {

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Semua user (login biasa) bisa melihat data produk
    Route::get('/products', [ProdukController::class, 'index'])->name('products.index');
    Route::get('/products/{id}', [ProdukController::class, 'show'])->name('products.show');

    // Khusus ADMIN bisa CRUD
    Route::middleware('role:admin')->group(function () {
        Route::get('/products/create', [ProdukController::class, 'create'])->name('products.create');
        Route::post('/products', [ProdukController::class, 'store'])->name('products.store');
        Route::get('/products/{id}/edit', [ProdukController::class, 'edit'])->name('products.edit');
        Route::put('/products/{id}', [ProdukController::class, 'update'])->name('products.update');
        Route::delete('/products/{id}', [ProdukController::class, 'destroy'])->name('products.destroy');
    });
});

require __DIR__.'/auth.php';
