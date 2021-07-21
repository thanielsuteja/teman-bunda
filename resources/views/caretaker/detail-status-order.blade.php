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
    </style>

    <div class="container main col-xxl-12 px-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card mb-5" style="border-radius: 20px; overflow: hidden;">
                    <div class="card-header bg-temanbunda pt-4">
                        <div class="row">
                            <div class="col-3"></div>
                            <div class="col-9">
                                <h3 class="fw-bold m-0 mb-2">{{ $jobOffer->judul_pekerjaan }}</h3>
                                <div class="d-flex">
                                    <h5 class="fw-bold m-0 me-3">{{ $jobOffer->User->nama_depan }} {{ $jobOffer->User->nama_belakang }}</h5>
                                    <a href="{{ route('caretaker.review-user', $jobOffer->user_id) }}" class="btn btn-light text-warning py-0 px-3">Lihat Profil</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-md-3 text-center">
                                @if ($jobOffer->User->profile_img_path != null)
                                    <img src="{{ asset($jobOffer->User->profile_img_path) }}" style="border-radius: 50%; object-fit: cover; width: 110px; height: 110px; border: 7px solid #FFE074; margin-top: -75px">
                                @else
                                    <img src="{{ asset('img/no-profile.png') }}" style="border-radius: 50%; object-fit: cover; width: 110px; height: 110px; border: 7px solid #FFE074; margin-top: -75px">
                                @endif
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col">
                                        <div>
                                            @for ($i = 1; $i < 6; $i++)
                                                @if ($jobOffer->User->meanRating >= $i)
                                                    <i class="bi-star-fill" style="color: #FFDE59;"></i>
                                                @elseif (($i - $jobOffer->User->meanRating) >= 1)
                                                    <i class="bi-star" style="color: #FFDE59;"></i>
                                                @elseif (fmod($jobOffer->User->meanRating, 1) != 0)
                                                    <i class="bi-star-half" style="color: #FFDE59;"></i>
                                                @endif
                                            @endfor
                                        </div>
                                        <span class="text-secondary">{{ $jobOffer->User->CountReviewCaretaker }} Ulasan</span>
                                    </div>
                                    <div class="col">
                                        <span class="text-secondary me-1">Order ID</span> {{ $jobOffer->job_id }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <p class="text-secondary text-end m-0 mb-2 me-5">Alamat</p>
                            </div>
                            <div class="col-md-9">
                                <p class="m-0 mb-2">{{ $jobOffer->User->alamat }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <p class="text-secondary text-end m-0 mb-2 me-5">Tanggal bekerja</p>
                            </div>
                            <div class="col-md-9">
                                <p class="m-0 mb-2">{{ date('d/m/Y', strtotime($jobOffer->tanggal_masuk)) }} {{ date('d/m/Y', strtotime($jobOffer->tanggal_berakhir)) }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <p class="text-secondary text-end m-0 mb-2 me-5">Jam kerja</p>
                            </div>
                            <div class="col-md-9">
                                <p class="m-0 mb-2">{{ $jobOffer->jam_masuk }} - {{ $jobOffer->jam_berakhir }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <p class="text-secondary text-end m-0 mb-2 me-5">Hari masuk</p>
                            </div>
                            <div class="col-md-9">
                                <p class="m-0 mb-2">{{ implode(', ', $jobOffer->Days) }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <p class="text-secondary text-end m-0 mb-2 me-5">Estimasi Rupiah</p>
                            </div>
                            <div class="col-md-9">
                                <p class="m-0 mb-2">Rp. {{ number_format($jobOffer->estimasi_biaya, 0, ',', '.') }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <p class="text-secondary text-end m-0 mb-2 me-5">Bersih</p>
                            </div>
                            <div class="col-md-9">
                                <p class="m-0 mb-2">
                                    Rp. {{ number_format($jobOffer->estimasi_biaya * 0.95, 0, ',', '.') }}
                                    <span data-bs-toggle="tooltip" data-bs-placement="right" title="Bersih = Estimasi Rupiah - 5%"><i class="bi bi-info-circle-fill d-inline"></i></span>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <p class="text-secondary text-end m-0 mb-2 me-5">Deskripsi Pekerjaan</p>
                            </div>
                            <div class="col-md-9">
                                <p class="m-0 mb-2">{{ $jobOffer->deskripsi_pekerjaan }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <hr style="background: black; margin-top: 40px; margin-bottom: 25px">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <p class="text-secondary text-end m-0 mb-2 me-5">Email</p>
                            </div>
                            <div class="col-md-9">
                                <p class="m-0 mb-2">{{ $jobOffer->User->email }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <p class="text-secondary text-end m-0 mb-2 me-5">Nomor HP</p>
                            </div>
                            <div class="col-md-9">
                                <p class="m-0 mb-2">{{ $jobOffer->User->nomor_telepon }}</p>
                            </div>
                        </div>
                        <div class="row mt-5 d-flex justify-content-end">
                            @if ($jobOffer->job_status == 'menunggu')
                                <button type="button" class="btn btn-outline-warning btn-lg" style="width: 200px; border: 1px solid #FFDE59; font-weight: bold" data-bs-toggle="modal" data-bs-target="#ubahGajiModal">
                                    Minta Ubah Gaji
                                </button>
                            @elseif ($jobOffer->job_status == 'selesai' && $jobOffer->ReviewCaretaker == null)
                                <a href="{{ route('caretaker.review', $jobOffer->job_id) }}" class="btn btn-primary btn-lg" style="background: #FFDE59; width: 200px; border: 0; font-weight: bold">Beri Ulasan</a>
                            @endif
                            @if ($jobOffer->job_status != 'selesai')
                                <form action="{{ route('caretaker.rejected-status-order', $jobOffer->job_id) }}" class="w-auto" method="post">
                                    @csrf
                                    <input type="submit" value="Tolak" class="btn btn-primary btn-lg" style="background: #FFDE59; width: 200px; border: 0; font-weight: bold">
                                </form>
                                <form action="{{ route('caretaker.approved-status-order', $jobOffer->job_id) }}" class="w-auto" method="post">
                                    @csrf
                                    <input type="submit" value="Terima" class="btn btn-primary btn-lg" style="background: #FFDE59; width: 200px; border: 0; font-weight: bold">
                                </form>
                            @endif
                        </div>
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
                        <form action="{{ route('caretaker.request-salary-status-order', $jobOffer->job_id) }}" method="post">
                            @csrf
                            <div class="mb-3 text-center">
                                <label for="price" class="form-label">Masukkan jumlah gaji yang sudah setujui/kehendaki</label>
                                <input type="number" class="form-control" id="price" name="price" required placeholder="Jumlah Gaji yang diharapkan">
                            </div>
                            <div class="text-end">
                                <button type="button" class="btn btn-outline-warning" data-bs-dismiss="modal" style="width: 150px">Batalkan</button>
                                <button type="submit" class="btn btn-primary" style="background: #FFDE59; border: 0; font-weight: bold; width: 150px">Izinkan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection