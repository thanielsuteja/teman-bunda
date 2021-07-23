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
        $('#filter_mengasuh').on('change', function() {
            var mengasuh = $(this).val();
            var url = window.location.protocol + '//' + window.location.host + window.location.pathname;
            var query = new URLSearchParams(window.location.search);
            query.set('mengasuh', mengasuh);
            window.location.href = url + '?' + query.toString();
        });
        $('#filter_area').on('change', function() {
            var area = $(this).val();
            var url = window.location.protocol + '//' + window.location.host + window.location.pathname;
            var query = new URLSearchParams(window.location.search);
            query.set('area', area);
            window.location.href = url + '?' + query.toString();
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#filter_mengasuh').on('change', function() {
            var mengasuh = $(this).val();
            var url = window.location.protocol + '//' + window.location.host + window.location.pathname;
            var query = new URLSearchParams(window.location.search);
            query.set('mengasuh', mengasuh);
            window.location.href = url + '?' + query.toString();
        });
    });
</script>
<script type="text/javascript">
    $('ul.pagination').hide();
    $(function() {
        $('.scrolling-pagination').jscroll({
            autoTrigger: true,
            padding: 0,
            nextSelector: '.pagination li.active + li a',
            contentSelector: 'div.scrolling-pagination',
            callback: function() {
                $('ul.pagination').remove();
            }
        });
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jscroll/2.4.1/jquery.jscroll.min.js"></script>

<div class="container main col-xxl-12 px-5 mt-0">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card shadow mb-4" style="border-radius: 20px; overflow: hidden; margin-top: 90px;">
                <div class="card-header bg-temanbunda d-flex align-items-center py-4">
                    <label class="h5 px-3 m-0">Cari berdasarkan</label>
                    <div class="form-floating d-inline-block pe-3" style="width: 200px;">
                        <select name="filter_mengasuh" id="filter_mengasuh" class="form-select rounded-input">
                            <option selected></option>
                            @foreach ($profesi as $id => $name)
                            <option value="{{ $id }}" {{ request()->get('mengasuh') == $id ? 'selected' : '' }}>{{ $name }}</option>
                            @endforeach
                        </select>
                        <label for="filter_mengasuh">Mengasuh</label>
                    </div>
                    <div class="form-floating d-inline-block me-3" style="width: 200px;">
                        <select name="filter_area" id="filter_area" class="form-select rounded-input">
                            <option selected></option>
                            @foreach ($area as $id => $name)
                            <option value="{{ $id }}" {{ request()->get('area') == $id ? 'selected' : '' }}>{{ $name }}</option>
                            @endforeach
                        </select>
                        <label for="filter_area">Area (Kecamatan)</label>
                    </div>
                    <div class="d-inline-block ps-4 pe-3">
                        @if (request()->has('mengasuh') || request()->has('area'))
                        <a href="{{ route('cari-caregiver') }}" class="nav-link link-dark text-decoration-none p-2" data-bs-toggle="tooltip" data-placement="bottom" title="Hapus filter" style="border-radius: 10px;">
                            <i class="bi bi-x-circle m-0" style="font-size: 30;"></i>
                        </a>
                        @else
                        <a href="{{ route('cari-caregiver') }}" class="nav-link link-dark text-decoration-none p-2 disabled" data-bs-toggle="tooltip" data-placement="right" title="Hapus filter" style="border-radius: 10px;">
                            <i class="bi bi-x-circle m-0" style="font-size: 30;"></i>
                        </a>
                        @endif
                    </div>
                    <div class="dropdown d-inline-block pe-4">
                        <button type="button" class="nav-link link-dark text-decoration-none p-2 bg-temanbunda border-0" id="dropdown_filter" data-bs-toggle="dropdown" aria-expanded="false" aria-haspopup="true" data-placement="bottom" title="Urutkan berdasarkan" style="border-radius: 10px;">
                            <i class="bi bi-sort-down m-0" style="font-size: 30;"></i>
                        </button>
                        <ul class="dropdown-menu text-small" aria-labelledby="dropdown_filter">
                            <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['sort' => 'rating-tertinggi']) }}">Rating tertinggi</a></li>
                            <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['sort' => 'harga-terendah']) }}">Harga terendah</a></li>
                            <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['sort' => 'umur-termuda']) }}">Umur termuda</a></li>
                            <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['sort' => 'umur-tertua']) }}">Umur tertua</a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body" style="min-height: 532px;">
                    <div class="scrolling-pagination">
                        @forelse ($caretaker as $care)
                        <a href="/user/info-caregiver/{{$care->caretaker_id}}" class="text-decoration-none" style="color: black;">
                            <div class="card border-2 mx-5 my-3 zoom" style="background-color: #f3f3f3; border-radius: 10px; overflow: hidden; min-height: 190px;">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-auto px-4 text-center">
                                            @if ($care->User->profile_img_path != null)
                                            <img src="{{ asset('storage/foto_profil/'.$care->User->profile_img_path) }}" class="profile-pic border border-5">
                                            @else
                                            <img src="{{ asset('img/no-profile.png') }}" class="profile-pic border border-5">
                                            @endif
                                            <div class="justify-content-center d-flex pt-2">
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
                                                <p class="m-0">
                                                    @if ($care->countReviewUser == 0)
                                                    0 ulasan
                                                    @else
                                                    {{ $care->countReviewUser }} ulasan
                                                    @endif
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-9 ps-0">
                                            <div class="row pb-1 pt-1">
                                                <div class="col">
                                                    <h4 class="card-title m-0 py-1" style="display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical; overflow: hidden;">
                                                        {{ $care->User->nama_depan }} {{ $care->User->nama_belakang }}, {{ $care->age }}
                                                    </h4>
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
                                                    @if ($care->dokumen_vaksin_path == null && $care->dokumen_ijazah_path == null && $care->dokumen_psikotes_path == null && $care->dokumen_skck_path == null)
                                                    <button type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="Belum memasukkan dokumen pribadi" style="border: none; padding: 0; background: none; margin-top: 5px;">
                                                        <i class="bi bi-file-earmark-x-fill m-0" style="font-size: 24px;"></i>
                                                    </button>
                                                    @else
                                                    <button type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="{{ $care->dokumen_vaksin_path != null ? 'Sertifikat Vaksinasi' : '' }} {{ $care->dokumen_ijazah_path != null ? 'Ijazah' : '' }} {{ $care->dokumen_psikotes_path != null ? 'Psikotes' : '' }} {{ $care->dokumen_skck_path != null ? 'SKCK' : '' }}" style="border: none; padding: 0; background: none; margin-top: 5px;">
                                                        <i class="bi bi-file-earmark-check-fill m-0" style="font-size: 24;"></i>
                                                    </button>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row" style="font-size: 16px;">
                                                <div class="col">
                                                    <p class="m-0">Harapan Rp{{ number_format($care->cost_per_hour, 0, "," ,".") }},00 per jam</p>
                                                    <p class="m-0" style="display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical; overflow: hidden;">Mengasuh
                                                        @foreach ( $care->ProfessionCaretakerRelation as $mengasuh)
                                                        {{ $mengasuh->Profession->profession_name }},
                                                        @endforeach
                                                    </p>
                                                </div>
                                                <div class="col">
                                                    <p class="m-0">
                                                        {{ ucwords(strtolower($care->User->kabupaten)) }}
                                                    </p>
                                                    <p class="m-0" style="display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical; overflow: hidden;">
                                                        @foreach ($care->RegionCaretakerRelation as $area)
                                                        {{ ucwords(strtolower($area->Region->region_name)) }},
                                                        @endforeach
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row mt-2" style="font-size: 16px; padding-left: 12px;">
                                                <p class="line-clamp text-808080 mb-0">{{ $care->deskripsi_caretaker }}...</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        @empty
                        MUNCUL APA KEK
                        @endforelse
                        {{ $caretaker->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jscroll/2.4.1/jquery.jscroll.min.js"></script>
<script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
</script>
@endsection