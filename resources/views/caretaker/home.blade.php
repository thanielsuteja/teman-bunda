@extends ('layout.master')
@section ('title', 'Home | Teman Bunda')
@include ('layout.navbar.navbar-caretaker')
@include ('layout.sidebar.sidebar-caretaker')

@section ('content')

<style>
    .content {
        padding-left: 70px;
        z-index: -1;
    }
</style>

<div class="content">

    <main class="container main col-xxl-12 px-0">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('/img/KakaoTa.jpg') }}" class="d-block w-100" style="width: 1280px; height: 548.57px;" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('/img/login.png') }}" class="d-block w-100" style="width: 1280px; height: 548.57px;" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <section class="container py-5 my-5 bg-white">
            <h2 class="pt-5 text-center">Bagaimana cara penggunaannya?</h2>
            <div class="row gx-3 bg-white justify-content-center mx-5">
                <div class="col-sm">
                    <div class="card bg-efefef h-100" style="border-radius: 15px;">
                        <div class="card-body text-center">
                            <img src="/img/icon/find.png" class="py-5" alt="" width="80">
                            <div class="mb-2" style="min-height: 50px;">
                                <p class="card-title fw-bold">Tunggu Penawaran Kerja</p>
                            </div>
                            <p>Kamu cukup diam dan tunggu penawaran dari Parent masuk ke notifikasimu.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="card bg-efefef h-100" style="border-radius: 15px;">
                        <div class="card-body text-center">
                            <img src="/img/icon/verify.png" class="py-5" alt="" width="80">
                            <div class="mb-2" style="min-height: 50px;">
                                <p class="card-title fw-bold">Ikuti Wawancara dan Bekerja</p>
                            </div>
                            <p>Hubungi dan ikuti wawancara Parent sebelum kamu mulai bekerja</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="card bg-efefef h-100" style="border-radius: 15px;">
                        <div class="card-body text-center">
                            <img src="/img/icon/interview.png" class="py-5" alt="" width="80">
                            <div class="mb-2" style="min-height: 50px;">
                                <p class="card-title fw-bold">Beri Ulasan dan Penilaian</p>
                            </div>
                            <p>Beri ulasan dan penilaian kepada Parent agar pengguna lainnya bisa mengetahui nilai Parent</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>


@endsection