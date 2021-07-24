@extends('layout.master-footer')
@include('layout.navbar.navbar')

@section('content')

<main class="container main col-xxl-12 px-0">
    <section class="row flex-lg-row-reverse align-items-center py-5 mb-5">
        <div class="col-10 col-sm-8 col-lg-6">
            <img src="{{ asset('/img/homepage_picture(copy).png') }}" class="d-block mx-lg-auto img-fluid" alt="" width="600" loading="lazy">
        </div>
        <div class="col-lg-6">
            <h1 class="display-5 lg-1 mb-3">Cara baru dan mudah mencari <i>caregiver</i> dengan cepat</h1>
            <p class="lead">Teman Bunda membantu anda mencari Caregiver yang tepat dengan memanfaatkan para anak muda untuk merawat sang hati</p>
            <div class="d-grid d-md-flex justify-content-md-start">
                <a href="#whyus" class="btn bg-temanbunda py-3 px-5" style="font-size: 20px;">Lebih lanjut</a>
            </div>
        </div>
    </section>
    <section class="px-0 py-5" id="whyus">
        <div class="row w-100 my-md-3 bg-light align-items-center p-5">
            <div class="col-md-5 rounded-rectangle">
                <img src="{{ asset('img/employee.png') }}" class="" height="395" width="380">
            </div>
            <div class="col-md-7 ms-5">
                <h1 class="display-5 ">Untuk kamu, orang tua yang bekerja</h1>
                <p class="lead">Teman Bunda menyediakan pengasuh untuk anggota keluargamu agar kamu dapat fokus bekerja tanpa mengkhawatirkan keluargamu</p>
            </div>
        </div>
        <div class="row w-100 my-sm-3 bg-white align-items-center">
            <div class="col-md-7 text-end ps-2">
                <h1 class="display-5">Kredibilitas mitra Teman Bunda tidak teragukan lagi</h1>
                <p class="lead">Untuk keamanan kamu, tim Manajemen Keselamatan Pengguna Teman Bunda dengan teliti memeriksa dokumen pribadi mitra Teman Bunda </p>
            </div>
            <div class="col-md-5 rounded-rectangle-white ms-5 my-5 ps-5 bg-light">
                <img src="{{ asset('img/documents.png') }}" class="p-5" height="395" width="380">
            </div>
        </div>
        <div class="row w-100 my-md-3 bg-light align-items-center p-5">
            <div class="col-md-5 rounded-rectangle">
                <img src="{{ asset('img/reduction.png') }}" class="p-5" height="395" width="380">
            </div>
            <div class="col-md-7 ms-5">
                <h1 class="display-5 ">Menghemat anggaran keluarga untuk perawatan anggota keluargamu</h1>
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
                <div class="row gx-3 justify-content-center mx-4">
                    <div class="col-sm">
                        <div class="card bg-efefef h-100" style="border-radius: 15px;">
                            <div class="card-body text-center">
                                <img src="/img/icon/register.png" class="py-5" alt="" width="80">
                                <div class="mb-2" style="min-height: 50px;">
                                    <a href="/register" class="btn bg-temanbunda fw-bold px-4" style="width: 140px;">Daftar</a>
                                </div>
                                <p>Masukkan data pribadimu yang diperlukan untuk menjadi anggota</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="card bg-efefef h-100" style="border-radius: 15px;">
                            <div class="card-body text-center">
                                <img src="/img/icon/find.png" class="py-5" alt="" width="80">
                                <div class="mb-2" style="min-height: 50px;">
                                    <p class="card-title fw-bold">Cari Teman Bunda</p>
                                </div>
                                <p>Pilih Caregiver yang cocok serta dapat bekerja di lokasimu</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="card bg-efefef h-100" style="border-radius: 15px;">
                            <div class="card-body text-center">
                                <img src="/img/icon/verify.png" class="py-5" alt="" width="80">
                                <div class="mb-2" style="min-height: 50px;">
                                    <p class="card-title fw-bold">Isi Formulir Penawaran Kerja</p>
                                </div>
                                <p>Isi deskripsi pekerjaan, tanggal, waktu, dan estimasi gaji yang ingin kamu tawarkan</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="card bg-efefef h-100" style="border-radius: 15px;">
                            <div class="card-body text-center">
                                <img src="/img/icon/interview.png" class="py-5" alt="" width="80">
                                <div class="mb-2" style="min-height: 50px;">
                                    <p class="card-title fw-bold">Wawancara dan Pekerjakan</p>
                                </div>
                                <p>Caregiver pilihanmu akan menghubungi dan lakukanlah tanya jawab sebelum memperkerjakan</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="card bg-efefef h-100" style="border-radius: 15px;">
                            <div class="card-body text-center">
                                <img src="/img/icon/review.png" class="py-5" alt="" width="80">
                                <div class="mb-2" style="min-height: 50px;">
                                    <p class="card-title fw-bold">Beri Ulasan dan Penilaian</p>
                                </div>
                                <p>Beri ulasan dan penilaian pada Caregiver yang sudah membantumu</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-caregiver" role="tabpanel" aria-labelledby="nav-profile-tab">
                <div class="row gx-3 justify-content-center mx-4">
                    <div class="col-sm">
                        <div class="card bg-efefef h-100" style="border-radius: 15px;">
                            <div class="card-body text-center">
                                <img src="/img/icon/register.png" class="py-5" alt="" width="80">
                                <div class="mb-2" style="min-height: 50px;">
                                    <p class="card-title fw-bold">Ajukan Permohonan Menjadi Caregiver</p>
                                </div>
                                <p>Ajukan data serta dokumen pribadimu dan tunggu konfirmasi setelah kamu terdaftar sebagai pengguna</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="card bg-efefef h-100" style="border-radius: 15px;">
                            <div class="card-body text-center">
                                <img src="/img/icon/alarm.png" class="py-5" alt="" width="80">
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
                                <img src="/img/icon/interview.png" class="py-5" alt="" width="80">
                                <div class="mb-2" style="min-height: 50px;">
                                    <p class="card-title fw-bold">Ikuti Wawancara dengan Parent</p>
                                </div>
                                <p>Hubungi dan ikuti wawancara Parent sebelum kamu mulai bekerja</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="card bg-efefef h-100" style="border-radius: 15px;">
                            <div class="card-body text-center">
                                <img src="/img/icon/health.png" class="py-5" alt="" width="80">
                                <div class="mb-2" style="min-height: 50px;">
                                    <p class="card-title fw-bold">Datang dan Bekerja</p>
                                </div>
                                <p>Bekerja sesuai dengan deskripsi pekerjaan dan berikan kesan yang baik</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="card bg-efefef h-100" style="border-radius: 15px;">
                            <div class="card-body text-center">
                                <img src="/img/icon/review.png" class="py-5" alt="" width="80">
                                <div class="mb-2" style="min-height: 50px;">
                                    <p class="card-title fw-bold">Beri Ulasan dan Penilaian</p>
                                </div>
                                <p>Beri ulasan dan penilaian kepada Parent agar pengguna lainnya bisa mengetahui nilai Parent</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@endsection