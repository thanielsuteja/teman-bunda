<header class="header fixed-top">
    <nav class="navbar shadow navbar-expand-lg navbar-light bg-white" style="box-shadow: 0 0.1rem 0.8rem rgb(0 0 0 / 15%) !important">
        <div class="container-fluid">
            <a class="navbar-brand ms-3" href="/user/home-page">
                <img src="/img/logoTemanBunda.png" alt="" width="90px" class="py-2">
            </a>
            <div class="justify-content-end me-4">
                <ul class="navbar-nav">
                    <button type="button" class="nav-link link-dark text-decoration-none px-3" style="border: 0; background-color: white; border-right: 2px solid #808080; border-left: 2px solid #808080;" id="notifikasi" data-bs-toggle="dropdown" aria-expanded="false" aria-haspopup="true" data-bs-toggle="tooltip" data-placement="right" title="Notifikasi">
                        <i class="bi bi-bell-fill m-0" style="font-size: 22px;"></i>
                    </button>
                    <div class="dropdown text-end">
                        <a href="#" class="nav-link d-block link-dark text-decoration-none dropdown-toggle ps-3" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <span>Halo, {{ Auth::user()->nama_depan }}</span>
                        </a>
                        <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                            <li><a class="dropdown-item" href="/user/profile/{{ Auth::user()->user_id }}">Profil</a></li>
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