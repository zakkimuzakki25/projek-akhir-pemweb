<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages/home');
});

Route::get('/profil', [App\Http\Controllers\ProfileController::class, 'showProfile'])->name('profile.show');
Route::get('/pinjaman', [App\Http\Controllers\ProfileController::class, 'showProfileBook'])->name('profile.showBook');
Route::get('/favorit', [App\Http\Controllers\ProfileController::class, 'showProfileFavourite'])->name('profile.showFavourite');