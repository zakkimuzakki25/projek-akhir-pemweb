<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - Ngalaam Library</title>
    <link rel="icon" href="{{ asset('logo/Logo-0.svg') }}" type="image/svg+xml">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>

<body>
    <div class="flex-container">
        <div class="logo-container">
            <a href="/"><img class="logo" src="{{ asset('logo/Logo-1.svg') }}" alt="Ngalaam Library Logo" /></a>
        </div>
        <div class="content-container">
            <div style="background-image: url('{{ asset('images/bg-auth.jpg') }}');" class="image-container">
                <div class="image-container-layer">
                    <div class="text-overlay">Your passport to endless adventures</div>
                </div>
            </div>

            <form method="POST" action="{{ route('daftar.submit') }}">
                @csrf
                <div class="form-content">
                    <div class="form-header">Pendaftaran Anggota</div>
                    <div class="form-group">
                        <label for="nama_lengkap">Nama Lengkap</label>
                        <input type="text" id="nama_lengkap" name="nama_lengkap" placeholder="enter your fullname here"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="nama_pengguna">Nama Pengguna</label>
                        <input type="text" id="nama_pengguna" name="nama_pengguna" placeholder="enter your username here"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="enter your email here" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat di Malang</label>
                        <input type="text" id="alamat" name="alamat" placeholder="enter your address here" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Kata Sandi</label>
                        <input type="password" id="password" name="password" placeholder="enter your password here"
                            required>
                    </div>
                    @if ($errors->any())
                        <div class="error-message">
                            <div>
                                @foreach ($errors->all() as $error)
                                    <div>{{ $error }}</div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                    <button type="submit" class="primary1">Daftar</button>
                    <div class="or-divider">
                        <span class="line"></span>
                        <span class="text">Or</span>
                        <span class="line"></span>
                    </div>
                    <div class="register-link">
                        Sudah mendaftar? <a href="{{ route('login') }}">Masuk</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>