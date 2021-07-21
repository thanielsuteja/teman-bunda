@extends ('layout.master')
@section ('title', 'Riwayat Transaksi | Teman Bunda')
@include ('layout.navbar.navbar-user')
@include ('layout.sidebar.sidebar-user')

@section ('content')
<style>
    body {
        background-color: #efefef;
    }

    p {
        font-size: 16px;
        margin-bottom: 0.3rem;
    }
</style>

<div class="container col-xxl-12 px-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card shadow" style="border-radius: 20px; overflow: hidden; margin-top: 90px;">
                <div class="card-header bg-temanbunda p-0 d-flex align-items-center" style="height: 120px;">
                    <div class="row">
                        <div class="col-1 d-flex align-items-center">
                            <a href="{{ url()->previous() }}" class="text-decoration-none fw-bold" style="color: black;">
                                <i class="bi bi-chevron-left ps-3" style="font-size: 36px; height: 36; width: 36;"></i>
                            </a>
                        </div>
                        <div class="col">
                            <h2 class="m-0 ms-5">Riwayat Transaksi</h2>
                        </div>
                    </div>
                </div>
                <div class="card-body mx-5" style="min-height: 532px;">
                    <div class="row px-4" style="margin-top: -50px;">
                        <div class="col-9">
                            <div class="row">
                                <h5>{{ $transaction->JobOffer->Caretaker->User->nama_depan }} {{ $transaction->JobOffer->Caretaker->User->nama_belakang }} <a href="/user/info-caregiver/{{ $transaction->JobOffer->Caretaker->caretaker_id }}" class="btn bg-white d-inline-block pt-1" style="color: #ffde59; border-color: #ffde59; height: 30px;">Lihat profil</a></h5>
                            </div>
                            <div class="row">
                                <div class="col-3 text-center">
                                    @for ($i = 1; $i < 6; $i++) @if ($transaction->JobOffer->Caretaker->meanRating >= $i)
                                        <i class="bi-star-fill" style="color: #FFDE59; font-size: 12px;"></i>
                                        @elseif (($i - $transaction->JobOffer->Caretaker->meanRating) >= 1)
                                        <i class="bi-star" style="color: #FFDE59; font-size: 12px;"></i>
                                        @elseif (fmod($transaction->JobOffer->Caretaker->meanRating, 1) != 0)
                                        <i class="bi-star-half" style="color: #FFDE59; font-size: 12px;"></i>
                                        @endif
                                        @endfor
                                        <p style="font-size: 16px;">
                                            {{ $transaction->JobOffer->Caretaker->JobOffers->reduce(function ($total, $jobOffer) {
                                            return $total + ($jobOffer->ReviewUser == null ? 0 : 1);
                                        }) }} ulasan
                                        </p>
                                </div>
                                <div class="row col-9 d-flex align-items-center">
                                    <div class="col-5 pe-0">
                                        <p class="text-808080">Nomor Transaksi</p>
                                    </div>
                                    <div class="col">
                                        <p class="text-dark">{{ $transaction->transaction_id }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3" style="margin-top: -40px;">
                            @if ($transaction->JobOffer->Caretaker->User->profile_img_path != null)
                            <img src="{{ asset('storage/foto_profil/'.$transaction->JobOffer->Caretaker->User->profile_img_path) }}" class="profile-pic-lg border">
                            @else
                            <img src="{{ asset('img/no-profile.png') }}" class="profile-pic-lg border">
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        @if ($transaction->transaction_status == "menunggu")
                        <div class="col-md-3">
                            <p class="text-808080 text-end">Bayar sebelum</p>
                        </div>
                        <div class="col-md-9">
                            <p>{{ $transaction->transaction_due }}</p>
                        </div>
                        @else
                        <div class="col-md-3">
                            <p class="text-808080 text-end">Waktu pembayaran</p>
                        </div>
                        <div class="col-md-9">
                            <p>{{ $transaction->payment_date }}</p>
                        </div>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <p class="text-808080 text-end">Jumlah dibayar</p>
                        </div>
                        <div class="col-md-9">
                            <p>Rp{{ number_format($transaction->JobOffer->transaction_amount,0,",",".") }},00</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <p class="text-808080 text-end">Kode bank</p>
                        </div>
                        <div class="col-md-9">
                            <p>999</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <p class="text-808080 text-end">Virtual Account</p>
                        </div>
                        <div class="col-md-9">
                            <p>{{ $transaction->JobOffer->User->virtual_account }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <p class="text-808080 text-end">Status</p>
                        </div>
                        <div class="col-md-9">
                            <p>{{ ucfirst($transaction->transaction_status) }}</p>
                        </div>
                    </div>
                    <hr class="mb-0">
                    @if ($transaction->transaction_status == "menunggu")
                    <p class="text-danger text-center m-0" style="font-size: 14px;">Pesanan kamu otomatis dibatalkan apabila kamu tidak membayar sebelum waktu yang ditentukan</p>
                    @endif
                    <div class="row pt-3">
                        <div class="col-md-3">
                            <p class="text-808080 text-end">Nomor order</p>
                        </div>
                        <div class="col-md-9">
                            <p>{{ $transaction->JobOffer->job_id }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <p class="text-808080 text-end">Alamat</p>
                        </div>
                        <div class="col-md-9">
                            <p>{{ $transaction->JobOffer->User->alamat }}, {{ $transaction->JobOffer->User->kelurahan }}, {{ $transaction->JobOffer->User->kecamatan }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <p class="text-808080 text-end">Tanggal bekerja</p>
                        </div>
                        <div class="col-md-9">
                            <p>{{ date('d-m-Y', strtotime($transaction->JobOffer->tanggal_masuk)) }} - {{ date('d-m-Y', strtotime($transaction->JobOffer->tanggal_berakhir)) }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <p class="text-808080 text-end">Jam kerja</p>
                        </div>
                        <div class="col-md-9">
                            <p>{{ $transaction->JobOffer->jam_masuk }} - {{ $transaction->JobOffer->jam_berakhir }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <p class="text-808080 text-end">Hari masuk</p>
                        </div>
                        <div class="col-md-9">
                            <p>
                                @if ($transaction->JobOffer->wd_1 == 1)
                                Senin
                                @endif
                                @if ($transaction->JobOffer->wd_2 == 1)
                                Selasa
                                @endif
                                @if ($transaction->JobOffer->wd_3 == 1)
                                Rabu
                                @endif
                                @if ($transaction->JobOffer->wd_4 == 1)
                                Kamis
                                @endif
                                @if ($transaction->JobOffer->wd_5 == 1)
                                Jumat
                                @endif
                                @if ($transaction->JobOffer->wd_6 == 1)
                                Sabtu
                                @endif
                                @if ($transaction->JobOffer->wd_7 == 1)
                                Minggu
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <p class="text-808080 text-end">Deskripsi pekerjaan</p>
                        </div>
                        <div class="col-md-9">
                            <p>{{ $transaction->JobOffer->deskripsi_pekerjaan }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection