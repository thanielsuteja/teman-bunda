@extends ('layout.master')
@section ('title', 'Menunggu Terverifikasi | Teman Bunda')
@include ('layout.navbar.navbar-user')

@section ('content')
<style>
    body {
        font-size: 15px;
        overflow: hidden;
    }
</style>
<main class="container col-xxl-12 px-0 py-3">
    <div class="row" style="margin-top: 80px;">
        <div class="col-md-6 text-center">
            <img src="/img/daftar-caretaker_2.png" class="d-block mx-lg-auto img-fluid pt-5" loading="lazy">
        </div>
        <div class="col-md-6">
            <div class="card bg-ffeea8" id="register-card" style="min-height: 640px;">
                <div class="card-body mx-4 mt-4">
                    <form action="#" method="post" id="msform" enctype="multipart/form-data">
                        @csrf
                        <ul id="progressbar2" class="text-center m-0 ps-5">
                            <li class="active" id="pilih_profesi">
                                <p class="width15 text-dark">Pilih Profesi</p>
                            </li>
                            <li class="active" id="isi_formulir_caretaker">
                                <p class="width15 text-dark">Isi Formulir</p>
                            </li>
                            <li class="active" id="isi_area">
                                <p class="width15 text-dark">Isi Area Layanan</p>
                            </li>
                            <li class="active" id="deskripsi_diri">
                                <p class="width15 text-dark">Isi Deskipsi Diri</p>
                            </li>
                            <li class="active" id="upload_dokumen_caretaker">
                                <p class="width15 text-dark">Upload Dokumen</p>
                            </li>
                            <li class="active" id="proses">
                                <p class="width15 text-dark">Tunggu Diproses</p>
                            </li>
                        </ul>
                        <div class="row px-4 pt-4">
                            <p class="display-5 fw-bold m-0">Mohon tunggu.</p>
                            <p class="display-5 fw-bold">Kami akan segera mengirim notifikasi setelah dokumenmu terverifikasi</p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection