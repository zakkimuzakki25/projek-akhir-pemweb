<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search - Ngalaam Library</title>
    <link rel="icon" href="{{ asset('logo/Logo-0.svg') }}" type="image/svg+xml">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/search.css') }}">
</head>

<body>
    <x-navbar />
    <div class="main-content">
        <div class="filter-sec">
            <h1>FILTER</h1>
            <div class="filter-box">
                <label>Jenis Buku</label>
                @foreach ($jenis_buku_list as $jenis)
                    <div class="check-box">
                        <input type="checkbox" name="jenis_buku" value="{{ $jenis }}" onchange="applyFilter()" {{ in_array($jenis, $jenis_buku) ? 'checked' : '' }} />
                        <p>{{ $jenis }}</p>
                    </div>
                @endforeach
            </div>
            <div class="filter-box">
                <label>Nama Pengarang</label>
                @foreach ($penulis_list as $penulis_item)
                    <div class="check-box">
                        <input type="checkbox" name="penulis" value="{{ $penulis_item }}" onchange="applyFilter()" {{ in_array($penulis_item, $penulis) ? 'checked' : '' }} />
                        <p>{{ $penulis_item }}</p>
                    </div>
                @endforeach
            </div>
            <div class="filter-box">
                <label>Tahun Terbit</label>
                @foreach ($tahun_terbit_list as $tahun)
                    <div class="check-box">
                        <input type="checkbox" name="tahun_terbit" value="{{ $tahun }}" onchange="applyFilter()" {{ in_array($tahun, $tahun_terbit) ? 'checked' : '' }} />
                        <p>{{ $tahun }}</p>
                    </div>
                @endforeach
            </div>

        </div>
        <div class="book-sec">
            Hasil pencarian untuk "{{$query}}"
            <div class="sortir">
                URUTKAN
                <button class="{{ $sortAlfabet ? 'active' : 'nonactive' }}" onclick="sortBooks('az')">A-Z</button>
                <button class="{{ $sortNew ? 'active' : 'nonactive' }}" onclick="sortBooks('new')">TERBARU</button>
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
                    Buku tidak tersedia:(
                </div>
            @endif
        </div>
    </div>
    <x-footer />

    <script>
        function applyFilter() {
            let jenisBuku = [];
            document.querySelectorAll('input[name="jenis_buku"]:checked').forEach((el) => {
                jenisBuku.push(el.value);
            });

            let penulis = [];
            document.querySelectorAll('input[name="penulis"]:checked').forEach((el) => {
                penulis.push(el.value);
            });

            let tahunTerbit = [];
            document.querySelectorAll('input[name="tahun_terbit"]:checked').forEach((el) => {
                tahunTerbit.push(el.value);
            });

            let url = new URL(window.location.href);
            url.searchParams.set('jenis_buku', jenisBuku.join(','));
            url.searchParams.set('penulis', penulis.join(','));
            url.searchParams.set('tahun_terbit', tahunTerbit.join(','));
            window.location.href = url.toString();
        }

        function sortBooks(sortType) {
            let url = new URL(window.location.href);
            url.searchParams.set('sort', sortType);
            window.location.href = url.toString();
        }
    </script>
</body>

</html>