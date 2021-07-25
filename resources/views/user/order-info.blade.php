@extends ('layout.master')
@section ('title', 'Teman Bunda')
@include ('layout.navbar.navbar-user')
@include ('layout.sidebar.sidebar-user')

@section ('content')

<style>
    body {
        background-color: #efefef;
    }

    p {
        margin-bottom: 0.5rem;
    }
</style>
<script>
    $(document).ready(function() {
        $('#gaji_baru').on('keyup', function() {
            var gaji = $("#gaji_baru").val();

            if (gaji == '{{ $job->permintaan_gaji_baru }}') {
                $('#btnIzinkan').attr('disabled', false);
            } else {
                $('#btnIzinkan').attr('disabled', true);
            }
        });
    });
</script>

<div class="container col-xxl-12 px-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card mb-2 shadow" style="border-radius: 20px; overflow: hidden; margin-top: 90px;">
                <div class="card-header bg-temanbunda d-flex justify-content-between align-items-center p-0" style="height: 120px;">
                    <div class="row">
                        <div class="col-1 d-flex align-items-center">
                            <a href="{{ url()->previous() }}" class="text-decoration-none fw-bold" style="color: black;">
                                <i class="bi bi-chevron-left ps-3" style="font-size: 36px; height: 36; width: 36;"></i>
                            </a>
                        </div>
                        <div class="col">
                            <h2 class="m-0 ms-5">{{ $job->judul_pekerjaan }}</h2>
                        </div>
                    </div>
                </div>
                <div class="card-body mx-5" style="min-height: 532px;">
                    <div class="row px-4" style="margin-top: -50px;">
                        <div class="col-9">
                            <div class="row">
                                <h5>{{ $job->Caretaker->User->nama_depan }} {{ $job->Caretaker->User->nama_belakang }} <a href="/user/info-caregiver/{{ $job->Caretaker->caretaker_id }}" class="btn bg-white d-inline-block pt-1" style="color: #ffde59; border-color: #ffde59; height: 30px;">Lihat profil</a></h5>
                            </div>
                            <div class="row">
                                <div class="col-3 text-center">
                                    @for ($i = 1; $i < 6; $i++) @if ($job->Caretaker->meanRating >= $i)
                                        <i class="bi-star-fill" style="color: #FFDE59; font-size: 12px;"></i>
                                        @elseif (($i - $job->Caretaker->meanRating) >= 1)
                                        <i class="bi-star" style="color: #FFDE59; font-size: 12px;"></i>
                                        @elseif (fmod($job->Caretaker->meanRating, 1) != 0)
                                        <i class="bi-star-half" style="color: #FFDE59; font-size: 12px;"></i>
                                        @endif
                                        @endfor
                                        <p style="font-size: 16px;">
                                            @if ($job->Caretaker->countReviewUser == 0)
                                            0 ulasan
                                            @else
                                            {{ $job->Caretaker->countReviewUser }} Rating
                                            @endif
                                        </p>
                                </div>
                                <div class="row col-9 d-flex align-items-center">
                                    <div class="col-auto pe-0">
                                        <p class="text-808080">ID Caregiver</p>
                                    </div>
                                    <div class="col-auto">
                                        <p class="text-dark">{{ $job->Caretaker->caretaker_id }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3" style="margin-top: -40px;">
                            @if ($job->Caretaker->User->profile_img_path != null)
                            <img src="{{ asset('storage/foto_profil/'.$job->Caretaker->User->profile_img_path) }}" class="profile-pic-lg border">
                            @else
                            <img src="{{ asset('img/no-profile.png') }}" class="profile-pic-lg border">
                            @endif
                        </div>
                    </div>
                    <div class="row pt-3">
                        <div class="col-md-3">
                            <p class="text-808080 text-end">Status Order</p>
                        </div>
                        <div class="col-md-9">
                            <p>{{ ucfirst($job->job_status) }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <p class="text-808080 text-end">Lokasi</p>
                        </div>
                        <div class="col-md-9">
                            <p>{{ $job->User->alamat }}, {{ ucwords(strtolower($job->User->kelurahan)) }}, {{ ucwords(strtolower($job->User->kecamatan)) }}, {{ ucwords(strtolower($job->User->kabupaten)) }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <p class="text-808080 text-end">Tanggal</p>
                        </div>
                        <div class="col-md-9">
                            <p>{{ date('d/m/Y', strtotime($job->tanggal_masuk)) }} - {{ date('d/m/Y', strtotime($job->tanggal_berakhir)) }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <p class="text-808080 text-end">Hari masuk</p>
                        </div>
                        <div class="col-md-9">
                            <p>{{ implode(', ', $job->Days) }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <p class="text-808080 text-end">Jam</p>
                        </div>
                        <div class="col-md-9">
                            <p>{{ $job->jam_masuk }} - {{ $job->jam_berakhir }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <p class="text-808080 text-end">Total upah</p>
                        </div>
                        <div class="col-md-9">
                            <p>Rp{{ number_format($job->estimasi_biaya, 0, ",", ".") }},00</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <p class="text-808080 text-end">Deskripsi</p>
                        </div>
                        <div class="col-md-9">
                            <p>{{ $job->deskripsi_pekerjaan }}</p>
                        </div>
                    </div>

                    @if ($job->job_status != "ditolak" || $job->job_status != "batal")
                    <div class="row text-end pt-5">
                        @if ($job->job_status == "ubah gaji")
                        <p style="font-size: 14px; color: red;">Caregiver meminta perubahan gaji menjadi Rp{{ number_format($job->permintaan_gaji_baru,0, ",", ".") }},00</p>
                        @elseif ($job->job_status == "diterima")
                        <p style="font-size: 14px; color: red;">Jangan lupa untuk melakukan pembayaran sebelum tenggat waktu</p>
                        @endif
                    </div>
                    <div class="row justify-content-end">
                        @if ($job->job_status == "menunggu")
                        <button type="button" class="btn fw-bold" data-bs-toggle="modal" data-bs-target="#batal" style="width: 180px; height: 58px; border: 1px solid #ffde59; color: #ffde59;">Batalkan Order</button>
                        @elseif ($job->job_status == "diterima")
                        <button type="button" class="btn fw-bold" data-bs-toggle="modal" data-bs-target="#batal" style="width: 180px; height: 58px; border: 1px solid #ffde59; color: #ffde59;">Batalkan Order</button>
                        <a href="{{ route('info-transaksi', $transaction->transaction_id) }}" class="btn bg-temanbunda ms-3 fw-bold p-3" style="width: 180px; height: 58px;">Pembayaran</a>
                        @elseif ($job->job_status == "ubah gaji")
                        <button type="button" class="btn fw-bold" data-bs-toggle="modal" data-bs-target="#batal" style="width: 180px; height: 58px; border: 1px solid #ffde59; color: #ffde59;">Batalkan Order</button>
                        <button type="button" class="btn bg-temanbunda ms-3 fw-bold" data-bs-toggle="modal" data-bs-target="#ganti_gaji_modal" style="width: 180px; height: 58px;">Respon</button>
                        @elseif ($job->job_status == "berlangsung")
                        <button type="button" class="btn bg-temanbunda fw-bold" data-bs-toggle="modal" data-bs-target="#selesai" style="width: 180px; height: 58px;">Selesai</button>
                        @elseif ($job->job_status == "selesai" && $job->ReviewUser == null)
                        <a href="{{ route('user.review', $job->job_id) }}" class="btn bg-temanbunda ms-3 fw-bold p-3" style="width: 180px; height: 58px;">Beri Ulasan</a>
                        @endif
                    </div>
                    @endif
                </div>

                <!-- Modal Ubah Gaji -->
                <div class="modal fade" id="ganti_gaji_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="gantiGajiModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header bg-temanbunda">
                                <h5 class="modal-title" id="gantiGajiModalLabel">Ganti jumlah gaji yang diberikan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="/user/update-gaji/{{ $job->job_id }}" method="POST">
                                @csrf
                                <div class="modal-body">
                                    <span id="modal_description" class="form-text">Caregivermu meminta perubahan gaji dari Rp{{ number_format($job->estimasi_biaya,0,",",".") }},00 menjadi Rp{{ number_format($job->permintaan_gaji_baru,0,",",".") }},00</span>
                                    <input type="text" name="gaji_baru" id="gaji_baru" class="form-control" placeholder="Ketik '{{ $job->permintaan_gaji_baru }}' untuk mengizinkan perubahan" aria-describedby="modal_description">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-default" data-bs-dismiss="modal">Kembali</button>
                                    <a type="button" class="btn btn-outline-default" href="{{ route('user.tolak-permintaan', $job->job_id) }}">Tolak</a>
                                    <input type="submit" class="btn bg-temanbunda" id="btnIzinkan" value="Izinkan" disabled></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Modal Batal -->
                <div class="modal fade" id="batal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="batalModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header bg-temanbunda">
                                <h5 class="modal-title" id="batalModalLabel">Yakin ingin membatalkan order?</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p class="form-text">Kamu tidak dapat kembali lagi setelah membatalkan Order ini. Apakah kamu yakin ingin membatalkan order ini? </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-default" data-bs-dismiss="modal">Kembali</button>
                                <a href="{{ route('user.batal', $job->job_id) }}" class="btn bg-temanbunda">Batalkan</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Selesai -->
                <div class="modal fade" id="selesai" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header bg-temanbunda">
                                <h5 class="modal-title" id="exampleModalLabel">Yakin ingin selesaikan order?</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p class="form-text">Sebelum menekan tombol Selesai, pastikan Caregivermu sudah selesai melakukan tugasnya.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-default" data-bs-dismiss="modal">Kembali</button>
                                <a href="{{ route('user.selesai', $job->job_id) }}" class="btn bg-temanbunda">Selesai</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection