@extends ('layout.master')
@section ('title','Cari Caretaker | Teman Bunda')
@include ('layout.navbar.navbar-user')
@include ('layout.sidebar.sidebar-user')

@section ('content')
<style>
    body {
        background-color: #efefef;
    }

    table {
        width: 100%;
    }
</style>

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
                        <p style="font-size: 36px; padding-top: 12px;">Informasi</p>
                    </div>
                    <div class="col text-end">
                        @if($care->takut_anjing == 1)
                        <button type="button" data-bs-toggle="tooltip" data-bs-placement="right" title="Tidak dapat bekerja dengan keberadaan anjing" style="border: none; padding: 0; background: none; margin-top: 5px;">
                            <i class="fas fa-dog text-muted m-0" style="font-size: 24;"></i>
                        </button>
                        @else
                        <button type="button" data-bs-toggle="tooltip" data-bs-placement="right" title="Dapat bekerja dengan keberadaan anjing" style="border: none; padding: 0; background: none; margin-top: 5px;">
                            <i class="fas fa-dog m-0" style="font-size: 24;"></i>
                        </button>
                        @endif

                        @if($care->pengawasan_kamera == 1)
                        <button type="button" data-bs-toggle="tooltip" data-bs-placement="right" title="Dapat bekerja di bawah pengawasan kamera" style="border: none; padding: 0; background: none; margin-top: 5px;">
                            <i class="bi bi-camera-video-fill m-0" style="font-size: 24;"></i>
                        </button>
                        @else
                        <button type="button" data-bs-toggle="tooltip" data-bs-placement="right" title="Tidak dapat bekerja di bawah pengawasan kamera" style="border: none; padding: 0; background: none; margin-top: 5px;">
                            <i class="bi bi-camera-video-fill text-muted m-0" style="font-size: 24;"></i>
                        </button>
                        @endif
                    </div>
                </div>
                <div class="card-body mx-5" style=" min-height: 532px;">
                    <div class="row" style="margin-top: -50px;">
                        <div class="col-2">
                            @if ($care->User->profile_img_path != null)
                            <img src="{{ asset('storage/foto_profil/'.$care->User->profile_img_path) }}" class="profile-pic border border-5" style="width: 80px; height: 80px;">
                            @else
                            <img src="{{ asset('img/no-profile.png') }}" class="profile-pic border border-5">
                            @endif
                        </div>
                        <div class="col-10">
                            <div class="row">
                                <h3>{{ $care->User->nama_depan }} {{ $care->User->nama_belakang }} <span class="text-808080">- {{ $care->age }} tahun, {{ $care->User->jenis_kelamin }}</span></h3>
                            </div>
                            @for ($i = 1; $i < 6; $i++) @if ($care->meanRating >= $i)
                                <i class="bi-star-fill" style="color: #FFDE59;"></i>
                                @elseif (($i - $care->meanRating) >= 1)
                                <i class="bi-star" style="color: #FFDE59;"></i>
                                @elseif (fmod($care->meanRating, 1) != 0)
                                <i class="bi-star-half" style="color: #FFDE59;"></i>
                                @endif
                                @endfor
                                <p>
                                    {{ $care->JobOffers->reduce(function($total, $jobOffer) {
                                        return $total + ($jobOffer->ReviewUser == null ? 0 : 1);
                                    }) }} Rating
                                </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6" style="border-right: 1px solid #9e9e9e;">
                            <table>
                                <tr>
                                    <td class="text-808080 text-end">ID Caretaker</td>
                                    <td>{{ $care->caretaker_id }}</td>
                                </tr>
                                <tr>
                                    <td class="text-808080 text-end">Harapan tarif</td>
                                    <td>Rp{{ number_format($care->cost_per_hour, 0, ",", ".") }},00</td>
                                </tr>
                                <tr>
                                    <td class="text-808080 text-end" valign="top">Area</td>
                                    <td>
                                        @foreach ($care->RegionCaretakerRelation as $area)
                                        {{ ucwords(strtolower($area->Region->region_name)) }} <br>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-808080 text-end">Mengasuh</td>
                                    <td>
                                        @foreach ( $care->ProfessionCaretakerRelation as $mengasuh)
                                        {{ $mengasuh->Profession->profession_name }},
                                        @endforeach
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table>
                                <tr>
                                    <td class="text-808080 text-end">Aktif sejak</td>
                                    <td>{{ $care->created_at }}</td>
                                </tr>
                                <tr>
                                    <td class="text-808080 text-end">Tinggi</td>
                                    <td>{{ $care->tinggi }}</td>
                                </tr>
                                <tr>
                                    <td class="text-808080 text-end">Berat</td>
                                    <td>{{ $care->berat }}</td>
                                </tr>
                                <tr>
                                    <td class="text-808080 text-end">Agama</td>
                                    <td>{{ $care->religi }}</td>
                                </tr>
                                <tr>
                                    <td class="text-808080 text-end" valign="top">Dokumen terverifikasi</td>
                                    <td>
                                        @if ($care->dokumen_vaksin_path == null && $care->dokumen_psikotes_path == null && $care->dokumen_ijazah_path == null && $care->dokumen_akta_kelahiran_path == null)
                                        <p>Tidak ada dokumen</p>
                                        @endif
                                        @if ($care->dokumen_vaksin_path != null)
                                        <p>Sertifikat Vaksinasi</p>
                                        <br>
                                        @endif
                                        @if ($care->dokumen_psikotes_path != null)
                                        <p>Berkas Psikotes</p>
                                        <br>
                                        @endif
                                        @if ($care->dokumen_ijazah_path != null)
                                        <p>Ijazah</p>
                                        <br>
                                        @endif
                                        @if ($care->dokumen_akta_kelahiran_path != null)
                                        <p>Akta Kelahiran</p>
                                        <br>
                                        @endif
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <table>
                            <tr>
                                <th class="text-808080 text-end" style="width: 25%;">Tentang</th>
                                <th>{{ $care->deskripsi_caretaker }}</th>
                            </tr>
                        </table>
                    </div>
                    <div class="row" style="position: absolute; bottom: 0; right: 0;">
                        <a href="/user/buat-penawaran/{{$care->caretaker_id}}" class="btn bg-temanbunda fw-bold" style="width: 235px; height: 58px;">Buat Penawaran</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection