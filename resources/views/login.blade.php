@extends ('navbar.navbar-top')

@section ('content')

<div class="container main col-xxl-12 px-5">
    <section class="row pt-5 pb-3 text-center">
        <p class="display-5">Masuk Teman Bunda</p>
    </section>
    <section class="row">
        <div class="col-md-6 offset-md-3 text-center">
            <form action="/login/store" method="post">
                {{ csrf_field() }}
                <div class="card bg-grey mb-5" id="login-card">
                    <div class="card-body mx-4 mt-4">
                        <div class="form-floating mb-3">
                            <input type="text" id="login-email" placeholder="Email" name="email" class="form-control rounded-input">
                            <label for="login-email">Email</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" id="login-password" placeholder="Password" name="password" class="form-control rounded-input">
                            <label for="login-password">Password</label>
                        </div>
                        <input type="submit" value="Log in" class="btn btn-default text-white mt-2 mb-4" style="width: 240px; height: 60px;">
                        <div class="row">
                            <div class="col-md text-start">
                                <p>Belum punya akun? <a href="/register" class="text-decoration-none">Daftar</a></p>
                            </div>
                            <div class="col-md text-end">
                                <p><a href="/forgot-password" class="text-decoration-none">Lupa kata sandi</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>  
    </section>
</div>

@endsection