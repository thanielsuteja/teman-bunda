<style>
    .remove-caret::after {
        display: none !important;
    }
</style>
<header class="header fixed-top">
    <nav class="navbar navbar-expand-lg navbar-light bg-white" style="box-shadow: 0 0.1rem 0.8rem rgb(0 0 0 / 15%) !important">
        <div class="container-fluid">
            <a class="navbar-brand ms-3" href="/user/home-page">
                <img src="/img/logoTemanBunda.png" alt="" width="90px" class="py-2">
            </a>
            <div class="justify-content-end me-4">
                <ul class="navbar-nav">
                    <li class="nav-item me-3">
                        <a class="nav-link" aria-current="page" href="/daftar-caretaker">Gabung Dengan Teman Bunda</a>
                    </li>
                    <div class="dropdown text-end">
                        <a href="#" class="nav-link d-block link-dark text-decoration-none dropdown-toggle px-3 remove-caret" id="dropdownNotification" data-bs-toggle="dropdown" aria-expanded="false" style="border: 0; background-color: white; border-right: 2px solid #808080; border-left: 2px solid #808080;">
                            <div class="d-flex position-relative"><i class="bi bi-bell-fill m-0" style="font-size: 22px;"></i> <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">{{ Auth::user()->Notifications->count() }}</span></div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-text-wrap dropdown-menu-end" aria-labelledby="dropdownNotification">
                            @foreach (Auth::user()->Notifications()->orderBy('created_at', 'DESC')->get() as $notification)
                            <li class="border-top border-bottom">
                                <a class="dropdown-item" href="{{ $notification->url }}">
                                    <strong class="d-block">{{ $notification->notification_type }}</strong>
                                    {{ $notification->content }}
                                </a>

                            </li>
                            @endforeach
                        </ul>
                    </div>
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