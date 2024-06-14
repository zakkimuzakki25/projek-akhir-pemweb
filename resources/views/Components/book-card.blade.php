<div class="card">
    <div class="bookbg">
        <img src="{{ $photo }}">
    </div>
    <h1>{{ $judul_buku }}</h1>
    <button class="primary1" id="borrowButton" data-id="{{ $id }}">Pinjam</button>
</div>
<script src="{{ asset('js/history-book-card.js') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        document.querySelectorAll('.primary1').forEach(button => {
            button.addEventListener('click', function() {
                var bookId = this.getAttribute('data-id');
                window.location.href = '/buku/' + bookId;
            });
        });
    });
</script>
