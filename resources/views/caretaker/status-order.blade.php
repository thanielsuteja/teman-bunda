@extends ('layout.master')
@section ('title','Status Order | Teman Bunda')
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
                        <h3 class="ps-3 fw-bold m-0">Order</h3>
                    </div>
                    <div class="card-body">
                        @foreach ($jobOffers as $jobOffer)
                            <a href="{{ route('caretaker.detail-status-order', $jobOffer->job_id) }}" class="text-decoration-none" style="color: black;">
                                <div class="card border-2 zoom mx-4 my-2" style="background-color: #f3f3f3; border-radius: 10px; overflow: hidden;">
                                    <div class="card-header d-flex justify-content-between py-3" style="background: #FFEEA8;">
                                        <h5 class="fw-bold m-0">{{ $jobOffer->judul_pekerjaan }}</h5>
                                        <h5 class="m-0 {{ $jobOffer->JobStatusColor }}">{{ ucwords($jobOffer->job_status) }}</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-3 px-2 text-center">
                                                @if ($jobOffer->User->profile_img_path != null)
                                                    <img src="{{ asset($jobOffer->User->profile_img_path) }}" style="border-radius: 50%; object-fit: cover; width: 110px; height: 110px; border: 7px solid #FFE074">
                                                @else
                                                    <img src="{{ asset('img/no-profile.png') }}" style="border-radius: 50%; object-fit: cover; width: 110px; height: 110px; border: 7px solid #FFE074">
                                                @endif
                                            </div>
                                            <div class="col-md-9">
                                                <h5 class="m-0">Oleh {{ $jobOffer->User->nama_depan }} {{ $jobOffer->User->nama_belakang }}</h5>
                                                <div class="row">
                                                    <div class="col">
                                                        <p class="m-0 text-secondary">Tanggal kerja</p>
                                                    </div>
                                                    <div class="col">
                                                        <p class="m-0">{{ date('d/m/Y', strtotime($jobOffer->tanggal_masuk)) }} - {{ date('d/m/Y', strtotime($jobOffer->tanggal_berakhir)) }}</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <p class="m-0 text-secondary">Waktu kerja</p>
                                                    </div>
                                                    <div class="col">
                                                        <p class="m-0">{{ $jobOffer->jam_masuk }} - {{ $jobOffer->jam_berakhir }}</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <p class="m-0 text-secondary">Estimasi tarif</p>
                                                    </div>
                                                    <div class="col">
                                                        <p class="m-0">Rp. {{ number_format($jobOffer->estimasi_biaya, 0, ',', '.') }}</p>
                                                    </div>
                                                </div>
                                                <p class="m-0 text-secondary">
                                                    {{ substr($jobOffer->deskripsi_pekerjaan, 116) }}
                                                    @if (strlen($jobOffer->deskripsi_pekerjaan) > 116)
                                                        ...
                                                    @endif
                                                </p>
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