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
        <nav class="navbar shadow navbar-expand-lg navbar-light" id="navbar">
            <div class="container-fluid">
                <a class="navbar-brand" href="/home">
                    <img src="/img/logoTemanBunda.png" alt="" width="160px">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
            </div>
        </nav>
    </header>

<!-- content -->

<div class="container my-5 p-2">
    <section class="row py-5">
    <h2 class="container rounded bg-warning p-2">Admin Login</h2>
        <form class="container rounded bg-light p-2" action="/login/admstore" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label>Email : </label>
                <input type="text" name="email" class="form-control">
            </div>
            <div class="form-group">
                <label>Password : </label>
                <input type="password" name="password" class="form-control">
            </div>
            <input type="submit" value="Log in" class="btn btn-default">
        </form>
    </section>
</div>

<!-- end content -->

    <footer class="footer mt-auto py-3 bg-secondary">
        <div class="container">
            <span class="text-white">&copy; Teman Bunda 2021</span>
        </div>
    </footer>

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