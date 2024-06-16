@props(['id', 'photo', 'title', 'peminjaman'])

<div class="card">
    <div class="bookbg">
        <img src="{{ $photo }}" alt="{{ $title }} Cover">
    </div>
    <h1>{{ $title }}</h1>
    @php
        $today = now();
        $pickupDeadline = \Carbon\Carbon::parse($peminjaman->tanggal_peminjaman)->addDay();
    @endphp

    @if ($peminjaman->status_peminjaman === 'belum diambil' && $today <= $pickupDeadline)
        <p class="alert">Segera Ambil</p>
    @else
        <button class="primary2" id="extendButton">Perpanjang</button>
        <button class="primary1" id="returnButton">Kembalikan</button>
    @endif
</div>
<script src="{{ asset('js/history-book-card.js') }}"></script>
