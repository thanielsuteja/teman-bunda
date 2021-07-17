<header class="header fixed-top">
    <nav class="navbar shadow navbar-expand-lg navbar-light bg-white">
        <div class="container-fluid">
            <a class="navbar-brand ms-3" href="/home">
                <img src="/img/logoTemanBunda.png" alt="" width="90px" class="py-2">
            </a>
            <div class="justify-content-end me-4">
                <ul class="navbar-nav">
                    <li class="nav-item me-3">
                        <a class="nav-link" aria-current="page" href="/find-caretaker">Gabung Dengan Teman Bunda</a>
                    </li>
                    <button type="button" class="nav-link link-dark text-decoration-none px-3" style="border: 0; background-color: white; border-right: 2px solid #808080; border-left: 2px solid #808080;" id="notifikasi" data-bs-toggle="dropdown" aria-expanded="false" aria-haspopup="true" data-bs-toggle="tooltip" data-placement="right" title="Notifikasi">
                        <i class="bi bi-bell-fill m-0" style="font-size: 22px;"></i>
                        <!-- <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            99+
                            <span class="visually-hidden">unread messages</span>
                        </span> -->
                    </button>
                    <div class="dropdown text-end">
                        <a href="#" class="nav-link d-block link-dark text-decoration-none dropdown-toggle ps-3" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <span>Halo, {{ Auth::user()->nama_depan }}</span>
                        </a>
                        <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                            <li><a class="dropdown-item" href="#">Profil</a></li>
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