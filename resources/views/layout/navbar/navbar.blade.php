<header class="header">
    <nav class="navbar navbar-expand-lg navbar-light bg-white" id="navbar" style="box-shadow: 0 0.1rem 0.8rem rgb(0 0 0 / 15%) !important">
        <div class="container-fluid">
            <a class="navbar-brand ms-3" href="/">
                <img src="/img/logoTemanBunda.png" alt="" width="90px" class="py-2">
            </a>
            <div class="justify-content-end me-4">
                <ul class="navbar-nav">
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