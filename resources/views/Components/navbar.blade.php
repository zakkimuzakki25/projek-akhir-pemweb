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
