@extends ('layout.master')
@section ('title','Detail Riwayat Transaksi | Teman Bunda')
@include ('layout.navbar.navbar-caretaker')
@include ('layout.sidebar.sidebar-caretaker')

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
            <div class="card shadow mb-2" style="border-radius: 20px; overflow: hidden; margin-top: 90px;">
                <div class="card-header bg-temanbunda p-0 d-flex align-items-center" style="height: 107px;">
                    <div class="row">
                        <div class="col-1 d-flex align-items-center">
                            <a href="{{ url()->previous() }}" class="text-decoration-none fw-bold" style="color: black;">
                                <i class="bi bi-chevron-left ps-3" style="font-size: 36px; height: 36; width: 36;"></i>
                            </a>
                        </div>
                        <div class="col">
                            <h2 class="m-0 ms-5">Info Transaksi</h2>
                        </div>
                    </div>
                </div>
                <div class="card-body mx-5" style="min-height: 532px;">
                    <div class="row mt-4">
                        <div class="col-md-4">
                            <p class="text-secondary text-end m-0 mb-2">Nomor Transaksi</p>
                        </div>
                        <div class="col-md-8">
                            <p class="m-0 mb-2">{{ $transaction->transaction_id }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <p class="text-secondary text-end m-0 mb-2">Dibayar tanggal</p>
                        </div>
                        <div class="col-md-8">
                            <p class="m-0 mb-2">{{ date('d/m/Y', strtotime($transaction->payment_date)) }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <p class="text-secondary text-end m-0 mb-2">Nomor Order</p>
                        </div>
                        <div class="col-md-8">
                            <p class="m-0 mb-2">{{ $transaction->JobOffer->job_id }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <p class="text-secondary text-end m-0 mb-2">Judul Pekerjaan</p>
                        </div>
                        <div class="col-md-8">
                            <p class="m-0 mb-2">{{ $transaction->JobOffer->judul_pekerjaan }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <p class="text-secondary text-end m-0 mb-2">Status</p>
                        </div>
                        <div class="col-md-8">
                            <p class="m-0 mb-2">{{ ucfirst($transaction->transaction_status) }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <p class="text-secondary text-end m-0 mb-2">Total upah</p>
                        </div>
                        <div class="col-md-8">
                            <p class="m-0 mb-2">Rp{{ number_format($transaction->transaction_amount, 2, ',', '.') }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <p class="text-secondary text-end m-0 mb-2">Upah diterima</p>
                        </div>
                        <div class="col-md-8">
                            <p class="m-0 mb-2">Rp{{ number_format($transaction->transaction_amount*0.95, 2, ',', '.') }}
                                <span data-bs-toggle="tooltip" data-bs-placement="right" title="Teman Bunda mengambil sebanyak lima persen dari penghasilanmu untuk mengembangkan Teman Bunda lebih lanjut"><i class="bi bi-info-circle-fill d-inline"></i></span>
                            </p>
                        </div>
                    </div>
                    <!-- <div class="row">
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
                    </div> -->
                    <div class="row justify-content-end" style="padding-top: 170px;">
                        <a href="{{ route('caretaker.detail-order', $transaction->job_id) }}" class="btn bg-temanbunda ms-3 fw-bold py-3" style="width: 180px; height: 58px;">Lihat Order</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection