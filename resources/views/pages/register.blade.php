<link rel="stylesheet" type="text/css" href="../../css/register.css">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Anggota - Ngalam Library</title>
</head>
<body>
    <div class="container">
        <div class="left-section">
            <div class="overlay">
                <h1>Your passport to <br>
                <br>to</br> <br>
                </b> rendless adventures</h1>
            </div>
        </div>
        <div class="right-section">
            <div class="logo">
                <img src="../../../public/logo/Logo.png" alt="Ngalam Library Logo">
                
            </div>
            <h2>Pendaftaran Anggota</h2>
            <form>
                <label for="name">Nama Lengkap:</label>
                <input type="text" id="name" name="name" placeholder="enter your full name here">
                
                <label for="username">Nama Pengguna:</label>
                <input type="text" id="username" name="username" placeholder="enter your username here">
                
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="enter your email here">
                
                <label for="address">Alamat di Malang:</label>
                <input type="text" id="address" name="address" placeholder="enter your address here">
                
                <label for="password">Kata Sandi:</label>
                <input type="password" id="password" name="password" placeholder="enter your password here">
                
                <button type="submit">Daftar</button>
            </form>
            <p>Sudah mendaftar? <a href="login.blade.php">Masuk</a></p>
        </div>
    </div>
</body>
</html>
