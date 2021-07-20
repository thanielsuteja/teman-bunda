@extends ('layout.master')
@section ('title','Cari Caretaker | Teman Bunda')
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
        $('#filter_area').on('change', function() {
            var area = $("#filter_area").val();
            console.log(area);
            if (area != '') {

            } else {

            }
        });
    });
</script>

<div class="container main col-xxl-12 px-5 mt-0">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card shadow" style="border-radius: 20px; overflow: hidden; margin-top: 90px;">
                <div class="card-header bg-temanbunda d-flex justify-content-between align-items-center py-4">
                    <label class="h5 px-3 fw-bold">Cari berdasarkan</label>
                    <div class="form-floating d-inline-block" style="width: 200px;">
                        <select name="filter_mengasuh" id="filter_mengasuh" class="form-select rounded-input">
                            <!-- <option value="">Profesi</option> -->
                            @foreach ($profesi as $id => $name)
                            <option value="{{ $id }}">{{ $name }}</option>
                            @endforeach
                        </select>
                        <label for="filter_mengasuh">Mengasuh</label>
                    </div>
                    <div class="form-floating d-inline-block me-5" style="width: 200px;">
                        <select name="filter_area" id="filter_area" class="form-select rounded-input">
                            <!-- <option value="">Area</option> -->
                            @foreach ($area as $id => $name)
                            <option value="{{ $id }}">{{ $name }}</option>
                            @endforeach
                        </select>
                        <label for="filter_area">Area (Kecamatan)</label>
                    </div>
                    <div class="dropdown d-inline-block pe-4">
                        <button type="button" class="nav-link link-dark text-decoration-none border border-2 border-secondary p-2 bg-white" id="dropdown_filter" data-bs-toggle="dropdown" aria-expanded="false" aria-haspopup="true" data-bs-toggle="tooltip" data-placement="bottom" title="Urutkan berdasarkan" style="border-radius: 10px;">
                            <i class="bi bi-sort-down m-0" style="font-size: 26;"></i>
                        </button>
                        <ul class="dropdown-menu text-small" aria-labelledby="dropdown_filter">
                            <li><a class="dropdown-item" href="#">Rating tertinggi</a></li>
                            <li><a class="dropdown-item" href="#">Harga terendah</a></li>
                            <!-- <li><a class="dropdown-item" href="#">Harga tertinggi</a></li> -->
                            <li><a class="dropdown-item" href="#">Umur termuda</a></li>
                            <li><a class="dropdown-item" href="#">Umur tertua</a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body" style="min-height: 532px;">
                    @foreach ($caretaker as $care)
                    <a href="/user/info-caregiver/{{$care->caretaker_id}}" class="text-decoration-none" style="color: black;">
                        <div class="card border-2 mx-5 my-3 zoom" style="background-color: #f3f3f3; border-radius: 10px; overflow: hidden;">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3 px-2 text-center">
                                        @if ($care->User->profile_img_path != null)
                                        <img src="{{ asset('storage/foto_profil/'.$care->User->profile_img_path) }}" class="profile-pic border border-5">
                                        @else
                                        <img src="{{ asset('img/no-profile.png') }}" class="profile-pic border border-5">
                                        @endif
                                        <div class="justify-content-center d-flex pt-3">
                                            @for ($i = 1; $i < 6; $i++) @if ($care->meanRating >= $i)
                                                <i class="bi-star-fill" style="color: #FFDE59;"></i>
                                                @elseif (($i - $care->meanRating) >= 1)
                                                <i class="bi-star" style="color: #FFDE59;"></i>
                                                @elseif (fmod($care->meanRating, 1) != 0)
                                                <i class="bi-star-half" style="color: #FFDE59;"></i>
                                                @endif
                                                @endfor
                                        </div>
                                        <div class="row text-center">
                                            <p>{{ $care->JobOffers->reduce(function ($total, $jobOffer) {
                                                return $total + ($jobOffer->ReviewUser == null ? 0 : 1);
                                            }) }} Rating</p>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="row">
                                            <div class="col">
                                                <h3 class="card-title pt-2 fw-bold">{{ $care->User->nama_depan }} {{ $care->User->nama_belakang }}, {{ $care->age }}</h5>
                                            </div>
                                            @if ($care->takut_anjing == 0)
                                            <div class="col-1">
                                                <button type="button" data-bs-toggle="tooltip" data-bs-placement="right" title="Dapat bekerja dengan kehadiran binatang peliharaan" style="border: none; padding: 0; background: none; margin-top: 5px;">
                                                    <i class="fas fa-paw m-0" style="font-size: 24;"></i>
                                                </button>
                                            </div>
                                            @endif
                                            <div class="col-1">
                                                @if ($care->pengawasan_kamera == 1)
                                                <button type="button" data-bs-toggle="tooltip" data-bs-placement="right" title="Dapat bekerja di bawah pengawasan kamera" style="border: none; padding: 0; background: none; margin-top: 5px;">
                                                    <i class="bi bi-camera-video-fill m-0" style="font-size: 24;"></i>
                                                </button>
                                                @else
                                                <button type="button" data-bs-toggle="tooltip" data-bs-placement="right" title="Tidak dapat bekerja di bawah pengawasan kamera" style="border: none; padding: 0; background: none; margin-top: 5px;">
                                                    <i class="bi bi-camera-video-off-fill m-0" style="font-size: 24;"></i>
                                                </button>
                                                @endif
                                            </div>
                                            <div class="col-1">
                                                @if ($care->dokumen_vaksin_path == null && $care->dokumen_ijazah_path == null && $care->dokumen_psikotes_path == null && $care->dokumen_akta_kelahiran_path == null)
                                                <button type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="Belum memasukkan dokumen pribadi" style="border: none; padding: 0; background: none; margin-top: 5px;">
                                                    <i class="bi bi-file-earmark-x-fill m-0" style="font-size: 24px;"></i>
                                                </button>
                                                @else
                                                <!-- <p style="font-size: 24; display: inline;">{{ ($care->dokumen_vaksin == null ? 0 : 1 ) + ($care->ijazah == null ? 0 : 1 ) + ($care->dokumen_psikotes == null ? 0 : 1 ) + ($care->akte_lahir == null ? 0 : 1 ) }}</p> -->
                                                <button type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="{{ $care->dokumen_vaksin_path != null ? 'Sertifikat Vaksinasi' : '' }} {{ $care->dokumen_ijazah_path != null ? 'Ijazah' : '' }} {{ $care->dokumen_psikotes_path != null ? 'Psikotes' : '' }} {{ $care->dokumen_akta_kelahiran_path != null ? 'Akta Kelahiran' : '' }}" style="border: none; padding: 0; background: none; margin-top: 5px;">
                                                    <i class="bi bi-file-earmark-check-fill m-0" style="font-size: 24;"></i>
                                                </button>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row" style="font-size: 18px;">
                                            <div class="col">
                                                <p class="m-0">Harapan Rp{{ number_format($care->cost_per_hour, 0, "," ,".") }},00 per jam</p>
                                                <p class="m-0">Mengasuh
                                                    @foreach ( $care->ProfessionCaretakerRelation as $mengasuh)
                                                    {{ $mengasuh->Profession->profession_name }},
                                                    @endforeach
                                                </p>
                                            </div>
                                            <div class="col">
                                                <p class="m-0">
                                                    {{ ucwords(strtolower($care->User->kabupaten)) }}
                                                </p>
                                                <p class="m-0">
                                                    @foreach ($care->RegionCaretakerRelation as $area)
                                                    {{ ucwords(strtolower($area->Region->region_name)) }},
                                                    @endforeach
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row pt-2" style="font-size: 18px; color: #808080;">
                                            <p class="line-clamp">{{ $care->deskripsi_caretaker }}...</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#filter_mengasuh').on('change', function () {
            var mengasuh = $(this).val();
            var url = window.location.protocol + '//' + window.location.host + window.location.pathname;
            var query = new URLSearchParams(window.location.search);
            query.set('mengasuh', mengasuh);
            window.location.href = url + '?' + query.toString();
        });
    });
</script>
@endsection