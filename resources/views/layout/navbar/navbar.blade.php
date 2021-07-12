<header class="header">
    <nav class="navbar shadow navbar-expand-lg navbar-light bg-white" id="navbar">
        <div class="container-fluid">
            <a class="navbar-brand" href="/home">
                <img src="/img/logoTemanBunda.png" alt="" width="90px" class="py-2">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item extra-margin">
                        <a class="nav-link" aria-current="page" href="/find-caretaker">Find Caretakers | Bunda</a>
                    </li>
                    <li class="nav-item extra-margin">
                        <a class="nav-link btn btn-outline-default width100" href="/register">Daftar</a>
                    </li>
                    <li class="nav-item extra-margin">
                        <a class="nav-link btn bg-temanbunda width100 text-dark" href="/login">Masuk</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

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