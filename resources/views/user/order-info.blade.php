@extends ('layout.master')
@section ('title', 'Teman Bunda')
@include ('layout.navbar.navbar-user')
@include ('layout.sidebar.sidebar-user')

@section ('content')

<style>
    body {
        background-color: #efefef;
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
            <div class="card shadow" style="border-radius: 20px; overflow: hidden; margin-top: 90px;">
                <div class="card-header bg-temanbunda d-flex justify-content-between align-items-center p-0" style="height: 107px;">
                    <div class="col-1">
                        <a href="{{ url()->previous() }}" class="text-decoration-none fw-bold" style="color: black;">
                            <i class="bi bi-chevron-left ps-2" style="font-size: 36px; height: 36; width: 36;"></i>
                        </a>
                    </div>
                    <div class="col">
                        <p style="font-size: 36px; padding-top: 12px;">{{ $job->judul_pekerjaan }}</p>
                    </div>
                </div>
                <div class="card-body mx-5" style="min-height: 532px;">
                    <div class="row" style="margin-top: -50px;">
                        <div class="col-2">
                            @if ($job->Caretaker->User->profile_img_path != null)
                            <img src="{{ asset('storage/foto_profil/'.$job->Caretaker->User->profile_img_path) }}" class="profile-pic border border-5" style="width: 80px; height: 80px;">
                            @else
                            <img src="{{ asset('img/no-profile.png') }}" class="profile-pic border border-5">
                            @endif
                        </div>
                        <div class="col-10">
                            <div class="row">
                                <h3>{{ $job->Caretaker->User->nama_depan }} {{ $job->Caretaker->User->nama_belakang }} <a href="/user/info-caregiver/{{ $job->Caretaker->caretaker_id }}" class="btn bg-white d-inline-block" style="color: #ffde59; border-color: #ffde59;">Lihat profil</a></h3>
                            </div>
                            <div class="row">
                                <div class="col">
                                    @for ($i = 1; $i < 6; $i++) @if ($job->Caretaker->meanRating >= $i)
                                        <i class="bi-star-fill" style="color: #FFDE59;"></i>
                                        @elseif (($i - $job->Caretaker->meanRating) >= 1)
                                        <i class="bi-star" style="color: #FFDE59;"></i>
                                        @elseif (fmod($job->Caretaker->meanRating, 1) != 0)
                                        <i class="bi-star-half" style="color: #FFDE59;"></i>
                                        @endif
                                        @endfor
                                        <p>
                                            {{ $job->Caretaker->JobOffers->reduce(function ($total, $jobOffer) {
                                                return $total + ($jobOffer->ReviewUser == null ? 0 : 1);
                                            }) }} Rating
                                        </p>
                                </div>
                                <div class="col text-end">
                                    <p class="text-808080">ID Caregiver <span class="text-dark">{{ $job->Caretaker->caretaker_id }}</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <table>
                            <tr>
                                <td class="text-808080 text-end" style="width: 20%;">Status Order</td>
                                <td>{{ ucfirst($job->job_status) }}</td>
                            </tr>
                            <tr>
                                <td class="text-808080 text-end">Lokasi</td>
                                <td>{{ $job->User->alamat }}, {{ ucwords(strtolower($job->User->kelurahan)) }}, {{ ucwords(strtolower($job->User->kecamatan)) }}, {{ ucwords(strtolower($job->User->kabupaten)) }}</td>
                            </tr>
                            <tr>
                                <td class="text-808080 text-end">Tanggal</td>
                                <td>{{ $job->tanggal_masuk }} - {{ $job->tanggal_berakhir }}</td>
                            </tr>
                            <tr>
                                <td class="text-808080 text-end">Jam</td>
                                <td>
                                    {{ $job->jam_masuk }} - {{ $job->jam_berakhir }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-808080 text-end">Hari masuk</td>
                                <td>
                                    @if ($job->wd_1 == 1)
                                    Senin
                                    @endif
                                    @if ($job->wd_2 == 1)
                                    Selasa
                                    @endif
                                    @if ($job->wd_3 == 1)
                                    Rabu
                                    @endif
                                    @if ($job->wd_4 == 1)
                                    Kamis
                                    @endif
                                    @if ($job->wd_5 == 1)
                                    Jumat
                                    @endif
                                    @if ($job->wd_6 == 1)
                                    Sabtu
                                    @endif
                                    @if ($job->wd_7 == 1)
                                    Minggu
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="text-808080 text-end">Total upah</td>
                                <td>Rp{{ number_format($job->estimasi_biaya, 0, ",", ".") }},00</td>
                            </tr>
                            <tr>
                                <td class="text-808080 text-end" valign="top">Deskripsi</td>
                                <td>{{ $job->deskripsi_pekerjaan }}</td>
                            </tr>
                        </table>
                    </div>
                    @if ($job->job_status != "selesai" || $job->job_status != "ditolak" || $job->job_status != "dibatalkan")
                    @if ($job->job_status == "ubah gaji")
                    <div class="row" style="position: absolute; bottom: 50px; right: 0;">
                        <!-- Nanti tolong bottom dan right-nya disesuaikan dengan UI ya!-->
                        <p style="font-size: 14px; color: red;">Caregiver meminta perubahan gaji menjadi Rp{{ number_format($job->permintaan_gaji_baru,0, ",", ".") }},00</p>
                    </div>
                    @endif
                    <div class="row" style="position: absolute; bottom: 0; right: 0;">
                        @if ($job->job_status == "menunggu" || $job->job_status == "diterima")
                        <button type="button" class="btn fw-bold" data-bs-toggle="modal" data-bs-target="#batal" style="width: 180px; height: 58px; border: 1px solid #ffde59; color: #ffde59;">Batalkan Order</button>
                        @endif
                        @if ($job->job_status == "ubah gaji")
                        <button type="button" class="btn fw-bold" data-bs-toggle="modal" data-bs-target="#batal" style="width: 180px; height: 58px; border: 1px solid #ffde59; color: #ffde59;">Batalkan Order</button>
                        <button type="button" class="btn bg-temanbunda" data-bs-toggle="modal" data-bs-target="#ganti_gaji_modal" style="width: 180px; height: 58px;">Izinkan</button>
                        @endif
                        @if ($job->job_status == "berlangsung")
                        <button type="button" class="btn bg-temanbunda" data-bs-toggle="modal" data-bs-target="#selesai" style="width: 180px; height: 58px;">Selesai</button>
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
                                <a href="/user/batalkan/{{ $job->job_id }}" class="btn bg-temanbunda">Batalkan</a>
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
                            <form action="/update-gaji/{{ $job->job_id }}" method="POST">
                                @csrf
                                <div class="modal-body">
                                    <p class="form-text">Sebelum menekan tombol Selesai, pastikan Caregivermu sudah selesai melakukan tugasnya.</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-default" data-bs-dismiss="modal">Kembali</button>
                                    <a href="/user/selesai/{{ $job->job_id }}" class="btn bg-temanbunda">Selesai</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection