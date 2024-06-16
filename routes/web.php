<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookController;

Route::middleware(['web'])->group(function () {
    Route::get('/', [BookController::class, 'showHome'])->name('book.home');

    Route::get('/daftar', [ProfileController::class, 'showRegistrationForm'])->name('daftar');
    Route::post('/daftar', [ProfileController::class, 'register'])->name('daftar.submit');

    Route::get('/login', [ProfileController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [ProfileController::class, 'login'])->name('login.submit');
    
    Route::middleware(['auth'])->group(function () {
        Route::get('/profil', [ProfileController::class, 'showProfile'])->name('profile.show');
        Route::post('/profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');
        Route::get('/pinjaman', [ProfileController::class, 'showProfileBook'])->name('profile.showBook');
        Route::get('/riwayat-pinjaman', [ProfileController::class, 'showProfileBookHistory'])->name('profile.showBookHistory');
        Route::get('/favorit', [ProfileController::class, 'showProfileFavourite'])->name('profile.showFavourite');
        Route::get('/keranjang', [ProfileController::class, 'showProfileCart'])->name('profile.showCart');
        Route::post('/keluar', [ProfileController::class, 'keluar'])->name('keluar');

        Route::post('/book/favorite', [BookController::class, 'toggleFavorite'])->name('book.favorite');
        Route::post('/book/borrow', [BookController::class, 'borrowBook'])->name('book.borrow');
        Route::post('/add-to-cart', [BookController::class, 'addToCart'])->name('add.to.cart');
        Route::post('/cart/borrow', [BookController::class, 'borrowBooks'])->name('cart.borrow');
        Route::get('/buku/{id}', [BookController::class, 'showBookDetail'])->name('book.detail');
    });

    Route::get('/cari', [BookController::class, 'searchPage'])->name('book.search');
    Route::get('/rekomendasi', [BookController::class, 'recommendationPage'])->name('book.recommendation');
});
