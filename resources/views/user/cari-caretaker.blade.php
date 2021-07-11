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

<div class="container main col-xxl-12 px-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card mb-5" style="border-radius: 20px; overflow: hidden;">
                <div class="card-header bg-temanbunda d-flex justify-content-between align-items-center py-4">
                    <label class="ps-3 fw-bold">Cari berdasarkan</label>
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
                        <label for="filter_area">Area</label>
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
                <div class="card-body">
                    @foreach ($caretaker as $care)
                    <a href="/user/cari-caretaker/{{$care->caretaker_id}}">
                        <div class="card border-2 mx-4 my-2" style="background-color: #f3f3f3; border-radius: 10px; overflow: hidden;">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3 px-2 text-center">
                                        @if ($care->profile_img_path != null)
                                        <img src="{{ $care->profile_img_path }}" style="border-radius: 50%; object-fit: cover; width: 110px; height: 110px;">
                                        @else
                                        <img src="{{ asset('img/no-profile.png') }}" style="border-radius: 50%; object-fit: cover; width: 110px; height: 110px;">
                                        @endif
                                        <div class="justify-content-center d-flex pt-3">
                                            <i class="bi-star-fill"></i>
                                            <i class="bi-star-fill"></i>
                                            <i class="bi-star-half"></i>
                                            <i class="bi-star"></i>
                                            <i class="bi-star"></i>
                                        </div>
                                        <div class="row text-center">
                                            <p>50 Rating</p>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="row">
                                            <div class="col-8">
                                                <h3 class="card-title pt-2 fw-bold">{{ $care->user->nama_depan }} {{ $care->user->nama_belakang }}, {{ $care->age }}</h5>
                                            </div>
                                            <div class="col-2 text-end">
                                                <p style="font-size: 24; display: inline;">{{ ($care->dokumen_vaksin == null ? 0 : 1 ) + ($care->ijazah == null ? 0 : 1 ) + ($care->dokumen_psikotes == null ? 0 : 1 ) + ($care->akte_lahir == null ? 0 : 1 ) }}</p>
                                                <button type="button" class="zoom" data-bs-toggle="popover" title="Dokumen pribadi" data-bs-content="{{ $care->dokumen_vaksin != null ? 'dokumen_vaksin' : 'Tidak ada bukti vaksin' }}, {{ $care->ijazah != null ? 'ijazah' : 'Tidak ada ijazah' }},
                                                {{ $care->dokumen_psikotes != null ? 'dokumen_psikotes' : 'Tidak ada dokumen psikotes' }},
                                                {{ $care->akte_lahir != null ? 'akte_lahir' : 'Tidak ada akta kelahiran' }}" style="border: none; padding: 0; background: none;">
                                                    <i class="bi bi-file-earmark-check-fill m-0" style="font-size: 24;"></i>
                                                </button>
                                            </div>
                                            <div class="col-1">
                                                @if ($care->pengawasan_kamera == 1)
                                                <button type="button" class="zoom" data-bs-toggle="tooltip" data-bs-placement="right" title="Bersedia bekerja di bawah pengawasan kamera" style="border: none; padding: 0; background: none; margin-top: 5px;">
                                                    <i class="bi bi-camera-video-fill m-0" style="font-size: 24;"></i>
                                                </button>
                                                @else
                                                <button type="button" class="zoom" data-bs-toggle="tooltip" data-bs-placement="right" title="Tidak dapat bekerja di bawah pengawasan kamera" style="border: none; padding: 0; background: none; margin-top: 5px;">
                                                    <i class="bi bi-camera-video-off-fill m-0" style="font-size: 24;"></i>
                                                </button>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row" style="font-size: 18px;">
                                            <div class="col">
                                                <p class="m-0">Harapan Rp. {{ number_format($care->cost_per_hour, 0, "," ,".") }},00 per jam</p>
                                                <p class="m-0">Mengasuh

                                                    @foreach ( $care->professionCaretakerRelation as $mengasuh)
                                                    {{ $mengasuh->profession->profession_name }},
                                                    @endforeach
                                                </p>
                                            </div>
                                            <div class="col">
                                                <p class="m-0">
                                                    {{ ucwords(strtolower($care->user->kabupaten)) }}
                                                </p>
                                                <p class="m-0">
                                                    @foreach ($care->regionCaretakerRelation as $area)
                                                    {{ ucwords(strtolower($area->region->region_name)) }},
                                                    @endforeach
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row pt-2" style="font-size: 18px; color: #808080;">
                                            <p>{{ substr($care->deskripsi_caretaker, 0, 116) }}...</p>
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

@endsection