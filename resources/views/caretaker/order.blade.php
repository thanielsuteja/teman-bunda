@extends ('layout.master')
@section ('title','Status Order | Teman Bunda')
@include ('layout.navbar.navbar-caretaker')
@include ('layout.sidebar.sidebar-caretaker')

@section ('content')
<style>
    body {
        background-color: #efefef;
    }

    .line-clamp {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    p {
        margin-bottom: 0.1rem;
    }
</style>

<div class="container col-xxl-12 px-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card mb-2 shadow" style="border-radius: 20px; overflow: hidden; margin-top: 90px;">
                <div class="card-header row bg-temanbunda p-0 align-items-center" style="height: 107px;">
                    <h2 class="m-0 ms-5">Order</h2>
                </div>
                <div class="card-body" style="min-height: 532px;">
                    @foreach ($jobOffers as $jobOffer)
                    <a href="{{ route('caretaker.detail-order', $jobOffer->job_id) }}" class="text-decoration-none" style="color: black;">
                        <div class="card border-2 zoom mx-5 my-3" style="background-color: #f3f3f3; border-radius: 10px; overflow: hidden;">
                            <div class="card-header d-flex d-flex align-items-center p-0" style="background: #FFEEA8;">
                                <div class="col-sm-10 border-end border-5 border-white">
                                    <h5 class="my-2 ps-4">{{ $jobOffer->judul_pekerjaan }}</h5>
                                </div>
                                <div class="col-sm-2 text-center p-0">
                                    <p class="fw-bold {{ $jobOffer->JobStatusColor }}">{{ ucwords($jobOffer->job_status) }}</p>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3 px-2 text-center">
                                        @if ($jobOffer->User->profile_img_path != null)
                                        <img src="{{ asset('storage/foto_profil/'.$jobOffer->User->profile_img_path) }}" style="border-radius: 50%; object-fit: cover; width: 110px; height: 110px; border: 7px solid #FFE074">
                                        @else
                                        <img src="{{ asset('img/no-profile.png') }}" style="border-radius: 50%; object-fit: cover; width: 110px; height: 110px; border: 7px solid #FFE074">
                                        @endif
                                    </div>
                                    <div class="col-md-9 ps-0">
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
                                                <p class="m-0">Rp{{ number_format($jobOffer->estimasi_biaya, 2, ',', '.') }}</p>
                                            </div>
                                        </div>
                                        <p class="m-0 text-secondary line-clamp">
                                            {{ $jobOffer->deskripsi_pekerjaan }}
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