<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Pinjaman</title>
    <link rel="icon" href="{{ asset('logo/Logo-0.svg') }}" type="image/svg+xml">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/borrow.css') }}">
</head>

<body>
    <x-navbar />

    <div class="profile-container">
        <x-profile-navigation :loc="$loc" />

        <div class="borrow-sec">
            <div class="borrow-nav">
                <a href="/pinjaman" class="{{ Request::is('pinjaman') ? 'on' : 'off' }}">Pinjamanku</a>
                <a href="/riwayat-pinjaman" class="{{ Request::is('riwayat-pinjaman') ? 'on' : 'off' }}">Riwayat Pinjaman</a>
            </div>
            @if(count($books) > 0)
                <div class="list-book">
                    @foreach ($books as $index => $book)
                        <x-borrow-book-card id="{{ $book->id }}" photo="{{ $book->photo }}" title="{{ $book->judul_buku }}" :peminjaman="$borrowings[$index]" />
                    @endforeach
                </div>
            @else
                <div class="empty">
                    Tidak ada buku yang sedang dipinjam
                </div>
            @endif
        </div>
    </div>
</body>

</html>
