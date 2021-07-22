<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link href="//db.onlinewebfonts.com/c/d2775f4d5ec8551ff80fbfd822f1efc0?family=Bodoni+Bd+BT" rel="stylesheet" type="text/css" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <title>Document</title>
</head>

<body class="home">
    <header class="header">
        <nav class="navbar shadow navbar-expand-lg navbar-light" id="navbar">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">
                    <img src="/img/logoTemanBunda.png" alt="" width="100px" class="ms-4">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

            </div>
        </nav>
    </header>

    <div class="container main col-xxl-12 px-5">
        <section class="row pt-5 pb-3 text-center">
            <p class="display-5">Masuk Admin</p>
        </section>
        <section class="row">
            <div class="col-md-6 offset-md-3 text-center">
                <form action="/login/admstore" method="post">
                    {{ csrf_field() }}
                    <div class="card bg-light mx-5 mb-3" id="login-card">
                        <div class="card-body mx-4 mt-4">
                            <div class="form-floating mb-3">
                                <input type="text" id="login-email" placeholder="Email" name="email" class="form-control rounded-input">
                                <label for="login-email">Email</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" id="login-password" placeholder="Password" name="password" class="form-control rounded-input">
                                <label for="login-password">Password</label>
                            </div>
                            <input type="submit" value="Log in" id="btn_login" class="btn bg-temanbunda text-white mt-2 mb-4 w-full" style="width: 100%; height: 60px;">
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>

    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>

</html>