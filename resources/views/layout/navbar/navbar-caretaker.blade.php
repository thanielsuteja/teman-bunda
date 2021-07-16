<header class="header fixed-top">
    <nav class="navbar shadow navbar-expand-lg navbar-light bg-white">
        <div class="container-fluid">
            <a class="navbar-brand" href="/home">
                <img src="/img/logoTemanBunda.png" alt="" width="90px" class="py-2">
            </a>
            <div class="justify-content-end">
                <ul class="navbar-nav">
                    <div class="dropdown text-end">
                        <a href="#" class="nav-link d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <span>Halo, {{ Auth::user()->nama_depan }}</span>
                        </a>
                        <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                            <li><a class="dropdown-item" href="{{ route('caretaker.profile') }}">Profil</a></li>
                            <li><a class="dropdown-item" href="#">Pengaturan</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}">Keluar</a></li>
                        </ul>
                    </div>
                </ul>
            </div>
        </div>
    </nav>
</header>