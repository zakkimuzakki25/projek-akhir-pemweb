<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages/home');
});

Route::get('/profil', function () {
    return view('pages/profile');
});
Route::get('/profil/favorit', function () {
    return view('pages/favourite');
});