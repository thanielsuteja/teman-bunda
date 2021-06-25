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
    <title>Document</title>
</head>

<body class="home">
    <header class="header">
        <nav class="navbar shadow navbar-expand-lg navbar-light bg-white" id="navbar">
            <div class="container-fluid">
                <a class="navbar-brand" href="/home">
                    <img src="/img/logoTemanBunda.png" alt="" width="130px">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/find-caretaker">Find Caretakers | Bunda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-outline-default width100" href="/register">Daftar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-default width100 text-dark" href="/login">Masuk</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    @yield('content')

    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" ></script>
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