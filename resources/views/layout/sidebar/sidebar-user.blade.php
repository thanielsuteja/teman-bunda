<div class="navigation-bar">
    <ul class="to-active">
        <li class="{{ request()->is('user/home-page*') ? 'active' : '' }}">
            <a href="{{ route('user.home') }}">
                <span class="nav-icon"><i class="bi bi-house-door"></i></span>
                <span class="nav-title">Beranda</span>
            </a>
        </li>
        <li class="{{ request()->is('user/cari-caretaker*') ? 'active' : '' }}">
            <a href="{{ route('user.cari-caretaker') }}">
                <span class="nav-icon"><i class="bi bi-people-fill"></i></span>
                <span class="nav-title">Cari Caretaker</span>
            </a>
        </li>
        <li class="{{ request()->is('user/cari-caretaker*') ? 'active' : '' }}">
            <a href="#">
                <span class="nav-icon"><i class="bi bi-table"></i></span>
                <span class="nav-title">Penawaran Kerjaku</span>
            </a>
        </li>
        <li class="{{ request()->is('user/cari-caretaker*') ? 'active' : '' }}">
            <a href="#">
                <span class="nav-icon"><i class="bi bi-file-text"></i></span>
                <span class="nav-title">Riwayat Transaksi</span>
            </a>
        </li>
    </ul>
</div>

<link rel="stylesheet" href="{{ asset('css/style1.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
<script>
    $(document).ready(function() {
        $("ul.to-active > li").click(function(e) {
            $("ul.to-active > li").removeClass("active");
            $(this).addClass("active");
        });
    });
</script>