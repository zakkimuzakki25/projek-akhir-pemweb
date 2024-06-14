@push('styles')
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
@endpush

<div class="navbar">
    <div class="navbar-logo">
        <a href="/">
            <img class="logo" src="{{ asset('logo/Logo-4.svg') }}" alt="Logo Seacrust" />
        </a>
    </div>

    <div class="navbar-center">
        <form action="{{ url('/cari') }}" method="GET" class="search-form">
            <button class="search-button" type="submit">
                <img src="{{ asset('icon/Search.svg') }}" alt="Search Icon" class="search-icon" />
            </button>
            <input type="text" id="key" name="key" placeholder="{{ $searchKey ? $searchKey : 'Search' }}"
                class="search-input" autoComplete="off" required />
        </form>
        <a href="{{ route('profile.showFavourite') }}" class="icon-link">
            <img src="{{ asset('icon/Favourite.svg') }}" alt="Favourite Icon" class="icon" />
        </a>
        <a href="{{ route('profile.showCart') }}" class="icon-link">
            <img src="{{ asset('icon/Cart.svg') }}" alt="Cart Icon" class="icon" />
        </a>
    </div>

    <div class="navbar-end">
        @if(Auth::check())
            <a href="{{ url('/profil') }}" class="profile-link">
                <span class="username">{{ Auth::user()->nama_lengkap }}</span>
                <img src="{{ asset('icon/sidebar/Profile.svg') }}" alt="Profile" class="profile-img" />
            </a>
        @else
            <div class="auth-links">
                <a href="{{ url('/login') }}" class="auth-link">Masuk</a>
                <span class="separator">|</span>
                <a href="{{ url('/register') }}" class="auth-link">Daftar</a>
            </div>
        @endif
    </div>
</div>