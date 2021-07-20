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

    p {
        margin-bottom: 0.3rem;
    }
</style>

<div class="container col-xxl-12 px-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card shadow" style="border-radius: 20px; overflow: hidden; margin-top: 90px;">
                <div class="card-header bg-temanbunda d-flex align-items-center p-0" style="height: 107px;">
                    <div class="row">
                        <div class="col-1 d-flex align-items-center">
                            <a href="{{ url()->previous() }}" class="text-decoration-none fw-bold" style="color: black;">
                                <i class="bi bi-chevron-left ps-3" style="font-size: 36px; height: 36; width: 36;"></i>
                            </a>
                        </div>
                        <div class="col">
                            <h2 class="m-0 ms-5">{{ $care->User->nama_depan }} {{ $care->User->nama_belakang }}<span class="text-808080">, {{ $care->age }}</span></h2>
                        </div>
                    </div>
                </div>
                <div class="card-body mx-5" style=" min-height: 532px;">
                    <div class="row px-4" style="margin-top: -50px;">
                        <div class="col-9">
                            @for ($i = 1; $i < 6; $i++) @if ($care->meanRating >= $i)
                                <i class="bi-star-fill" style="color: #FF8A00; font-size: 14px;"></i>
                                @elseif (($i - $care->meanRating) >= 1)
                                <i class="bi-star" style="color: #FF8A00; font-size: 14px;"></i>
                                @elseif (fmod($care->meanRating, 1) != 0)
                                <i class="bi-star-half" style="color: #FF8A00; font-size: 14px;"></i>
                                @endif
                                @endfor
                                <span class="ps-4" style="font-size: 20px;">
                                    {{ $care->JobOffers->reduce(function($total, $jobOffer) {
                                        return $total + ($jobOffer->ReviewUser == null ? 0 : 1);
                                    }) }} ulasan
                                </span>
                                <div class="row pt-3">
                                    <div class="col-3 text-center">
                                        @if($care->takut_anjing == 0)
                                        <button type="button" class="me-3" data-bs-toggle="tooltip" data-bs-placement="right" title="Dapat bekerja dengan keberadaan hewan peliharaan" style="border: none; padding: 0; background: none; margin-top: 5px;">
                                            <i class="fas fa-paw m-0" style="font-size: 24;"></i>
                                        </button>
                                        @else
                                        <button type="button" class="me-3" data-bs-toggle="tooltip" data-bs-placement="right" title="Tidak dapat bekerja dengan keberadaan hewan peliharaan" style="border: none; padding: 0; background: none; margin-top: 5px;">
                                            <i class="fas fa-paw text-muted m-0" style="font-size: 24;"></i>
                                        </button>
                                        @endif

                                        @if($care->pengawasan_kamera == 1)
                                        <button type="button" data-bs-toggle="tooltip" data-bs-placement="right" title="Dapat bekerja di bawah pengawasan kamera" style="border: none; padding: 0; background: none; margin-top: 5px;">
                                            <i class="bi bi-camera-video-fill m-0" style="font-size: 24;"></i>
                                        </button>
                                        @else
                                        <button type="button" data-bs-toggle="tooltip" data-bs-placement="right" title="Tidak dapat bekerja di bawah pengawasan kamera" style="border: none; padding: 0; background: none; margin-top: 5px;">
                                            <i class="bi bi-camera-video-off-fill m-0" style="font-size: 24;"></i>
                                        </button>
                                        @endif
                                    </div>
                                    <div class="col-8 row align-items-center">
                                        <div class="col-auto">
                                            <p class="text-808080">ID Caregiver</p>
                                        </div>
                                        <div class="col-auto">{{ $care->caretaker_id }}</div>
                                    </div>
                                </div>
                        </div>
                        <div class="col-3" style="margin-top: -45px;">
                            @if ($care->User->profile_img_path != null)
                            <img src="{{ asset('storage/foto_profil/'.$care->User->profile_img_path) }}" class="profile-pic-lg border">
                            @else
                            <img src="{{ asset('img/no-profile.png') }}" class="profile-pic-lg border">
                            @endif
                        </div>
                    </div>
                    <div class="row pt-2">
                        <div class="col-md-6" style="border-right: 1px solid #9e9e9e;">
                            <div class="row">
                                <div class="col-md-5">
                                    <p class="text-808080 text-end">Jenis kelamin</p>
                                </div>
                                <div class="col-md-7">
                                    <p>{{ $care->User->jenis_kelamin }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <p class="text-808080 text-end">Harapan tarif</p>
                                </div>
                                <div class="col-md-7">
                                    <p>Rp{{ number_format($care->cost_per_hour, 0, ",", ".") }},00</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <p class="text-808080 text-end">Area</p>
                                </div>
                                <div class="col-md-7">
                                    <p>
                                        @foreach ($care->RegionCaretakerRelation as $area)
                                        {{ ucwords(strtolower($area->Region->region_name)) }} <br>
                                        @endforeach
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <p class="text-808080 text-end">Mengasuh</p>
                                </div>
                                <div class="col-md-7">
                                    <p>
                                        @foreach ( $care->ProfessionCaretakerRelation as $mengasuh)
                                        {{ $mengasuh->Profession->profession_name }},
                                        @endforeach
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-5">
                                    <p class="text-808080 text-end">Aktif sejak</p>
                                </div>
                                <div class="col-md-7">
                                    <p>{{ date('d-m-Y', strtotime($care->created_at)) }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <p class="text-808080 text-end">Tipe caregiver</p>
                                </div>
                                <div class="col-md-7">
                                    <p>{{ $care->tipe_caretaker }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <p class="text-808080 text-end">Edukasi</p>
                                </div>
                                <div class="col-md-7">
                                    <p>{{ $care->edukasi }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <p class="text-808080 text-end">Dokumen</p>
                                </div>
                                <div class="col-md-7">
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
                                    <p>SKCK</p>
                                    <br>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row pt-3">
                        <div class="col-md-auto ps-2" style="width: 145px;">
                            <p class="text-808080 text-end">Tentang</p>
                        </div>
                        <div class="col-md">
                            <p>{{ $care->deskripsi_caretaker }}</p>
                        </div>
                    </div>
                    <div class="row justify-content-end pt-5">
                        <a href="/user/buat-penawaran/{{$care->caretaker_id}}" class="btn bg-temanbunda fw-bold d-flex align-items-center justify-content-center" style="width: 235px; height: 58px;">Buat Penawaran</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection