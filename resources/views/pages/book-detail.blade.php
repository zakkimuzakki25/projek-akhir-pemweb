<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $book->judul_buku }} - Book Details</title>
    <link rel="icon" href="{{ asset('logo/Logo-0.svg') }}" type="image/svg+xml">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/popup.css') }}">
    <link rel="stylesheet" href="{{ asset('css/book-detail.css') }}">
</head>

<body>
    <x-navbar />

    <div class="container">
        <div class="breadcrumbs">
            <a href="{{ url('/rekomendasi') }}">Books</a> >
            <div>{{$book->judul_buku}}</div>
        </div>

        <div class="content">
            <div class="left">
                <div class="image-container">
                    <img src="{{ $book->photo }}" alt="{{ $book->judul_buku }} Cover" />
                </div>
            </div>

            <div class="middle">
                <div class="book-info">
                    <h1>{{ $book->judul_buku }}</h1>
                    <p class="year">{{ $book->tahun_terbit }}</p>
                    <p class="author">by <span>{{ $book->penulis }}</span> (Author)</p>
                    <p class="jenis-buku">Jenis Buku:
                        @foreach ($book->jenisBuku as $jenis)
                            <span>{{ $jenis->nama_jenis_buku }}</span>{{ !$loop->last ? ',' : '' }}
                        @endforeach
                    </p>
                    <div class="rating">
                        <button class="love-button" onclick="handleFavClick({{ $book->id }})">
                            <img src="{{ $fav ? asset('icon/fav/fav-fill.svg') : asset('icon/fav/fav-border.svg') }}"
                                alt="{{ $fav ? 'Favorited' : 'Not Favorited' }}" />
                        </button>
                    </div>
                    <p class="description">{{ $book->sinopsis }}</p>
                </div>
            </div>

            <div class="right">
                <div class="actions">
                    <div class="borrow-info">
                        <h3>Pinjam Sekarang</h3>
                        <p class="availability">{{ $book->ketersediaan ? 'Tersedia' : 'Tidak tersedia' }}</p>
                        @if($book->ketersediaan && $book->status_peminjaman != 'belum diambil')
                            <button class="btn borrow-btn" onclick="borrowHandle()">Borrow</button>
                            <button class="btn cart-btn" onclick="addToCart({{ $book->id }})">+ Keranjang</button>
                        @endif
                    </div>
                </div>
            </div>

            <div class="popup-conf" style="display: none;">
                @include('components.pop-up-confirmation', ['noHandle' => 'noHandle()', 'yesHandle' => 'yesHandle()'])
            </div>
            <div class="popup-succ" style="display: none;">
                @include('components.pop-up-success', ['pickupTime' => $pickupTime])
            </div>
        </div>
    </div>

    <script>
        let borrowClicked = false;

        const handleFavClick = (bookId) => {
            fetch('{{ route("book.favorite") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                body: JSON.stringify({ book_id: bookId }),
            })
                .then(response => response.json())
                .then(data => {
                    const favIcon = document.getElementById('fav-icon');
                    if (data.status === 'added') {
                        favIcon.src = '{{ asset("icon/fav/fav-fill.svg") }}';
                        favIcon.alt = 'Favorited';
                    } else if (data.status === 'removed') {
                        favIcon.src = '{{ asset("icon/fav/fav-border.svg") }}';
                        favIcon.alt = 'Not Favorited';
                    }
                })
                .catch(error => console.error('Error:', error))
                .finally(() => {
                    location.reload();
                });
        };

        const borrowHandle = () => {
            if (!borrowClicked) {
                borrowClicked = true;
                document.querySelector('.popup-conf').style.display = 'block';
            }
        };

        const yesHandle = () => {
            if (borrowClicked) {
                const bookId = {{ $book->id }};
                fetch('{{ route("book.borrow") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    body: JSON.stringify({ book_id: bookId }),
                })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data.success) {
                            document.querySelector('.popup-conf').style.display = 'none';
                            document.querySelector('.popup-succ').style.display = 'block';
                        } else {
                            throw new Error('Server indicated failure');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Buku tidak tersedia');
                    })
                    .finally(() => {
                        borrowClicked = false;
                    });
            }
        };

        const noHandle = () => {
            if (borrowClicked) {
                borrowClicked = false;
                document.querySelector('.popup-conf').style.display = 'none';
            }
        };

        const addToCart = (bookId) => {
            fetch('{{ route("add.to.cart") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                body: JSON.stringify({ book_id: bookId }),
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        window.location.href = '/keranjang';
                    } else {
                        throw new Error('Server response indicated failure');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Buku sedang dipinjam atau sudah berada di keranjang anda');
                });
        };
    </script>

</body>

</html>