@extends('navbar.master')

@section('content')

<main class="container main col-xxl-12 px-0">
    <section class="row flex-lg-row-reverse align-items-center py-5 mb-5">
        <div class="col-10 col-sm-8 col-lg-6">
            <img src="/img/homepage_picture(copy).png" class="d-block mx-lg-auto img-fluid" alt="" width="600" loading="lazy">
        </div>
        <div class="col-lg-6">
            <h1 class="display-5 fw-bold lg-1 mb-3 bodoni">Cara baru dan mudah mencari <i>caretaker</i> dengan cepat</h1>
            <p class="lead">Teman Bunda membantu anda mencari <i>caretaker</i> yang tepat dengan memanfaatkan para anak muda untuk merawat sang hati</p>
            <div class="d-grid d-md-flex justify-content-md-center">
                <a href="#whyus" class="btn btn-default">Menuju tak terbatas</a>
            </div>
        </div>
    </section>
    <section class="px-0 py-5" id="whyus">
        <div class="row w-100 my-md-3 bg-light align-items-center">
            <div class="col-md-4 offset-md-1 rounded-rectangle mx-5 my-5">
                <img src="/img/" class="p-5" height="395" width="380">
            </div>
            <div class="col-md-6">
                <h1 class="display-5 fw-bold bodoni ">Untuk kamu, orang tua yang bekerja</h1>  
                <p class="lead">Teman Bunda menyediakan jasa mengasuh anggota keluargamu agar kamu dapat fokus bekerja tanpa mengkhawatirkan keluargamu</p>
            </div>
        </div>
        <div class="row w-100 my-sm-3 bg-white align-items-center">
            <div class="col-md-6 text-end">
                <h1 class="display-5 fw-bold bodoni">Kredibilitas partner Teman Bunda tidak teragukan lagi</h1>  
                <p class="lead">Untuk keamanan kamu, tim Manajemen Keselamatan Pengguna Teman Bunda dengan teliti memeriksa dokumen pribadi partner Teman Bunda </p>
            </div>
            <div class="col-sm-4 rounded-rectangle-white ms-5 my-5 ps-5">
                <img src="/img/" class="p-5" height="395" width="380">
            </div>
        </div>
        <div class="row w-100 my-md-3 bg-light align-items-center">
            <div class="col-md-4 offset-md-1 rounded-rectangle mx-5 my-5">
                <img src="/img/murah.png" class="p-5" height="395" width="380">
            </div>
            <div class="col-md-6">
                <h1 class="display-5 fw-bold bodoni ">Menghemat anggaran keluarga untuk perawatan anggota keluargamu</h1>  
                <p class="lead">Kamu menghemat banyak dengan tidak mengeluarkan biaya makelar, akomodasi, dan konsumsi untuk menggunakan jasa Teman Bunda</p>
            </div>
        </div>
    </section>
    <section class="container py-5 my-5">
        <h2 class="pt-5 text-center">Seperti ini cara menggunakannya!</h2>
        <nav>
            <div class="nav nav-pills mb-3 justify-content-center bg-white" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-parent-tab" data-bs-toggle="tab" data-bs-target="#nav-parent" type="button" role="tab" aria-controls="nav-parent" aria-selected="true">Untuk Parent</button>
                <button class="nav-link" id="nav-caregiver-tab" data-bs-toggle="tab" data-bs-target="#nav-caregiver" type="button" role="tab" aria-controls="nav-caregiver" aria-selected="false">Untuk Caregiver</button>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-parent" role="tabpanel" aria-labelledby="nav-parent-tab">
                <div class="row g-2 justify-content-center">
                    <div class="col-xl-2">
                        <div class="card bg-light h-100">
                            <div class="card-body text-center">
                                <img src="/img/icon/register.png" class="py-5" alt="" width="80">
                                <a href="/register" class="btn btn-default fw-bold mb-4 px-4">Daftar disini</a>
                                <p>Masukkan data pribadi yang diperlukan untuk menjadi anggota</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2">
                        <div class="card bg-light h-100">
                            <div class="card-body text-center">
                                <img src="/img/icon/verify.png" class="py-5" alt="" width="80">
                                <p class="card-title fw-bold">Mengisi formulir</p>
                                <p>Mengisi hari, waktu, lokasi dan metode perawatan yang Anda inginkan dalam seminggu</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2">
                        <div class="card bg-light h-100">
                            <div class="card-body text-center">
                                <img src="/img/icon/find.png" class="py-5" alt="" width="80">
                                <p class="card-title fw-bold">Mencari Teman Bunda</p>
                                <p>Carilah berdasarkan lokasi Anda, pilihlah Caretakers yang cocok dan kirimlah notifikasi!</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2">
                        <div class="card bg-light h-100">
                            <div class="card-body text-center">
                                <img src="/img/icon/interview.png" class="py-5" alt="" width="80">
                                <p class="card-title fw-bold">Wawancara dan Mempekerjakan</p>
                                <p>Setelah Anda mengirim notifikasi, lakukanlah wawancara sebelum memperkerjakan Teman Bunda</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2">
                        <div class="card bg-light h-100">
                            <div class="card-body text-center">
                                <img src="/img/icon/review.png" class="py-5" alt="" width="80">
                                <p class="card-title fw-bold">Memberi Ulasan</p>
                                <p>Berilah ulasan terhadap Caretakers yang sudah membantu Anda! Ulasan akan muncul di profil Bunda</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-caregiver" role="tabpanel" aria-labelledby="nav-profile-tab">
                <div class="row g-2 justify-content-center">
                    <div class="col-xl-2">
                        <div class="card bg-light h-100">
                            <div class="card-body text-center">
                                <img src="/img/icon/register.png" class="py-5" alt="" width="80">
                                <a href="/register" class="btn btn-default fw-bold mb-4 px-4">Daftar disini</a>
                                <p>Masukkan data pribadi yang diperlukan untuk menjadi anggota</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2">
                        <div class="card bg-light h-100">
                            <div class="card-body text-center">
                                <img src="/img/icon/verify.png" class="py-5" alt="" width="80">
                                <p class="card-title fw-bold">lorem lorem</p>
                                <p>lorem lorem lorem loremlorem lorem lorem loremlorem lorem lorem loremlorem lorem lorem lorem</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2">
                        <div class="card bg-light h-100">
                            <div class="card-body text-center">
                                <img src="/img/icon/find.png" class="py-5" alt="" width="80">
                                <p class="card-title fw-bold">Tunggu penawaran kerja</p>
                                <p>lorem lorem lorem loremlorem lorem lorem loremlorem lorem lorem loremlorem lorem lorem lorem</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2">
                        <div class="card bg-light h-100">
                            <div class="card-body text-center">
                                <img src="/img/icon/interview.png" class="py-5" alt="" width="80">
                                <p class="card-title fw-bold">lorem lorem</p>
                                <p>lorem lorem lorem loremlorem lorem lorem loremlorem lorem lorem loremlorem lorem lorem lorem</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2">
                        <div class="card bg-light h-100">
                            <div class="card-body text-center">
                                <img src="/img/icon/review.png" class="py-5" alt="" width="80">
                                <p class="card-title fw-bold">lorem lorem</p>
                                <p>lorem lorem lorem loremlorem lorem lorem loremlorem lorem lorem loremlorem lorem lorem lorem</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@endsection