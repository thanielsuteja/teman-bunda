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
            <div class="card shadow mb-4" style="border-radius: 20px; overflow: hidden; margin-top: 90px;">
                <div class="card-header bg-temanbunda d-flex align-items-center p-0" style="height: 107px;">
                    <div class="row">
                        <div class="col-1 d-flex align-items-center">
                            <a href="{{ route('cari-caregiver') }}" class="text-decoration-none fw-bold" style="color: black;">
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
                                    @if ($care->countReviewUser == 0)
                                    0 ulasan
                                    @else
                                    {{ $care->countReviewUser }} ulasan
                                    @endif
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
                        <div class="col-3 mb-2" style="margin-top: -45px;">
                            @if ($care->User->profile_img_path != null)
                            <img src="{{ asset('storage/foto_profil/'.$care->User->profile_img_path) }}" class="profile-pic-lg border">
                            @else
                            <img src="{{ asset('img/no-profile.png') }}" class="profile-pic-lg border">
                            @endif
                        </div>
                    </div>
                    <div class="row pt-2">
                        <div class="col-md-6 pe-0" style="border-right: 1px solid #9e9e9e;">
                            <div class="row">
                                <div class="col-md-5">
                                    <p class="text-808080">Jenis kelamin</p>
                                </div>
                                <div class="col-md-7">
                                    <p>{{ ucfirst($care->User->jenis_kelamin) }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <p class="text-808080">Harapan tarif</p>
                                </div>
                                <div class="col-md-7">
                                    <p>Rp{{ number_format($care->cost_per_hour, 0, ",", ".") }},00</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <p class="text-808080">Area</p>
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
                                    <p class="text-808080">Mengasuh</p>
                                </div>
                                <div class="col-md-7">
                                    <p>
                                        @foreach ( $care->ProfessionCaretakerRelation as $mengasuh)
                                        {{ $mengasuh->Profession->profession_name }} <br>
                                        @endforeach
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-5">
                                    <p class="text-808080">Aktif sejak</p>
                                </div>
                                <div class="col-md-7">
                                    <p>{{ date('d/m/Y', strtotime($care->created_at)) }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <p class="text-808080">Tipe caregiver</p>
                                </div>
                                <div class="col-md-7">
                                    <p>{{ $care->tipe_caretaker }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <p class="text-808080">Edukasi</p>
                                </div>
                                <div class="col-md-7">
                                    <p>{{ $care->edukasi }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <p class="text-808080">Dokumen</p>
                                </div>
                                <div class="col-md-7">
                                    @if ($care->dokumen_vaksin_path == null && $care->dokumen_psikotes_path == null && $care->dokumen_ijazah_path == null && $care->dokumen_skck_path == null)
                                    <p>Tidak ada dokumen</p>
                                    @endif
                                    <p>
                                        @if ($care->dokumen_vaksin_path != null)
                                        Sertifikat Vaksinasi
                                        <br>
                                        @endif
                                        @if ($care->dokumen_psikotes_path != null)
                                        Berkas Psikotes
                                        <br>
                                        @endif
                                        @if ($care->dokumen_ijazah_path != null)
                                        Ijazah
                                        <br>
                                        @endif
                                        @if ($care->dokumen_skck_path != null)
                                        SKCK
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row pt-3">
                        <div class="col-md-auto ps-2" style="width: 145px;">
                            <p class="text-808080">Tentang</p>
                        </div>
                        <div class="col-md">
                            <p>{{ $care->deskripsi_caretaker }}</p>
                        </div>
                    </div>
                    <hr class="mt-2 mb-3">
                    <div class="row pt-1">
                        <p class="text-808080">Ulasan Untuk Caregiver Ini</p>
                    </div>
                    <div class="d-flex pt-1 justify-content-center">
                        <div class="card card-body py-2 px-4" style="background-color: #f6f6f6; border-radius: 5px;">
                            @forelse ($care->JobOffers()->has('ReviewUser')->orderBy('job_id', 'desc')->get() as $job)
                            <div class="row py-2 border-top border-bottom" style="min-height: 118px;">
                                <div class="col-md-auto px-3">
                                    @if ($job->User->profile_img_path != null)
                                    <img src="{{ asset('storage/foto_profil/'.$job->User->profile_img_path) }}" style="border-radius: 50%; object-fit: cover; width: 69px; height: 69px">
                                    @else
                                    <img src="{{ asset('img/no-profile.png') }}" style="border-radius: 50%; object-fit: cover; width: 69px; height: 69px">
                                    @endif
                                </div>
                                <div class="col-md ps-0 pe-3">
                                    <p class="m-0 fw-bold">{{ $job->User->nama_depan }} {{ $job->User->nama_belakang }}</p>
                                    <div class="d-flex">
                                        <div class="me-2">
                                            @for ($i = 1; $i < 6; $i++) @if ($job->ReviewUser->review_rating >= $i)
                                                <i class="bi-star-fill" style="color: #FFDE59; font-size: 14px;"></i>
                                                @elseif (($i - $job->ReviewUser->review_rating) >= 1)
                                                <i class="bi-star" style="color: #FFDE59; font-size: 14px;"></i>
                                                @elseif (fmod($job->ReviewUser->review_rating, 1) != 0)
                                                <i class="bi-star-half" style="color: #FFDE59; font-size: 14px;"></i>
                                                @endif
                                                @endfor
                                        </div>
                                        <span class="text-secondary">
                                            {{ \Carbon\Carbon::parse($job->created_at)->diffForHumans() }}
                                        </span>
                                    </div>
                                    <p>{{ $job->ReviewUser->review_content }}</p>
                                </div>
                            </div>
                            @empty
                            <div class="text-center">
                                <p class="text-808080 my-3">Caregiver ini belum memiliki ulasan</p>
                            </div>
                            @endforelse
                        </div>
                    </div>
                    <div class="row justify-content-end pt-4">
                        <a href="/user/buat-penawaran/{{$care->caretaker_id}}" class="btn bg-temanbunda fw-bold d-flex align-items-center justify-content-center" style="width: 235px; height: 58px;">Buat Penawaran</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection