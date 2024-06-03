<link rel="stylesheet" type="text/css" href="../../css/book-detail.css">
<link rel="stylesheet" type="text/css" href="../../css/navbar.css">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Great Gatsby - Book Details</title>
</head>
<body>
<link rel="stylesheet" href="../../css/navbar.css">
<div class="navbar">
    <div class="navbar-logo">
        <a href="/">
            <img class="logo" src="../../../public/logo/Logo-4.svg" alt="Logo Seacrust" />
        </a>
    </div>

    <div class="navbar-center">
        <form action="{{ url('/search') }}" method="GET" class="search-form">
            <button class="search-button" type="submit">
                <img src="../../../public/icon/Search.svg" alt="Search Icon" class="search-icon" />
            </button>
            <input type="text" id="key" name="key" placeholder="{{ $searchKey ? $searchKey : 'Search' }}" class="search-input" autoComplete="off" required />
        </form>
        <a href="{{ url('/user/favourite') }}" class="icon-link">
            <img src="../../../public/icon/Favourite.svg" alt="Favourite Icon" class="icon" />
        </a>
        <a href="{{ url('/user/cart') }}" class="icon-link">
            <img src="../../../public/icon/Cart.svg" alt="Cart Icon" class="icon" />
        </a>
    </div>

    <div class="navbar-end">
        <!-- @if(Auth::check()) -->
            <a href="{{ url('/user/profile') }}" class="profile-link">
                <span class="username">Muhammad Iqbal Muzakki</span>
                <img src="../../../public/icon/sidebar/Profile.svg" alt="Profile" class="profile-img" />
            </a>
        <!-- @else
            <div class="auth-links">
                <a href="{{ url('/login') }}" class="auth-link">Log In</a>
                <span class="separator">|</span>
                <a href="{{ url('/register') }}" class="auth-link">Registration</a>
            </div>
        @endif -->
    </div>
</div>


    <div class="book-container">
        <div class="left-section">
            <div class="book-image">
                <img src="https://penerbitdeepublish.com/wp-content/uploads/2020/11/Cover-Buku-DIGITAL-MARKETING-MELALUI-APLIKASI-PLAYSTORE_Usman-Chamdani-depan-scaled-1.jpg" 
                alt="The Great Gatsby Cover">
                
            </div>
            <div class="book-card">
                <p>Author: </p>
                <h1>Drs. Usman Chamdani</h1>
            </div>
        </div>
        <div class="right-section">
            <div class="text-box">
                <h1>Digital Marketing</h1>
                <p class="year">2020</p>
                <p class="author">by Drs. Usman Chamdani (Author)</p>
                <div class="rating">
                    ★★★★☆ 4.5 (851)
                    <button class="love-button">❤</button> <!-- Love button -->
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sagittis eu volutpat odio facilisis mauris sit. Purus gravida quis blandit turpis cursus. Nulla porttitor massa id neque. Enim praesent elementum facilisis leo. Dictumst vestibulum rhoncus est pellentesque elit ullamcorper dignissim cras tincidunt. Leo a diam sollicitudin tempor id. Nunc congue nisi vitae suscipit tellus mauris.</p>
                <div class="content-row">
                    <div class="reviews">
                        <h2>Penilaian Buku</h2>
                        <!-- Example review -->
                        <div class="review">
                            <strong>@akdakd</strong>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
                            <strong>@kiwkwiw</strong>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
                            <strong>@panerfef</strong>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
                        </div>
                        <!-- Add more reviews as needed -->
                    </div>
                    <div class="borrow-section">
                        <h3>Borrow Now</h3>
                        <p class="availability">Hanya 1 lagi</p>
                        <p class="return-date">Tanggal dan Jam Pengembalian: 10 June 2024 19:40:4</p>
                        <button class="borrow-button">Borrow</button>
                        <button class="reservation-button">Reservation</button>
                        <button class="cart-button">Add to Cart</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/history-book-card.js') }}"></script>
</body>
</html>
