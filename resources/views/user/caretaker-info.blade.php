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
                <div class="card-header bg-temanbunda d-flex justify-content-between align-items-center p-0" style="height: 107px;">
                    <div class="col">
                        <a href="{{ url()->previous() }}" class="text-decoration-none fw-bold" style="color: black;">
                            <i class="bi bi-chevron-left ps-2" style="font-size: 36px; height: 36; width: 36;"></i>
                        </a>
                    </div>
                    <div class="col-11">
                        <p style="font-size: 36px; padding-top: 12px;">Informasi</p>
                    </div>
                </div>
                <div class="card-body">
                    <a href="/user/cari-caretaker/{{$care->caretaker_id}}" class="text-decoration-none" style="color: black;">
                        <div class="card border-2 mx-4 my-2 zoom" style="background-color: #f3f3f3; border-radius: 10px; overflow: hidden;">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3 px-2 text-center">
                                        @if ($care->profile_img_path != null)
                                        <img src="{{ asset('$care->profile_img_path') }}" style="border-radius: 50%; object-fit: cover; width: 110px; height: 110px;">
                                        @else
                                        <img src="{{ asset('img/no-profile.png') }}" style="border-radius: 50%; object-fit: cover; width: 110px; height: 110px;">
                                        @endif
                                        <div class="justify-content-center d-flex pt-3">
                                            @for ($i = 1; $i < 6; $i++) @if ($care->meanRating >= $i)
                                                <i class="bi-star-fill" style="color: #FF7A00;"></i>
                                                @elseif (($i - $care->meanRating) >= 1)
                                                <i class="bi-star" style="color: #FF7A00;"></i>
                                                @elseif (fmod($care->meanRating, 1) != 0)
                                                <i class="bi-star-half" style="color: #FF7A00;"></i>
                                                @endif
                                                @endfor
                                        </div>
                                        <div class="row text-center">
                                            <p>{{ $care->JobOffers->reduce(function($total, $joboffer) {
                                                return $total + $joboffer -> ReviewUser->count();    
                                            }, 0) }} Rating</p>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="row">
                                            <div class="col-8">
                                                <h3 class="card-title pt-2 fw-bold">{{ $care->User->nama_depan }} {{ $care->User->nama_belakang }}, {{ $care->age }}</h5>
                                            </div>
                                            <div class="col-2 text-end">
                                                <p style="font-size: 24; display: inline;">{{ ($care->dokumen_vaksin == null ? 0 : 1 ) + ($care->ijazah == null ? 0 : 1 ) + ($care->dokumen_psikotes == null ? 0 : 1 ) + ($care->akte_lahir == null ? 0 : 1 ) }}</p>
                                                <button type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="{{ $care->dokumen_vaksin != null ? 'dokumen_vaksin' : 'Tidak ada bukti vaksin' }}, {{ $care->ijazah != null ? 'ijazah' : 'Tidak ada ijazah' }},
                                                {{ $care->dokumen_psikotes != null ? 'dokumen_psikotes' : 'Tidak ada dokumen psikotes' }},
                                                {{ $care->akte_lahir != null ? 'akte_lahir' : 'Tidak ada akta kelahiran' }}" style="border: none; padding: 0; background: none;">
                                                    <i class="bi bi-file-earmark-check-fill m-0" style="font-size: 24;"></i>
                                                </button>
                                            </div>
                                            <div class="col-1">
                                                @if ($care->pengawasan_kamera == 1)
                                                <button type="button" data-bs-toggle="tooltip" data-bs-placement="right" title="Bersedia bekerja di bawah pengawasan kamera" style="border: none; padding: 0; background: none; margin-top: 5px;">
                                                    <i class="bi bi-camera-video-fill m-0" style="font-size: 24;"></i>
                                                </button>
                                                @else
                                                <button type="button" data-bs-toggle="tooltip" data-bs-placement="right" title="Tidak dapat bekerja di bawah pengawasan kamera" style="border: none; padding: 0; background: none; margin-top: 5px;">
                                                    <i class="bi bi-camera-video-off-fill m-0" style="font-size: 24;"></i>
                                                </button>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row" style="font-size: 18px;">
                                            <div class="col">
                                                <p class="m-0">Harapan Rp. {{ number_format($care->cost_per_hour, 0, "," ,".") }},00 per jam</p>
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
                                            <p>{{ substr($care->deskripsi_caretaker, 0, 116) }}...</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection