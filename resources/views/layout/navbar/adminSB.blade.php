<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous"> -->
    <link href="//db.onlinewebfonts.com/c/d2775f4d5ec8551ff80fbfd822f1efc0?family=Bodoni+Bd+BT" rel="stylesheet" type="text/css" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
    <title>Teman Bunda</title>
</head>

<body class="bg-dark">
    <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark border-end border-white" style="position: fixed; left:0; top:0; width: 15%; height:100%;  ">
        <!-- <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
      <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
      <span class="fs-4">Admin Control Panel</span>
    </a> -->
        <h2 class="nav-item">Admin Control Panel</h2>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="{{ route('adm.dashboard') }}" class="nav-link text-white">Dashboard</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('adm.users') }}" class="nav-link text-white">User List</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('adm.regions') }}" class="nav-link text-white">Manage Regions</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('adm.professions') }}" class="nav-link text-white">Manage Professions</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('adm.applications') }}" class="nav-link text-white">View Applications</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('adm.job_offers') }}" class="nav-link text-white">View Job Offers</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('adm.transactions') }}" class="nav-link text-white">View Transactions</a>
            </li>
        </ul>
        <hr>
        <div class="dropdown">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                @if (Auth::user()->profile_img_path != null)
                <img src="{{ asset('storage/profile_img/'.Auth::user()->profile_img_path) }}" alt="" width="32" height="32" class="rounded-circle me-2">
                @else
                <img src="{{ asset('/img/no-profile.png') }}" alt="" width="32" height="32" class="rounded-circle me-2">
                @endif
                <strong>{{ Auth::user()->nama_depan }} {{ Auth::user()->nama_belakang }}</strong>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                <li><a class="dropdown-item" href="/admin/profile">Profile</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="/admin/logout">Log out</a></li>
            </ul>
        </div>
    </div>


    @yield('content')



    <footer class="footer mt-auto py-3 bg-secondary" style="position: fixed; right: 0; bottom: 0; width: 85%; height:5%;">
        <div class="container">
            <span class="text-white">&copy; Teman Bunda 2021</span>
        </div>
    </footer>

    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script>
        var prevScrollpos = window.pageYOffset;
        window.onscroll = function() {
            var currentScrollPos = window.pageYOffset;
            if (prevScrollpos > currentScrollPos) {
                document.getElementById("navbar").style.top = "0";
            } else {
                document.getElementById("navbar").style.top = "-100px";
            }
            prevScrollpos = currentScrollPos;
        }
    </script>

</body>

</html>