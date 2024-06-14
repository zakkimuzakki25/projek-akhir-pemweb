<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Peminjaman;
use App\Models\JenisBuku;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function toggleFavorite(Request $request)
    {
        $bookId = $request->input('book_id');
        $user = Auth::user();

        if ($user) {
            $book = Buku::find($bookId);

            if ($user->favoritBooks()->where('id_buku', $bookId)->exists()) {
                $user->favoritBooks()->detach($bookId);
                return response()->json(['status' => 'removed']);
            } else {
                $user->favoritBooks()->attach($bookId);
                return response()->json(['status' => 'added']);
            }
        }

        return response()->json(['status' => 'error'], 403);
    }
    public function showHome()
    {
        $books = Buku::all();

        return view('pages.home', compact('books'));
    }

    public function showBookDetail($id)
    {
        $book = Buku::with('jenisBuku')->find($id);

        $user = Auth::user();
        $fav = false;

        if ($user) {
            $fav = $user->favoritBooks()->where('id_buku', $id)->exists();
        }

        $pickupTime = now()->addDays(1)->setTimezone('Asia/Jakarta')->toDateTimeString();

        $borrowClicked = false;
        $clickedYesBorrow = false;

        return view('pages.book-detail', [
            'book' => $book,
            'fav' => $fav,
            'pickupTime' => $pickupTime,
            'borrowClicked' => $borrowClicked,
            'clickedYesBorrow' => $clickedYesBorrow,
        ]);
    }

    public function searchPage(Request $request)
    {
        $query = $request->query('key', null);
        $sort = $request->input('sort');
        $jenis_buku = $request->input('jenis_buku') ? (array) $request->input('jenis_buku') : [];
        $penulis = $request->input('penulis') ? (array) $request->input('penulis') : [];
        $tahun_terbit = $request->input('tahun_terbit') ? (array) $request->input('tahun_terbit') : [];

        $jenis_buku_list = JenisBuku::pluck('nama_jenis_buku')->toArray();
        $penulis_list = Buku::distinct()->pluck('penulis')->toArray();
        $tahun_terbit_list = Buku::distinct()->pluck('tahun_terbit')->toArray();

        $booksQuery = Buku::query();

        if ($query) {
            $booksQuery->where('judul_buku', 'LIKE', '%' . $query . '%');
        }

        if (!empty($jenis_buku)) {
            $booksQuery->whereHas('jenisBuku', function ($query) use ($jenis_buku) {
                $query->whereIn('nama_jenis_buku', $jenis_buku);
            });
        }

        if (!empty($penulis)) {
            $booksQuery->whereIn('penulis', $penulis);
        }

        if (!empty($tahun_terbit)) {
            $booksQuery->whereIn('tahun_terbit', $tahun_terbit);
        }

        if ($sort == 'az') {
            $booksQuery->orderBy('judul_buku', 'asc');
            $sortAlfabet = true;
            $sortNew = false;
        } elseif ($sort == 'new') {
            $booksQuery->orderBy('tahun_terbit', 'desc');
            $sortAlfabet = false;
            $sortNew = true;
        } else {
            $sortAlfabet = false;
            $sortNew = false;
        }

        $books = $booksQuery->get();

        return view('pages.search', compact('books', 'query', 'sortAlfabet', 'sortNew', 'jenis_buku_list', 'penulis_list', 'tahun_terbit_list', 'jenis_buku', 'penulis', 'tahun_terbit'));
    }


    public function recommendationPage(Request $request)
    {
        $query = $request->query('key', null);
        $sort = $request->input('sort');
        $jenis_buku = $request->input('jenis_buku') ? explode(',', $request->input('jenis_buku')) : [];
        $penulis = $request->input('penulis') ? explode(',', $request->input('penulis')) : [];
        $tahun_terbit = $request->input('tahun_terbit') ? explode(',', $request->input('tahun_terbit')) : [];

        $jenis_buku_list = JenisBuku::pluck('nama_jenis_buku');
        $penulis_list = Buku::distinct()->pluck('penulis');
        $tahun_terbit_list = Buku::distinct()->pluck('tahun_terbit');

        $booksQuery = Buku::query();

        if ($query) {
            $booksQuery->where('judul_buku', 'LIKE', '%' . $query . '%');
        }

        if (!empty($jenis_buku)) {
            $booksQuery->whereHas('jenisBuku', function ($query) use ($jenis_buku) {
                $query->whereIn('nama_jenis_buku', $jenis_buku);
            });
        }

        if (!empty($penulis)) {
            $booksQuery->whereIn('penulis', $penulis);
        }

        if (!empty($tahun_terbit)) {
            $booksQuery->whereIn('tahun_terbit', $tahun_terbit);
        }

        if ($sort == 'az') {
            $booksQuery->orderBy('judul_buku', 'asc');
            $sortAlfabet = true;
            $sortNew = false;
        } elseif ($sort == 'new') {
            $booksQuery->orderBy('tahun_terbit', 'desc');
            $sortAlfabet = false;
            $sortNew = true;
        } else {
            $sortAlfabet = false;
            $sortNew = false;
        }

        $books = $booksQuery->get();

        return view('pages.recommendation', compact('books', 'query', 'sortAlfabet', 'sortNew', 'jenis_buku_list', 'penulis_list', 'tahun_terbit_list', 'jenis_buku', 'penulis', 'tahun_terbit'));
    }

    public function borrowBook(Request $request)
{
    $user = Auth::user();
    $bookId = $request->input('book_id');

    if ($user) {
        $existingBorrow = Peminjaman::where('id_pengguna', $user->id)
            ->where('id_buku', $bookId)
            ->where('status_peminjaman', 'belum diambil')
            ->where('tanggal_peminjaman', '>', now()->subDay())
            ->first();

        if ($existingBorrow) {
            return response()->json(['success' => false, 'message' => 'Buku ini sedang kamu pinjam']);
        }

        $peminjaman = new Peminjaman();
        $peminjaman->id_pengguna = $user->id;
        $peminjaman->id_buku = $bookId;
        $peminjaman->tanggal_peminjaman = now();
        $peminjaman->tanggal_jatuh_tempo = now()->addWeeks(2);
        $peminjaman->status_peminjaman = 'belum diambil';
        $peminjaman->denda = 0;
        $peminjaman->save();

        $book = Buku::find($bookId);
        $book->ketersediaan = false;
        $book->save();

        return response()->json(['success' => true]);
    }

    return response()->json(['success' => false, 'message' => 'User not authenticated.']);
}

    public function borrowBooks(Request $request)
    {
        $user = Auth::user();
        $bookIds = $request->input('book_ids');

        foreach ($bookIds as $bookId) {
            $existingBorrow = Peminjaman::where('id_pengguna', $user->id)
                ->where('id_buku', $bookId)
                ->where('status_peminjaman', 'belum diambil')
                ->where('tanggal_peminjaman', '>', now()->subDay())
                ->first();

            if ($existingBorrow) {
                continue;
            }

            $peminjaman = new Peminjaman();
            $peminjaman->id_pengguna = $user->id;
            $peminjaman->id_buku = $bookId;
            $peminjaman->tanggal_peminjaman = now();
            $peminjaman->tanggal_jatuh_tempo = now()->addWeeks(2);
            $peminjaman->status_peminjaman = 'belum diambil';
            $peminjaman->denda = 0;
            $peminjaman->save();

            $book = Buku::find($bookId);
            $book->ketersediaan = false;
            $book->save();
        }

        $user->cartBooks()->detach($bookIds);

        return response()->json(['success' => true]);
    }


    public function addToCart(Request $request)
    {
        $user = Auth::user();
        $bookId = $request->input('book_id');

        $isBorrowed = Peminjaman::where('id_pengguna', $user->id)
            ->where('id_buku', $bookId)
            ->where('status_peminjaman', 'belum diambil')
            ->where('tanggal_peminjaman', '>', now()->subDay())
            ->exists();

        if ($isBorrowed) {
            return response()->json(['success' => false, 'message' => 'Buku sudah dipinjamkan oleh Anda.']);
        }

        if ($user->cartBooks->contains($bookId)) {
            return response()->json(['success' => false, 'message' => 'Buku sudah ada di dalam keranjang Anda.']);
        }

        $user->cartBooks()->attach($bookId);

        return response()->json(['success' => true]);
    }

}
