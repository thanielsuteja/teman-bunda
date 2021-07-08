@extends ('layout.master')
@include ('layout.navbar.navbar')

@section ('content')

<script src="{{ asset('js/jquery.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#login-email,#login-password').on('keyup', function() {
            var email_value = $("#login-email").val();
            var password_value = $("#login-password").val();

            if (email_value != '' && password_value != '') {
                $('#btn_login').attr('disabled', false);
            } else {
                $('#btn_login').attr('disabled', true);
            }
        });
    });
</script>
<style>
    body {
        background-image: url('img/Login.png');
        background-size: cover;
    }
</style>

<div class="container main col-xxl-12 px-5">
    <section class="row pt-5 pb-3 text-center">
        <p class="display-5">Masuk Teman Bunda</p>
    </section>
    <section class="row">
        <div class="col-md-6 offset-md-3 text-center">
            <form action="/login/store" method="post">
                {{ csrf_field() }}
                <div class="card bg-grey mx-5 mb-3" id="login-card">
                    <div class="card-body mx-4 mt-4">
                        <div class="form-floating mb-3">
                            <input type="text" id="login-email" placeholder="Email" name="email" class="form-control rounded-input">
                            <label for="login-email">Email</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" id="login-password" placeholder="Password" name="password" class="form-control rounded-input">
                            <label for="login-password">Password</label>
                        </div>
                        <div class="col-md text-end">
                            <p><a href="/forgot-password" class="text-decoration-none">Lupa kata sandi</a></p>
                        </div>
                        <input type="submit" value="Log in" id="btn_login" class="btn btn-default text-white mt-2 mb-4 w-full" style="width: 100%; height: 60px;" disabled>
                    </div>
                </div>
                <div class="col-md text-center">
                    <p>Belum punya akun? <a href="/register" class="text-decoration-none">Daftar</a></p>
                </div>
            </form>
        </div>
    </section>
</div>

@endsection