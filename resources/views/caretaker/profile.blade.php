@extends ('layout.master')
@section ('title','Profile | Teman Bunda')
@include ('layout.navbar.navbar-caretaker')
@include ('layout.sidebar.sidebar-caretaker')

@section ('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .box-palceholder {
            display: block;
            width: 100%;
            height: 100px;
            background: #C4C4C4;
        }
    </style>
    <script>
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#provinsi').on('click', function() {
                $.ajax({
                    url: '{{ route("getKabupaten") }}',
                    method: 'POST',
                    data: {
                        id: $(this).val()
                    },
                    success: function(response) {
                        $('#kabupaten').empty();

                        $.each(response, function(id, name) {
                            $('#kabupaten').append(new Option(name, id))
                        })
                    }
                })
            });

            $('#kabupaten').on('click', function() {
                $.ajax({
                    url: '{{ route("getKecamatan") }}',
                    method: 'POST',
                    data: {
                        id: $(this).val()
                    },
                    success: function(response) {
                        $('#kecamatan').empty();
                        $.each(response, function(id, name) {
                            $('#kecamatan').append(new Option(name, id))
                        })
                    }
                })
            });

            $('#kecamatan').on('click', function() {
                $.ajax({
                    url: '{{ route("getKelurahan") }}',
                    method: 'POST',
                    data: {
                        id: $(this).val()
                    },
                    success: function(response) {
                        $('#kelurahan').empty();
                        $.each(response, function(id, name) {
                            $('#kelurahan').append(new Option(name, id))
                        })
                    }
                })
            });

            $('#flexSwitchCheckTerbuka').on('change', function (e) {
                e.preventDefault();
                $.ajax({
                    url: '{{ route("caretaker.profile-terbuka") }}',
                    method: 'POST',
                    success: function(response) {
                        if (response) {
                            document.location.reload();
                        }
                    }
                })
            });
        });
    </script>
    <div class="container main col-xxl-12 px-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card" style="border: 1px solid #C4C4C4; border-radius: 30px;">
                    <div class="card-body">
                        <h5 class="card-title">My Profile</h5>
                        <hr>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <div class="mb-2">
                                    @if ($user->profile_img_path != null)
                                        <img src="{{ asset('storage/foto_profile/'.$user->profile_img_path) }}" style="border-radius: 50%; object-fit: cover; width: 80px; height: 80px; border: 1px solid black">
                                    @else
                                        <img src="{{ asset('img/no-profile.png') }}" style="border-radius: 50%; object-fit: cover; width: 80px; height: 80px; border: 1px solid black">
                                    @endif
                                </div>
                                <button type="button" class="btn btn-outline-warning d-inline-block mb-3" data-bs-toggle="modal" data-bs-target="#editFotoModal">Edit Foto</button>
                            </div>
                            <div class="col-md-4">
                                <div class="d-flex justify-content-between">
                                    <p class="m-0 d-inline">Terbuka untuk bekerja</p>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckTerbuka" {{ $user->Caretaker->caretaker_status == 1 ? 'checked' : '' }}>
                                    </div>
                                </div>
                                <p class="text-secondary" style="font-size: 12px">Apabila switch ini dimatikan, kamu tidak akan muncul di pencarian Caregiver pada halaman pengguna.</p>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-md-4 col-form-label">Member Since</label>
                            <div class="col-md-4">
                                <input type="text" value="{{ date('d-m-Y', strtotime($user->Caretaker->created_at)) }}" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-md-4 col-form-label">User ID</label>
                            <div class="col-md-4">
                                <input type="text" value="{{ $user->user_id }}" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-md-4 col-form-label">Email</label>
                            <div class="col-md-4">
                                <input type="text" value="{{ $user->email }}" class="form-control" disabled>
                            </div>
                        </div>
                        <hr>
                        <div class="mb-3 row">
                            <label class="col-md-4 col-form-label">Nama Lengkap</label>
                            <div class="col-md-4">
                                <input type="text" name="nama_depan" value="{{ $user->nama_depan }}" disabled class="form-control">
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="nama_belakang" value="{{ $user->nama_belakang }}" disabled class="form-control">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-md-4 col-form-label">Nomor Telepon</label>
                            <div class="col-md-4">
                                <input type="number" name="nomor_telepon" value="{{ $user->nomor_telepon }}" disabled class="form-control">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-md-4 col-form-label">Tanggal Lahir</label>
                            <div class="col-md-4">
                                <input type="date" name="tanggal_lahir" value="{{ date('Y-m-d', strtotime($user->tanggal_lahir)) }}" disabled class="form-control">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-md-4 col-form-label">Jenis Kelamin</label>
                            <div class="col-md-4">
                                <select name="jenis_kelamin" disabled class="form-control">
                                    @if ($user->jenis_kelamin == 'laki-laki')
                                        <option value="laki-laki" selected>Laki-Laki</option>
                                    @else
                                        <option value="laki-laki">Laki-Laki</option>
                                    @endif
                                    @if ($user->jenis_kelamin == 'perempuan')
                                        <option value="perempuan" selected>Perempuan</option>
                                    @else
                                        <option value="perempuan">Perempuan</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="text-secondary d-inline-block">Area Layanan</h5>
                            <button type="button" class="btn btn-warning d-inline-block" data-bs-toggle="modal" data-bs-target="#areaLayananModal">Edit</button>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-md-4 col-form-label">Alamat</label>
                            <div class="col-md-8">
                                <input type="text" name="alamat" value="{{ $user->alamat }}" disabled class="form-control">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-md-4 col-form-label">Kelurahan</label>
                            <div class="col-md-4">
                                <input type="text" name="kelurahan" value="{{ $user->kelurahan }}" disabled class="form-control">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-md-4 col-form-label">Kecamatan</label>
                            <div class="col-md-4">
                                <input type="text" name="kecamatan" value="{{ $user->kecamatan }}" disabled class="form-control">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-md-4 col-form-label">Kota</label>
                            <div class="col-md-4">
                                <input type="text" name="kabupaten" value="{{ $user->kabupaten }}" disabled class="form-control">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-md-4 col-form-label">Provinsi</label>
                            <div class="col-md-4">
                                <input type="text" name="provinsi" value="{{ $user->provinsi }}" disabled class="form-control">
                            </div>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="text-secondary">Detail Profile</h5>
                            <button type="button" class="btn btn-warning d-inline-block" data-bs-toggle="modal" data-bs-target="#detailProfileModal">Edit</button>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-md-4 col-form-label">Tarif</label>
                            <div class="col-md-4">
                                <input type="number" name="cost_per_hour" value="{{ $user->Caretaker->cost_per_hour }}" disabled class="form-control">
                            </div>
                            <div class="col-md-4 col-form-label">/ jam</div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-md-4 col-form-label">Profesi</label>
                            <div class="col-md-4">
                                <input type="text" value="{{ $user->Caretaker->ProfessionNames }}" disabled class="form-control">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-md-4 col-form-label">Pengawasan Kamera</label>
                            <div class="col-md-4">
                                <select name="pengawasan_kamera" disabled class="form-control">
                                    @if ($user->Caretaker->pengawasan_kamera == 1)
                                        <option value="1" selected>Bersedia</option>
                                    @else
                                        <option value="1">Bersedia</option>
                                    @endif
                                    @if ($user->Caretaker->pengawasan_kamera == 0)
                                        <option value="0" selected>Tidak Bersedia</option>
                                    @else
                                        <option value="0">Tidak Bersedia</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-md-4 col-form-label">Deskripsi</label>
                            <div class="col-md-8">
                                <textarea name="deskripsi_caretaker" rows="5" disabled class="form-control">{{ $user->Caretaker->deskripsi_caretaker }}</textarea>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-md-4 col-form-label">Tinggi Badan</label>
                            <div class="col-md-2">
                                <input type="text" name="tinggi" value="{{ $user->Caretaker->tinggi }}" disabled class="form-control">
                            </div>
                            <div class="col-md-4 col-form-label">cm</div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-md-4 col-form-label">Berat Badan</label>
                            <div class="col-md-2">
                                <input type="text" name="berat" value="{{ $user->Caretaker->berat }}" disabled class="form-control">
                            </div>
                            <div class="col-md-4 col-form-label">kg</div>
                        </div>
                        <hr>
                        <h5 class="text-secondary">Dokumen</h5>
                        <div class="row">
                            <div class="col-3">
                                @if ($user->dokumen_ktp_path == null)
                                    <div class="box-palceholder"></div>
                                @else
                                    <img src="{{ asset('storage/ktp/'.$user->dokumen_ktp_path) }}" alt="" class="img-fluid">
                                @endif
                                <p class="text-center">KTP</p>
                            </div>
                            <div class="col-3">
                                @if ($user->Caretaker->dokumen_vaksin_path == null)
                                    <div class="box-palceholder"></div>
                                @else
                                    <img src="{{ asset('storage/vaksin/'.$user->Caretaker->dokumen_vaksin_path) }}" alt="" class="img-fluid">
                                @endif
                                <p class="text-center">Vaksinasi</p>
                            </div>
                            <div class="col-3">
                                @if ($user->Caretaker->dokumen_psikotes_path == null)
                                    <div class="box-palceholder"></div>
                                @else
                                    <img src="{{ asset('storage/psikotes/'.$user->Caretaker->dokumen_psikotes_path) }}" alt="" class="img-fluid">
                                @endif
                                <p class="text-center">Psikotes</p>
                            </div>
                            <div class="col-3">
                                @if ($user->Caretaker->dokumen_ijazah_path == null)
                                    <div class="box-palceholder"></div>
                                @else
                                    <img src="{{ asset('storage/ijazah/'.$user->Caretaker->dokumen_ijazah_path) }}" alt="" class="img-fluid">
                                @endif
                                <p class="text-center">Ijazah</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="areaLayananModal" tabindex="-1" aria-labelledby="areaLayananModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="areaLayananModalLabel">Edit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('caretaker.profile-area') }}" method="post">
                    <div class="modal-body">
                        <h5 class="text-secondary">Area Layanan</h5>
                        @csrf
                        <div class="mb-3 row">
                            <label class="col-md-4 col-form-label">Alamat</label>
                            <div class="col-md-8">
                                <input type="text" name="alamat" value="{{ $user->alamat }}" class="form-control">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-md-4 col-form-label">Provinsi</label>
                            <div class="col-md-4">
                                <select name="provinsi" id="provinsi" class="form-control">
                                    <option value="">Pilih Provinsi</option>
                                    @foreach ($provinces as $id => $name)
                                        <option value="{{ $id }}">{{ $name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-md-4 col-form-label">Kota</label>
                            <div class="col-md-4">
                                <select name="kabupaten" id="kabupaten" class="form-control">
                                    <option value="">Pilih Kabupaten</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-md-4 col-form-label">Kecamatan</label>
                            <div class="col-md-4">
                                <select name="kecamatan" id="kecamatan" class="form-control">
                                    <option value="">Pilih Kecamatan</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-md-4 col-form-label">Kelurahan</label>
                            <div class="col-md-4">
                                <select name="kelurahan" id="kelurahan" class="form-control">
                                    <option value="">Pilih Kelurahan</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editFotoModal" tabindex="-1" aria-labelledby="editFotoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editFotoModalLabel">Edit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('caretaker.profile-foto') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <input type="file" name="profile_img_path" id="profile_img_path" class="d-none">
                        <div id="btn-change" style="cursor: pointer">
                            @if ($user->profile_img_path != null)
                                <img src="{{ asset('storage/foto_profile/'.$user->profile_img_path) }}" class="img-fluid">
                            @else
                                <img src="{{ asset('img/no-profile.png') }}" class="img-fluid">
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="detailProfileModal" tabindex="-1" aria-labelledby="detailProfileModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailProfileModalLabel">Edit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('caretaker.profile-detail') }}" method="post">
                    <div class="modal-body">
                        <h5 class="text-secondary">Detail Profile</h5>
                        @csrf
                        <div class="mb-3 row">
                            <label class="col-md-4 col-form-label">Tarif</label>
                            <div class="col-md-4">
                                <input type="number" name="cost_per_hour" value="{{ $user->Caretaker->cost_per_hour }}" class="form-control">
                            </div>
                            <div class="col-md-4 col-form-label">/ jam</div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-md-4 col-form-label">Profesi</label>
                            <div class="col-md-8">
                                @foreach ($professions as $profession)
                                    <div class="form-check form-check-inline">
                                        @if (in_array($profession->profession_id, $user->Caretaker->ProfessionCaretakerRelation->pluck('profession_id')->toArray()))
                                            <input class="form-check-input" type="checkbox" name="profession_id[]" id="inlineCheckbox{{ $profession->profession_id  }}" value="{{ $profession->profession_id }}" checked>
                                        @else
                                            <input class="form-check-input" type="checkbox" name="profession_id[]" id="inlineCheckbox{{ $profession->profession_id  }}" value="{{ $profession->profession_id }}">
                                        @endif
                                        <label class="form-check-label" for="inlineCheckbox{{ $profession->profession_id  }}">{{ $profession->profession_name  }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-md-4 col-form-label">Pengawasan Kamera</label>
                            <div class="col-md-4">
                                <select name="pengawasan_kamera" class="form-control">
                                    @if ($user->Caretaker->pengawasan_kamera == 1)
                                        <option value="1" selected>Bersedia</option>
                                    @else
                                        <option value="1">Bersedia</option>
                                    @endif
                                    @if ($user->Caretaker->pengawasan_kamera == 0)
                                        <option value="0" selected>Tidak Bersedia</option>
                                    @else
                                        <option value="0">Tidak Bersedia</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-md-4 col-form-label">Deskripsi</label>
                            <div class="col-md-8">
                                <textarea name="deskripsi_caretaker" rows="5" class="form-control">{{ $user->Caretaker->deskripsi_caretaker }}</textarea>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-md-4 col-form-label">Tinggi Badan</label>
                            <div class="col-md-2">
                                <input type="text" name="tinggi" value="{{ $user->Caretaker->tinggi }}" class="form-control">
                            </div>
                            <div class="col-md-4 col-form-label">cm</div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-md-4 col-form-label">Berat Badan</label>
                            <div class="col-md-2">
                                <input type="text" name="berat" value="{{ $user->Caretaker->berat }}" class="form-control">
                            </div>
                            <div class="col-md-4 col-form-label">kg</div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $('#btn-change').click(function (e) {
            $('#profile_img_path').click();
        });
        $('#profile_img_path').change(function (e) {
            var src = window.URL.createObjectURL(this.files[0]);
            $('#btn-change').html(`<img src="${src}" class="img-fluid" />`);
        });
    </script>
@endsection