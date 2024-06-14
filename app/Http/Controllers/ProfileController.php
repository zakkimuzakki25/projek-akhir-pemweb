<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Buku;
use App\Models\Peminjaman;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function showRegistrationForm()
    {
        return view('pages.register');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_lengkap' => 'required|string|max:255',
            'nama_pengguna' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'alamat' => 'required|string|max:255',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return redirect()->route('daftar')
                ->withErrors($validator)
                ->withInput();
        }

        User::create([
            'nama_lengkap' => $request->nama_lengkap,
            'nama_pengguna' => $request->nama_pengguna,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Pendaftaran berhasil. Silakan masuk.');
    }

    public function showLoginForm()
    {
        return view('pages.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $field = filter_var($credentials['email'], FILTER_VALIDATE_EMAIL) ? 'email' : 'nama_pengguna';
        $user = User::where($field, $credentials['email'])->first();

        if ($user && Hash::check($credentials['password'], $user->password)) {
            Auth::login($user);
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return redirect()->route('login')->withErrors([
            'email' => 'Akun atau Password salah',
        ]);
    }

    public function showProfile(Request $request)
    {
        $userId = auth()->id();
        $user = User::findOrFail($userId);

        $loc = $request->path();

        return view('pages.profile', compact('loc', 'user'));
    }
    public function showProfileBook(Request $request)
    {
        $userId = auth()->id();

        $borrowings = Peminjaman::where('id_pengguna', $userId)
            ->where('status_peminjaman', '!=', 'selesai')
            ->get();

        $borrowedBooks = $borrowings->pluck('id_buku');
        $books = Buku::whereIn('id', $borrowedBooks)->get();
        $loc = $request->path();

        return view('pages.borrow', compact('loc', 'books', 'borrowings'));
    }

    public function showProfileBookHistory(Request $request)
    {
        $userId = auth()->id();
        $completedBorrowings = Peminjaman::where('id_pengguna', $userId)
            ->where('status_peminjaman', 'selesai')
            ->get();

        if ($completedBorrowings->isEmpty()) {
            return view('pages.history', ['loc' => $request->path(), 'books' => [], 'completedBorrowings' => []])
                ->withErrors(['error' => 'Belum ada riwayat peminjaman selesai.']);
        }

        $completedBooks = $completedBorrowings->pluck('id_buku');
        $books = Buku::whereIn('id', $completedBooks)->get();
        $loc = $request->path();

        return view('pages.history', compact('loc', 'books', 'completedBorrowings'));
    }

    public function showProfileFavourite(Request $request)
    {
        $userId = auth()->id();
        $user = User::find($userId);

        $books = $user->favoritBooks;

        $loc = $request->path();

        return view('pages.favourite', compact('loc', 'books'));
    }
    public function showProfileCart(Request $request)
    {
        $user = Auth::user();

        $books = $user->cartBooks;

        return view('pages.cart', compact('books'));
    }

    public function updateProfile(Request $request)
    {
        $validatedData = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tanggal_lahir' => 'nullable|date',
        ]);

        $user = auth()->user();
        $user->nama_lengkap = $validatedData['nama_lengkap'];
        $user->alamat = $validatedData['alamat'];
        $user->jenis_kelamin = $validatedData['jenis_kelamin'];
        $user->tanggal_lahir = $validatedData['tanggal_lahir'];
        $user->save();

        return redirect()->route('profile.show')->with('success', 'Profil berhasil diperbarui.');
    }

    public function keluar(Request $request)
    {
    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('login')->with('success', 'Anda telah berhasil keluar.');
}

}
