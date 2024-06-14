<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ngalaam Library</title>
    <link rel="icon" href="{{ asset('logo/Logo-0.svg') }}" type="image/svg+xml">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>

<body>
    <x-navbar />
    <div class="main-container">
        <div class="header-content">
            <div class="home-img">
                <img src="{{ asset('images/home/ilustrasi-buku.png') }}" alt="Book Image">
            </div>
            <div class="content">
                <h1>NGALAAM LIBRARY</h1>
                <p>Ngalaam Library kini hadir dengan online services. Di mana pun kamu berada, Ngalaam selalu hadir
                    untuk
                    menghubungkan dan merekomendasikan berbagai buku kepadamu. Jadilah pribadi yang kreatif dan
                    inovatif.
                    Telusuri dan temukan bacaan yang kamu inginkan. Reserve or Borrow it now!</p>
            </div>
        </div>
        <div class="main-content">
            <div class="title">
                <h2>Rekomendasi</h2>
                <a href="/rekomendasi" class="btn-all">Semua</a>
            </div>
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
        </div>
        <x-footer />
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
