<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
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
                    <div class="info-field">_zakki</div>
                </div>
                <div class="info-col">
                    <label>Email</label>
                    <div class="info-field">zakkimuzakki050@gmail.com</div>
                </div>
                <div class="info-col">
                    <label>Nama Lengkap</label>
                    <div class="info-field">Muhammad Iqbal Muzakki</div>
                </div>
                <div class="info-col">
                    <label>Alamat di Malang</label>
                    <div class="info-field">Jl. Candi V no 240D, Sukun</div>
                </div>
                <div class="info-row">
                    <div class="info-col">
                        <label>Jenis Kelamin</label>
                        <div class="info-field">Laki-laki</div>
                    </div>
                    <div class="info-col">
                        <label>Tanggal Lahir</label>
                        <div class="info-field">25 Maret 2004</div>
                    </div>
                </div>
                <div class="button-container">
                    <button class="update-profile-button">Perbarui Profil</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>