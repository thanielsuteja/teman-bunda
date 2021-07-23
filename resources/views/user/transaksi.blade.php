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
        margin-bottom: 0.3rem;
    }
</style>
<div class="container col-xxl-12 px-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card mb-2 shadow" style="border-radius: 20px; overflow: hidden; margin-top: 90px;">
                <div class="card-header row bg-temanbunda p-0 align-items-center" style="height: 107px;">
                    <h2 class="m-0 ms-5">Riwayat Transaksi</h2>
                </div>
                <div class="card-body" style="min-height: 532px;">
                    @foreach ($job as $job)
                    <a href="/user/info-transaksi/{{$job->Transaction->transaction_id}}" class="text-decoration-none" style="color: black;">
                        <div class="card border-2 mx-5 my-3 zoom" style="background-color: #f3f3f3; border-radius: 10px; overflow: hidden;">
                            <div class="card-header d-flex align-items-center p-0" style="background-color: #ffeea8;">
                                <div class="col-sm-10 border-end border-5 border-white">
                                    <h4 class="my-2 ps-4">{{ $job->judul_pekerjaan }}</h4>
                                </div>
                                <div class="col-sm-2 text-center p-0">
                                    @if ($job->Transaction->transaction_status == "menunggu")
                                    <p class="text-808080 fw-bold" style="font-size: 17px; margin: 0;">{{ ucfirst($job->Transaction->transaction_status) }}</p>
                                    @elseif ($job->Transaction->transaction_status == "terbayar")
                                    <p class="fw-bold" style="color: #0063BE; font-size: 17px; margin: 0;">{{ ucfirst($job->Transaction->transaction_status) }}</p>
                                    @elseif ($job->Transaction->transaction_status == "terverifikasi")
                                    <p class="fw-bold" style=" color: #0EAD00; font-size: 17px; margin: 0;">{{ ucfirst($job->Transaction->transaction_status) }}</p>
                                    @else
                                    <p class="fw-bold text-danger" style="font-size: 17px; margin: 0;">{{ ucfirst($job->Transaction->transaction_status) }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3 px-2 text-center">
                                        @if ($job->Caretaker->User->profile_img_path != null)
                                        <img src="{{ asset('storage/foto_profil/'.$job->Caretaker->User->profile_img_path) }}" class="profile-pic-md border">
                                        @else
                                        <img src="{{ asset('img/no-profile.png') }}" class="profile-pic-md border">
                                        @endif
                                    </div>
                                    <div class="col-md-9">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p class="text-808080">Nomor transaksi</p>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ $job->Transaction->transaction_id }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p class="text-808080">Nama Caregiver</p>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ $job->Caretaker->User->nama_depan }} {{ $job->Caretaker->User->nama_belakang }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            @if ($job->transaction_status == "menunggu")
                                            <div class="col-md-6">
                                                <p class="text-808080">Bayar sebelum</p>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ $job->Transaction->transaction_due }}</p>
                                            </div>
                                            @else
                                            <div class="col-md-6">
                                                <p class="text-808080">Waktu pembayaran</p>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ $job->Transaction->payment_date }}</p>
                                            </div>
                                            @endif
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p class="text-808080">Jumlah yang dibayar</p>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Rp{{ number_format($job->Transaction->transaction_amount, 2, ",", ".") }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection