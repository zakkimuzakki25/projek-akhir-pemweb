<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ngalaam Library</title>
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
                <div class="">
                    <book-card image="tes.png" title="The Great Gatsby" author="F. Scott Fitzgerald"
                        synopsis="Jay Gatsby, seorang jutawan misterius, mengadakan pesta-pesta mewah di rumahnya yang megah di Long Island." />
                    <book-card image="https://example.com/book2-cover.jpg" title="Pride and Prejudice"
                        author="Jane Austen"
                        synopsis="Elizabeth Bennet, seorang wanita muda yang cerdas dan mandiri, harus memilih antara dua pelamar yang berbeda." />

                </div>
            </div>
        </div>
        <div class="body-content">
            <div class="title">
                <h2>Rekomendasi </h2>
                <a href="#" class="btn-all">Semua</a>
            </div>
            <div class="list-book">
                <book-card image="https://example.com/book3-cover.jpg" title="To Kill a Mockingbird" author="Harper Lee"
                    synopsis="Scout Finch, seorang gadis muda yang tinggal di Alabama Selatan pada tahun 1930-an, belajar tentang rasisme dan ketidakadilan ketika ayahnya membela seorang pria kulit hitam yang dituduh memperkosa seorang wanita kulit putih." />
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>