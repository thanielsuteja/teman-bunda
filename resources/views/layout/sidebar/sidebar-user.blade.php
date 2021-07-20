<div class="navigation-bar">
    <ul class="to-active">
        <li class="{{ request()->is('user/home-page*') ? 'active' : '' }}">
            <a href="{{ route('user.home') }}">
                <span class="nav-icon"><i class="bi bi-house-door"></i></span>
                <span class="nav-title">Beranda</span>
            </a>
        </li>
        <li class="{{ request()->is('user/cari-caregiver*') ? 'active' : '' }}">
            <a href="{{ route('cari-caregiver') }}">
                <span class="nav-icon"><i class="bi bi-people-fill"></i></span>
                <span class="nav-title">Cari Caregiver</span>
            </a>
        </li>
        <li class="{{ request()->is('user/order*') ? 'active' : '' }}">
            <a href="{{ route('order') }}">
                <span class="nav-icon"><i class="bi bi-table"></i></span>
                <span class="nav-title">Order Saya</span>
            </a>
        </li>
        <li class="{{ request()->is('user/transaksi*') ? 'active' : '' }}">
            <a href="{{ route('transaksi') }}">
                <span class="nav-icon"><i class="bi bi-file-text"></i></span>
                <span class="nav-title">Riwayat Transaksi</span>
            </a>
        </li>
    </ul>
</div>

<link rel="stylesheet" href="{{ asset('css/style1.css') }}">
