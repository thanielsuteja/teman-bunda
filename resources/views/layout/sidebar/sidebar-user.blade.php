<div class="navigation-bar">
    <ul class="to-active">
        <li class="active">
            <a href="{{ route('home-user') }}">
                <span class="nav-icon"><i class="bi bi-house-door"></i></span>
                <span class="nav-title">Beranda</span>
            </a>
        </li>
        <hr>
        <li>
            <a href="{{ route('cari-caretaker') }}">
                <span class="nav-icon"><i class="bi bi-people-fill"></i></span>
                <span class="nav-title">Cari Caretaker</span>
            </a>
        </li>
        <hr>
        <li>
            <a href="#">
                <span class="nav-icon"><i class="bi bi-table"></i></span>
                <span class="nav-title">Penawaran Kerjaku</span>
            </a>
        </li>
        <hr>
        <li>
            <a href="#">
                <span class="nav-icon"><i class="bi bi-file-text"></i></span>
                <span class="nav-title">Riwayat Transaksi</span>
            </a>
        </li>
        <hr>
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