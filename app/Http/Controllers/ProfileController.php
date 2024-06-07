<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function showProfile(Request $request)
    {
        $loc = $request->path();

        return view('pages.profile', compact('loc'));
    }
    public function showProfileBook(Request $request)
    {
        $loc = $request->path();

        return view('pages.borrow', compact('loc'));
    }
    public function showProfileFavourite(Request $request)
    {
        $loc = $request->path();

        return view('pages.favourite', compact('loc'));
    }
}
