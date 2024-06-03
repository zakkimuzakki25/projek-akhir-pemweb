<link rel="stylesheet" href="../../css/profile-navigation.css">
<div class="sidebar-profile">
    <a href="/user/profile" class="{{ strpos($loc, '/user/profile') !== false ? 'active' : '' }} sidebar-link">
        <img src="../../../public/icon/sidebar/Profile.svg" class="icon" />
        <div>Profil</div>
    </a>
    <a href="/user/order" class="{{ strpos($loc, '/user/order') !== false ? 'active' : '' }} sidebar-link">
        <img src="../../../public/icon/sidebar/Order.svg" class="icon" />
        <div>Buku</div>
    </a>
    <a href="/user/favourite" class="{{ strpos($loc, '/user/favourite') !== false ? 'active' : '' }} sidebar-link">
        <img src="../../../public/icon/sidebar/Favourite.svg" class="icon" />
        <div>Favorit</div>
    </a>
    <button onclick="logoutHandle()" class="logout-button">Keluar</button>
</div>
<script src="../../js/profile-navigation.js"></script>