@extends ('layout.master')
@section ('title','Riwayat Transaksi | Teman Bunda')
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
                    <div class="card-header bg-temanbunda d-flex justify-content-between align-items-center py-4">
                        <h3 class="ps-3 fw-bold m-0">Riwayat Transaksi</h3>
                    </div>
                    <div class="card-body">
                        @foreach ($transactions as $transaction)
                            <div class="text-decoration-none" style="color: black;">
                                <div class="card border-2 mx-4 my-2" style="background-color: #f3f3f3; border-radius: 10px; overflow: hidden;">
                                    <div class="card-header d-flex justify-content-between py-3" style="background: #FFEEA8;">
                                        <h5 class="fw-bold m-0">{{ $transaction->judul_pekerjaan }}</h5>
                                        <h5 class="m-0 {{ $transaction->Transaction->TransactionStatusColor }}">{{ ucwords($transaction->Transaction->transaction_status) }}</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-3 px-2 text-center">
                                                @if ($transaction->User->profile_img_path != null)
                                                    <img src="{{ asset($transaction->User->profile_img_path) }}" style="border-radius: 50%; object-fit: cover; width: 110px; height: 110px; border: 7px solid #FFE074">
                                                @else
                                                    <img src="{{ asset('img/no-profile.png') }}" style="border-radius: 50%; object-fit: cover; width: 110px; height: 110px; border: 7px solid #FFE074">
                                                @endif
                                            </div>
                                            <div class="col-md-9">
                                                <div class="row">
                                                    <div class="col">
                                                        <p class="m-0 text-secondary">Nomor transaksi</p>
                                                    </div>
                                                    <div class="col">
                                                        <p class="m-0">{{ $transaction->Transaction->transaction_id }}</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <p class="m-0 text-secondary">Order ID</p>
                                                    </div>
                                                    <div class="col">
                                                        <p class="m-0">{{ $transaction->job_id }}</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <p class="m-0 text-secondary">Oleh</p>
                                                    </div>
                                                    <div class="col">
                                                        <p class="m-0">{{ $transaction->User->nama_depan }} {{ $transaction->User->nama_belakang }}</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <p class="m-0 text-secondary">Tanggal kerja</p>
                                                    </div>
                                                    <div class="col">
                                                        <p class="m-0">{{ date('d/m/Y', strtotime($transaction->tanggal_masuk)) }} - {{ date('d/m/Y', strtotime($transaction->tanggal_berakhir)) }}</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <p class="m-0 text-secondary">Gaji diterima</p>
                                                    </div>
                                                    <div class="col">
                                                        <p class="m-0">Rp. {{ number_format($transaction->Transaction->transaction_ammount, 0, ',', '.') }}</p>
                                                    </div>
                                                </div>
                                                <p class="m-0 text-end">
                                                    <a href="{{ route('caretaker.detail-riwayat-transaksi', $transaction->Transaction->transaction_id) }}" class="text-decoration-none" style="color: #FFDE59">Lihat Detail Order</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection