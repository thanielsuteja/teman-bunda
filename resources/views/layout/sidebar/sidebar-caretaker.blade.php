<div class="navigation-bar">
    <ul class="to-active">
        <li class="{{ request()->is('caretaker/home*') ? 'active' : '' }}">
            <a href="{{ route('caretaker.home') }}">
                <span class="nav-icon"><i class="bi bi-house-door"></i></span>
                <span class="nav-title">Beranda</span>
            </a>
        </li>
        <li class="{{ request()->is('caretaker/order*') ? 'active' : '' }}">
            <a href="{{ route('caretaker.order') }}">
                <span class="nav-icon"><i class="bi bi-table"></i></span>
                <span class="nav-title">Order Saya</span>
            </a>
        </li>
        <li class="{{ request()->is('caretaker/riwayat-transaksi*') ? 'active' : '' }}">
            <a href="{{ route('caretaker.riwayat-transaksi') }}">
                <span class="nav-icon"><i class="bi bi-file-text"></i></span>
                <span class="nav-title">Riwayat Transaksi</span>
            </a>
        </li>
        <li class="{{ request()->is('caretaker/ulasan-saya*') ? 'active' : '' }}">
            <a href="{{ route('caretaker.ulasan-saya') }}">
                <span class="nav-icon"><i class="bi bi-star"></i></span>
                <span class="nav-title">Ulasan Saya</span>
            </a>
        </li>
    </ul>
</div>

<link rel="stylesheet" href="{{ asset('css/style1.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">