@extends ('layout.master')
@section ('title','Detail Status Order | Teman Bunda')
@include ('layout.navbar.navbar-caretaker')
@include ('layout.sidebar.sidebar-caretaker')

@section ('content')
<style>
    body {
        background-color: #efefef;
    }

    .btn-outline-warning {
        color: #FFDE59;
    }

    .btn-outline-warning:hover {
        color: black;
        background: #FFDE59;
    }

    p {
        margin-bottom: 0.5rem;
    }
</style>

<div class="container col-xxl-12 px-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card mb-2 shadow" style="border-radius: 20px; overflow: hidden; margin-top: 90px;">
                <div class="card-header bg-temanbunda d-flex align-items-center p-0" style="height: 120px;">
                    <div class="row">
                        <div class="col-1 d-flex align-items-center">
                            <a href="{{ url()->previous() }}" class="text-decoration-none fw-bold" style="color: black;">
                                <i class="bi bi-chevron-left ps-3" style="font-size: 36px; height: 36; width: 36;"></i>
                            </a>
                        </div>
                        <div class="col">
                            <h2 class="m-0 ms-5">{{ $jobOffer->judul_pekerjaan }}</h2>
                        </div>
                    </div>
                </div>
                <div class="card-body mx-5" style="min-height: 532px;">
                    <div class="row px-4" style="margin-top: -50px;">
                        <div class="col-9">
                            <div class="row">
                                <h5>{{ $jobOffer->User->nama_depan }} {{ $jobOffer->User->nama_belakang }} <a href="{{ route('caretaker.profil-user', $jobOffer->user_id) }}" class="btn bg-white d-inline-block pt-1" style="color: #ffde59; border-color: #ffde59; height: 30px;">Lihat profil</a></h5>
                            </div>
                            <div class="row">
                                <div class="col-4 text-center">
                                    @for ($i = 1; $i < 6; $i++) @if ($jobOffer->User->meanRating >= $i)
                                        <i class="bi-star-fill" style="color: #FFDE59; font-size: 12px;"></i>
                                        @elseif (($i - $jobOffer->User->meanRating) >= 1)
                                        <i class="bi-star" style="color: #FFDE59; font-size: 12px;"></i>
                                        @elseif (fmod($jobOffer->User->meanRating, 1) != 0)
                                        <i class="bi-star-half" style="color: #FFDE59; font-size: 12px;"></i>
                                        @endif
                                        @endfor
                                        <p style="font-size: 16px;">
                                            {{ $jobOffer->User->CountReviewCaretaker }} ulasan
                                        </p>
                                </div>
                                <div class="row col-8 d-flex align-items-center">
                                    <div class="col-auto p-0">
                                        <p class="text-808080">Nomor Order</p>
                                    </div>
                                    <div class="col-auto">
                                        <p class="text-dark">{{ $jobOffer->job_id }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3" style="margin-top: -40px;">
                            @if ($jobOffer->User->profile_img_path != null)
                            <img src="{{ asset('storage/foto_profil/'.$jobOffer->User->profile_img_path) }}" class="profile-pic-lg border">
                            @else
                            <img src="{{ asset('img/no-profile.png') }}" class="profile-pic-lg border">
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <p class="text-808080 text-end">Alamat</p>
                        </div>
                        <div class="col-md-9">
                            <p class="m-0 mb-2">{{ $jobOffer->User->alamat }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <p class="text-808080 text-end">Tanggal bekerja</p>
                        </div>
                        <div class="col-md-9">
                            <p class="m-0 mb-2">{{ date('d/m/Y', strtotime($jobOffer->tanggal_masuk)) }} - {{ date('d/m/Y', strtotime($jobOffer->tanggal_berakhir)) }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <p class="text-808080 text-end">Jam kerja</p>
                        </div>
                        <div class="col-md-9">
                            <p class="m-0 mb-2">{{ $jobOffer->jam_masuk }} - {{ $jobOffer->jam_berakhir }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <p class="text-808080 text-end">Hari masuk</p>
                        </div>
                        <div class="col-md-9">
                            <p class="m-0 mb-2">{{ implode(', ', $jobOffer->Days) }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <p class="text-808080 text-end">Estimasi Rupiah</p>
                        </div>
                        <div class="col-md-9">
                            <p class="m-0 mb-2">Rp{{ number_format($jobOffer->estimasi_biaya, 2, ',', '.') }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <p class="text-808080 text-end">Bersih</p>
                        </div>
                        <div class="col-md-9">
                            <p class="m-0 mb-2">
                                Rp{{ number_format($jobOffer->estimasi_biaya * 0.95, 2, ',', '.') }}
                                <span data-bs-toggle="tooltip" data-bs-placement="right" title="Teman Bunda mengambil sebanyak lima persen dari penghasilanmu untuk mengembangkan Teman Bunda lebih lanjut"><i class="bi bi-info-circle-fill d-inline"></i></span>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <p class="text-808080 text-end">Deskripsi Pekerjaan</p>
                        </div>
                        <div class="col-md-9">
                            <p class="m-0 mb-2">{{ $jobOffer->deskripsi_pekerjaan }}</p>
                        </div>
                    </div>
                    <hr class="mb-0">
                    <p class="text-808080 mb-3" style="font-size: 12px;">Pastikan untuk menghubungi Parent terlebih dahulu sebelum menerima, menolak order, atau meminta
                        perubahan gaji</p>
                    <div class="row">
                        <div class="col-md-3">
                            <p class="text-808080 text-end">Email</p>
                        </div>
                        <div class="col-md-9">
                            <p class="m-0 mb-2">{{ $jobOffer->User->email }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <p class="text-808080 text-end">Nomor HP</p>
                        </div>
                        <div class="col-md-9">
                            <p class="m-0 mb-2">{{ $jobOffer->User->nomor_telepon }}</p>
                        </div>
                    </div>

                    @if ($jobOffer->job_status != 'batal' || $jobOffer->job_status != 'ditolak' || $jobOffer->job_status != 'diterima')
                    <div class="row mt-5 d-flex justify-content-end">
                        @if ($jobOffer->job_status == 'menunggu')
                        <form action="{{ route('caretaker.rejected-order', $jobOffer->job_id) }}" class="w-auto" method="post">
                            @csrf
                            <input type="submit" value="Tolak" class="btn fw-bold" style="width: 180px; height: 58px; border: 1px solid #ffde59; color: #ffde59;">
                        </form>
                        <button type="button" class="btn bg-temanbunda ms-3 fw-bold" style="width: 180px; height: 58px;" data-bs-toggle="modal" data-bs-target="#ubahGajiModal">
                            Minta Ubah Gaji
                        </button>
                        <form action="{{ route('caretaker.approved-order', $jobOffer->job_id) }}" class="w-auto" method="post">
                            @csrf
                            <input type="submit" value="Terima" class="btn bg-temanbunda ms-3 fw-bold" style="width: 180px; height: 58px;">
                        </form>
                        @elseif ($jobOffer->job_status == "ubah gaji")
                        <button type="button" class="btn fw-bold" style="width: 180px; height: 58px; border: 1px solid #ffde59; color: #ffde59;" disabled>Tolak</button>
                        <button type="button" class="btn bg-temanbunda ms-3 fw-bold" style="width: 180px; height: 58px;" disabled>Terima</button>
                        @elseif ($jobOffer->job_status == 'selesai' && $jobOffer->ReviewCaretaker == null)
                        <a href="{{ route('caretaker.review', $jobOffer->job_id) }}" class="btn bg-temanbunda ms-3 fw-bold py-3" style="width: 180px; height: 58px;">Beri Ulasan</a>
                        @endif
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@if ($jobOffer->job_status == 'menunggu')
<div class="modal fade" id="ubahGajiModal" tabindex="-1" aria-labelledby="ubahGajiModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background: #FFDE59">
                <h5 class="modal-title" id="ubahGajiModalLabel">Meminta perubahan jumlah gaji</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('caretaker.request-salary-order', $jobOffer->job_id) }}" method="post">
                    @csrf
                    <div class="mb-3 text-center">
                        <label for="price" class="form-label">Masukkan jumlah gaji yang sudah setujui/kehendaki</label>
                        <input type="number" class="form-control" id="price" name="price" required placeholder="Jumlah Gaji yang diharapkan">
                    </div>
                    <div class="text-end">
                        <button type="button" class="btn btn-outline-warning" data-bs-dismiss="modal" style="width: 150px">Kembali</button>
                        <button type="submit" class="btn btn-primary" style="background: #FFDE59; border: 0; font-weight: bold; width: 150px">Ajukan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endif
@endsection