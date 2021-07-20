@extends ('layout.master')
@section ('title','Order | Teman Bunda')
@include ('layout.navbar.navbar-user')
@include ('layout.sidebar.sidebar-user')

@section ('content')
<style>
    .line {
        border-left: 5px solid white;
        height: 3px;
    }

    body {
        background-color: #efefef;
    }
</style>

<div class="container col-xxl-12 px-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card mb-2 shadow" style="border-radius: 20px; overflow: hidden; margin-top: 90px;">
                <div class="card-header row bg-temanbunda p-0 align-items-center" style="height: 107px;">
                    <p class="m-0 ms-5" style="font-size: 36px;">Status Order Saya</p>
                </div>
                <div class="card-body" style="min-height: 532px;">
                    @foreach ($job_offer as $job)
                    <a href="/user/order-info/{{$job->job_id}}" class="text-decoration-none" style="color: black;">
                        <div class="card border-2 mx-4 my-2 zoom" style="background-color: #f3f3f3; border-radius: 10px; overflow: hidden;">
                            <div class="card-header d-flex align-items-center p-0" style="background-color: #ffeea8;">
                                <div class="col-sm-10 border-end border-5 border-white">
                                    <p class="my-2 ps-4" style="font-size: 26px;">{{ $job->judul_pekerjaan }}</p>
                                </div>
                                <div class="col-sm-2 text-center p-0">
                                    @if ($job->job_status == "menunggu")
                                    <p class="text-808080" style="font-size: 17px; margin: 0;">{{ ucfirst($job->job_status) }}</p>
                                    @elseif ($job->job_status == "ditolak")
                                    <p class="text-danger" style="font-size: 17px; margin: 0;">{{ ucfirst($job->job_status) }}</p>
                                    @elseif ($job->job_status == "ubah gaji")
                                    <p class="text-dark" style="font-size: 17px; margin: 0;">{{ ucfirst($job->job_status) }}</p>
                                    @elseif ($job->job_status == "berlangsung")
                                    <p class="text-primary" style="font-size: 17px; margin: 0;">{{ ucfirst($job->job_status) }}</p>
                                    @elseif ($job->job_status == "selesai")
                                    <p class="text-success" style="font-size: 17px; margin: 0;">{{ ucfirst($job->job_status) }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3 px-2 text-center">
                                        @if ($job->Caretaker->User->profile_img_path != null)
                                        <img src="{{ asset('storage/foto_profil/'.$job->Caretaker->User->profile_img_path) }}" class="profile-pic border border-5">
                                        @else
                                        <img src="{{ asset('img/no-profile.png') }}" class="profile-pic border border-5">
                                        @endif
                                    </div>
                                    <div class="col-md-9">
                                        <div class="row">
                                            <h3 class="card-title px-0 fw-bold">{{ $job->Caretaker->User->nama_depan }} {{ $job->Caretaker->User->nama_belakang }} - {{ $job->Caretaker->age }}</h5>
                                        </div>
                                        <div class="row" style="font-size: 17px;">
                                            <table>
                                                <tr>
                                                    <td class="text-808080">Tanggal kerja</td>
                                                    <td>{{ $job->tanggal_masuk }} - {{ $job->tanggal_berakhir }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-808080">Jam kerja</td>
                                                    <td>{{ $job->jam_masuk }} - {{ $job->jam_berakhir }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-808080">Estimasi biaya</td>
                                                    <td>Rp{{ number_format($job->estimasi_biaya, 2, ",", ".") }}</td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="row pt-1" style="font-size: 17px; color: #808080;">
                                            <p class="line-clamp">{{ $job->deskripsi_pekerjaan }}</p>
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