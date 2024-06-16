<!-- resources/views/components/profile-navigation.blade.php -->
<div class="sidebar-profile">
    <a href="{{ route('profile.show') }}" class="{{ Request::path() == 'profil' ? 'active' : '' }} sidebar-link">
        <img src="{{ asset('icon/sidebar/Profile.svg') }}" class="icon" />
        <div>Profil</div>
    </a>
    <a href="{{ route('profile.showBook') }}" class="{{ Request::path() == 'pinjaman' || Request::path() == 'riwayat-pinjaman' ? 'active' : '' }} sidebar-link">
        <img src="{{ asset('icon/sidebar/Order.svg') }}" class="icon" />
        <div>Buku</div>
    </a>
    <a href="{{ route('profile.showFavourite') }}" class="{{ Request::path() == 'favorit' ? 'active' : '' }} sidebar-link">
        <img src="{{ asset('icon/sidebar/Favourite.svg') }}" class="icon" />
        <div>Favorit</div>
    </a>
    <button onclick="logoutHandle()" class="logout-button">Keluar</button>
</div>
<script>
function logoutHandle() {
    fetch('/keluar', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({}),
    })
    .then(response => {
        if (response.ok) {
            window.location.href = '/login';
        }
    })
    .catch(error => console.error('Error:', error));
}
</script>