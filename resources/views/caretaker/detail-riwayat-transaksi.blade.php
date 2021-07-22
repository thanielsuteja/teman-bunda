@extends ('layout.master')
@section ('title','Detail Riwayat Transaksi | Teman Bunda')
@include ('layout.navbar.navbar-caretaker')
@include ('layout.sidebar.sidebar-caretaker')

@section ('content')
<style>
    body {
        background-color: #efefef;
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
                            <h3 class="fw-bold m-0 mb-2">{{ $transaction->JobOffer->judul_pekerjaan }}</h3>
                            <div class="d-flex">
                                <h5 class="fw-bold m-0 me-3">{{ $transaction->JobOffer->User->nama_depan }} {{ $transaction->JobOffer->User->nama_belakang }}</h5>
                                <a href="{{ route('caretaker.profil-user', $transaction->jobOffer->user_id) }}" class="btn btn-light text-warning py-0 px-3">Lihat Profil</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-3 text-center">
                            @if ($transaction->JobOffer->User->profile_img_path != null)
                            <img src="{{ asset($transaction->JobOffer->User->profile_img_path) }}" style="border-radius: 50%; object-fit: cover; width: 110px; height: 110px; border: 7px solid #FFE074; margin-top: -75px">
                            @else
                            <img src="{{ asset('img/no-profile.png') }}" style="border-radius: 50%; object-fit: cover; width: 110px; height: 110px; border: 7px solid #FFE074; margin-top: -75px">
                            @endif
                        </div>
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col">
                                    <div>
                                        @for ($i = 1; $i < 6; $i++) @if ($transaction->JobOffer->User->meanRating >= $i)
                                            <i class="bi-star-fill" style="color: #FFDE59;"></i>
                                            @elseif (($i - $transaction->JobOffer->User->meanRating) >= 1)
                                            <i class="bi-star" style="color: #FFDE59;"></i>
                                            @elseif (fmod($transaction->JobOffer->User->meanRating, 1) != 0)
                                            <i class="bi-star-half" style="color: #FFDE59;"></i>
                                            @endif
                                            @endfor
                                    </div>
                                    <span class="text-secondary">{{ $transaction->JobOffer->User->CountReviewCaretaker }} Ulasan</span>
                                </div>
                                <div class="col">
                                    <span class="text-secondary me-1">Nomor transaksi</span> {{ $transaction->transaction_id }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <p class="text-secondary text-end m-0 mb-2 me-5">ID</p>
                        </div>
                        <div class="col-md-9">
                            <p class="m-0 mb-2">{{ $transaction->JobOffer->job_id }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <p class="text-secondary text-end m-0 mb-2 me-5">Alamat</p>
                        </div>
                        <div class="col-md-9">
                            <p class="m-0 mb-2">{{ $transaction->JobOffer->User->alamat }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <p class="text-secondary text-end m-0 mb-2 me-5">Tanggal bekerja</p>
                        </div>
                        <div class="col-md-9">
                            <p class="m-0 mb-2">{{ date('d/m/Y', strtotime($transaction->JobOffer->tanggal_masuk)) }} {{ date('d/m/Y', strtotime($transaction->JobOffer->tanggal_berakhir)) }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <p class="text-secondary text-end m-0 mb-2 me-5">Jam kerja</p>
                        </div>
                        <div class="col-md-9">
                            <p class="m-0 mb-2">{{ $transaction->JobOffer->jam_masuk }} - {{ $transaction->JobOffer->jam_berakhir }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <p class="text-secondary text-end m-0 mb-2 me-5">Hari masuk</p>
                        </div>
                        <div class="col-md-9">
                            <p class="m-0 mb-2">{{ implode(', ', $transaction->JobOffer->Days) }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <p class="text-secondary text-end m-0 mb-2 me-5">Deskripsi Pekerjaan</p>
                        </div>
                        <div class="col-md-9">
                            <p class="m-0 mb-2">{{ $transaction->JobOffer->deskripsi_pekerjaan }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <hr style="background: black; margin-top: 40px; margin-bottom: 25px">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <p class="text-secondary text-end m-0 mb-2 me-5">Total Upah</p>
                        </div>
                        <div class="col-md-9">
                            <p class="m-0 mb-2">Rp{{ number_format($transaction->transaction_amount, 2, ',', '.') }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <p class="text-secondary text-end m-0 mb-4 me-5">Upah Diterima</p>
                        </div>
                        <div class="col-md-9">
                            <p class="m-0 mb-2">
                                Rp{{ number_format($transaction->transaction_amount*0.95, 2, ',', '.') }}
                                <span data-bs-toggle="tooltip" data-bs-placement="right" title="Teman Bunda mengambil sebanyak lima persen dari penghasilanmu untuk mengembangkan Teman Bunda lebih lanjut"><i class="bi bi-info-circle-fill d-inline"></i></span>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <p class="text-secondary text-end m-0 mb-2 me-5">Status</p>
                        </div>
                        <div class="col-md-9">
                            <p class="m-0 mb-2">{{ ucwords($transaction->transaction_status) }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection