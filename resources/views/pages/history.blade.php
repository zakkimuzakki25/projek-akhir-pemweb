<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Riwayat Pinjaman - Ngalaam Library</title>
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
                <a href="/riwayat-pinjaman" class="{{ Request::is('riwayat-pinjaman') ? 'on' : 'off' }}">Riwayat
                    Pinjaman</a>
            </div>
            @if(count($books) > 0)
                    <div class="list-book">
                        @foreach ($books as $book)
                                    @component('components.book-card', [
                                'id' => $book->id,
                                'photo' => $book->photo,
                                'judul_buku' => $book->judul_buku
                            ])
                                    @endcomponent
                        @endforeach
                    </div>
            @else
                <div class="empty">
                    Belum ada riwayat peminjaman
                </div>
            @endif
        </div>
    </div>
</body>

</html>