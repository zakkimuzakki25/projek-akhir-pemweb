<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Favorit Anda Kosong</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../../css/favorite_syle.css">
</head>
<body>
    <x-navbar/>

    <div class="container mt-5">
        <div class="empty-favorite text-center">
            <div class="heart-icon">
                <!-- Anda bisa menggunakan SVG atau image untuk icon hati -->
                <img src="{{ asset('images/heart-icon.png') }}" alt="Heart Icon" style="width: 200px;">
            </div>
            <h2>Favorit Anda Kosong</h2>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
