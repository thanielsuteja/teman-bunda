@extends ('layout.master')
@section ('title','Riwayat Transaksi | Teman Bunda')
@include ('layout.navbar.navbar-caretaker')
@include ('layout.sidebar.sidebar-caretaker')

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
                <div class="card-header bg-temanbunda row align-items-center" style="height: 107px;">
                    <h2 class="m-0 ms-5">Riwayat Transaksi</h2>
                </div>
                <div class="card-body" style="min-height: 532px;">
                    @foreach ($job as $job)
                    <a href="{{ route('caretaker.detail-riwayat-transaksi', $job->Transaction->transaction_id) }}" class="text-decoration-none" style="color: black;">

                        <div class="card border-2 mx-5 my-3 zoom" style="background-color: #f3f3f3; border-radius: 10px; overflow: hidden;">
                            <div class="card-header d-flex align-items-center p-0" style="background: #FFEEA8;">
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
                                    @endif
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3 px-2 text-center">
                                        @if ($job->User->profile_img_path != null)
                                        <img src="{{ asset('storage/foto_profil/'.$job->User->profile_img_path) }}" style="border-radius: 50%; object-fit: cover; width: 110px; height: 110px; border: 7px solid #FFE074">
                                        @else
                                        <img src="{{ asset('img/no-profile.png') }}" style="border-radius: 50%; object-fit: cover; width: 110px; height: 110px; border: 7px solid #FFE074">
                                        @endif
                                    </div>
                                    <div class="col-md-9">
                                        <div class="row">
                                            <div class="col">
                                                <p class="m-0 text-808080">Nomor transaksi</p>
                                            </div>
                                            <div class="col">
                                                <p class="m-0">{{ $job->Transaction->transaction_id }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <p class="m-0 text-808080">Order ID</p>
                                            </div>
                                            <div class="col">
                                                <p class="m-0">{{ $job->job_id }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <p class="m-0 text-808080">Oleh</p>
                                            </div>
                                            <div class="col">
                                                <p class="m-0">{{ $job->User->nama_depan }} {{ $job->User->nama_belakang }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <p class="m-0 text-808080">Tanggal kerja</p>
                                            </div>
                                            <div class="col">
                                                <p class="m-0">{{ date('d/m/Y', strtotime($job->tanggal_masuk)) }} - {{ date('d/m/Y', strtotime($job->tanggal_berakhir)) }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <p class="m-0 text-808080">Gaji diterima</p>
                                            </div>
                                            <div class="col">
                                                <p class="m-0">Rp. {{ number_format($job->Transaction->transaction_amount, 0, ',', '.') }}</p>
                                            </div>
                                        </div>
                                        <!-- <p class="m-0 text-end">
                                            <a href="{{ route('caretaker.detail-riwayat-transaksi', $job->Transaction->transaction_id) }}" class="text-decoration-none" style="color: #FFDE59">Lihat Detail Order</a>
                                        </p> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection