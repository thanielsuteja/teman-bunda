@extends ('layout.master')
@section ('title', 'Terima kasih!')
@include ('layout.navbar.navbar-caretaker')

@section ('content')
<style>
    body {
        overflow-x: hidden;
    }
</style>
<div class="row justify-content-center">
    <div class="col-5 border-2 border-start border-end px-5" style="min-height: 632px; margin-top: 97px;">
        <p class="display-4">Terima kasih sudah bertransaksi bersama Teman Bunda</p>
        <div class="row justify-content-center" style="margin-top: 260px;">
            <a href="{{ route('caretaker.home') }}" class="btn bg-temanbunda py-3 px-5" style="width: 50%; font-size: 18px;" role="button">Kembali ke Beranda</a>
        </div>
    </div>
</div>
@endsection