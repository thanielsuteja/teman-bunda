@extends ('layout.master')
@section ('title', 'Selamat!')
@include ('layout.navbar.navbar-caretaker')

@section ('content')
<style>
    body {
        overflow: hidden;
    }
</style>
<div class="container col-xxl-12">
    <div class="row" style="padding-top: 100px;">
        <div class="col-7">
            <img src="/img/daftar-caretaker_3.png" class="d-block mx-lg-auto img-fluid" width="700">
        </div>
        <div class="col-4">
            <p class="display-1 text-end fw-bold m-0" style="padding-top: 100px;">Selamat!</p>
            <p class="display-6 text-end fw-bold">Kamu sudah<br>terdaftar sebagai<br>mitra Teman Bunda</p>
            <div class="d-flex justify-content-end">
                <a href="/caretaker/home" class="btn bg-temanbunda py-3 px-5" style="width: 50%; font-size: 18px;" role="button">Mulai</a>
            </div>
        </div>
    </div>
</div>
@endsection