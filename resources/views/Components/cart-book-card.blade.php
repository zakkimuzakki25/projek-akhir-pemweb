<div class="cart-book-card">
    <div class="book-image">
        <img src="{{ $photo }}" alt="Book Image">
    </div>
    <div class="info">
        <div class="book-header">
            <h1>{{ $judul_buku }}</h1>
            <p>{{ $sinopsis }}</p>
        </div>
        <p class="book-footer">Jika rusak atau hilang, maka akan dikenakan denda sesuai dengan S&K yang berlaku</p>
    </div>
    <div class="checkbox-sec">
        <input type="checkbox" class="book-checkbox" data-id="{{ $id }}" data-title="{{ $judul_buku }}" onchange="updateSelectedBooks()">
    </div>
</div>
<script src="{{ asset('js/cart-book-card.js') }}"></script>