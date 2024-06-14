<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Keranjang - Ngalaam Library</title>
    <link rel="icon" href="{{ asset('logo/Logo-0.svg') }}" type="image/svg+xml">
<meta name="csrf-token" content="{{ csrf_token() }}">    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cart.css') }}">
</head>

<body>
    <x-navbar />
    <div class="main-content">
        @if(count($books) > 0)
            <div class="list-book">
                @foreach ($books as $book)
                        @component('components.cart-book-card', [
                        'id' => $book->id,
                        'photo' => $book->photo,
                        'judul_buku' => $book->judul_buku,
                        'sinopsis' => $book->sinopsis
                    ])
                        @endcomponent
                @endforeach
            </div>
        @else
            <div class="empty">
                Belum ada buku di keranjang anda
            </div>
        @endif
        @if(count($books) > 0)
            <div class="checkout-container">
                <div class="total">
                    <p><b>Subtotal</b></p>
                </div>
                <div class="subtotal" id="selected-books-list">
                    @foreach ($books as $index => $book)
                        <p>{{ $index + 1 }}. {{ $book->judul_buku }}</p>
                    @endforeach
                </div>
                <div class="return-info" id="return-info">
                    <p>Tanggal Pengembalian Buku dan detail informasi lainnya akan dikirimkan ke email akun anda</p>
                    <div class="return-details">
                        <div class="rincian">
                            <div><strong>Tanggal dan Waktu</strong></div>
                            <div>{{ now() }}</div>
                        </div>
                        <div class="rincian">
                            <div><strong>Total</strong></div>
                            <div id="total-books">{{ $books->count() }} Buku</div>
                        </div>
                    </div>
                </div>
                <button class="borrow-button" onclick="borrowBooks()">Pinjam</button>
            </div>
        @endif
    </div>

    <script>
        function updateSelectedBooks() {
            const selectedBooks = document.querySelectorAll('.book-checkbox:checked');
            const selectedBooksList = document.getElementById('selected-books-list');
            const totalBooks = document.getElementById('total-books');
            const returnInfo = document.getElementById('return-info');

            selectedBooksList.innerHTML = '';
            selectedBooks.forEach((book, index) => {
                const title = book.getAttribute('data-title');
                selectedBooksList.innerHTML += `<p>${index + 1}. ${title}</p>`;
            });

            totalBooks.innerText = `${selectedBooks.length} Buku`;

            if (selectedBooks.length > 0) {
                returnInfo.style.display = 'block';
            } else {
                returnInfo.style.display = 'none';
            }
        }

        function borrowBooks() {
            const selectedBooks = document.querySelectorAll('.book-checkbox:checked');
            const bookIds = [];

            selectedBooks.forEach(book => {
                const dataId = book.getAttribute('data-id');
                if (dataId) {
                    bookIds.push(dataId);
                } else {
                    console.error('Missing data-id attribute for book:', book);
                }
            });

            if (bookIds.length === 0) {
                alert('Please select at least one book to borrow.');
                return;
            }

            const csrfToken = document.head.querySelector('meta[name="csrf-token"]').getAttribute('content');

            fetch('{{ route("cart.borrow") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                },
                body: JSON.stringify({ book_ids: bookIds }),
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        alert('Peminjaman buku berhasil!');
                        window.location.href = '/pinjaman';
                    } else {
                        alert('Gagal melakukan peminjaman buku.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan saat melakukan peminjaman buku.');
                });
        }

        document.addEventListener('DOMContentLoaded', () => {
            updateSelectedBooks();
        });
    </script>

</body>

</html>