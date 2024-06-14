<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Profil - Ngalaam Library</title>
    <link rel="icon" href="{{ asset('logo/Logo-0.svg') }}" type="image/svg+xml">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
</head>

<body>
    <x-navbar />

    <div class="profile-container">
        <x-profile-navigation :loc="$loc" />

        <div class="profile-sec">
            <div class="section-title">Informasi Pengguna</div>
            <div class="profile-info">
                <div class="info-col">
                    <label>Nama Pengguna</label>
                    <div class="info-field">{{ $user->nama_pengguna }}</div>
                </div>
                <div class="info-col">
                    <label>Email</label>
                    <div class="info-field">{{ $user->email }}</div>
                </div>
                <div class="info-col">
                    <label>Nama Lengkap</label>
                    <div class="info-field">{{ $user->nama_lengkap }}</div>
                </div>
                <div class="info-col">
                    <label>Alamat di Malang</label>
                    <div class="info-field">{{ $user->alamat }}</div>
                </div>
                <div class="info-row">
                    <div class="info-col">
                        <label>Jenis Kelamin</label>
                        @if ($user->jenis_kelamin)
                            <div class="info-field">{{ $user->jenis_kelamin }}</div>
                        @else
                            <div class="info-field">-</div>
                        @endif
                    </div>
                    <div class="info-col">
                        <label>Tanggal Lahir</label>
                        @if ($user->tanggal_lahir)
                            <div class="info-field">{{ $user->tanggal_lahir}}</div>
                        @else
                            <div class="info-field">-</div>
                        @endif
                    </div>
                </div>
                <div class="button-container">
                    <button class="update-profile-button" onclick="editProfile()">Edit Profil</button>
                </div>
            </div>

            <form class="edit-profile-form" style="display: none;" action="{{ route('profile.update') }}" method="POST">
                    @csrf
                    <!-- Input field untuk setiap informasi pengguna yang dapat diedit -->
                    <div class="info-col">
                        <label for="nama_lengkap">Nama Lengkap</label>
                        <input class="info-field" type="text" id="nama_lengkap" name="nama_lengkap" value="{{ $user->nama_lengkap }}">
                    </div>
                    <div class="info-col">
                        <label for="alamat">Alamat di Malang</label>
                        <input class="info-field" type="text" id="alamat" name="alamat" value="{{ $user->alamat }}">
                    </div>
                    <div class="info-row">
                        <div class="info-col">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select class="info-field" id="jenis_kelamin" name="jenis_kelamin">
                                <option value="Laki-laki" {{ $user->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>
                                    Laki-laki</option>
                                <option value="Perempuan" {{ $user->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>
                                    Perempuan</option>
                            </select>
                        </div>
                        <div class="info-col">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input class="info-field" type="date" id="tanggal_lahir" name="tanggal_lahir"
                                value="{{ $user->tanggal_lahir ? $user->tanggal_lahir : '' }}">
                        </div>
                    </div>
                    <!-- Tombol untuk menyimpan perubahan -->
                    <div class="button-container">
                        <button type="submit" class="update-profile-button">Simpan Perubahan</button>
                    </div>
            </form>

        </div>
    </div>

</body>

<script>
    function editProfile() {
        document.querySelector('.profile-info').style.display = 'none';

        // Tampilkan form pengeditan profil
        // Anda dapat menggunakan AJAX untuk memuat form pengeditan dari server
        // atau menampilkan form yang sudah ada di halaman ini
        // Berikut adalah contoh sederhana untuk menampilkan form yang sudah ada di halaman ini
        document.querySelector('.edit-profile-form').style.display = 'flex';
    }
</script>


</html>