@extends ('layout.master')
@section ('title','Profile | Teman Bunda')
@include ('layout.navbar.navbar-user')
@include ('layout.sidebar.sidebar-user')

@section ('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
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
    });
</script>
<div class="container main col-xxl-12 px-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card mb-3" style="border: 1px solid #C4C4C4; border-radius: 30px;">
                <div class="card-body p-5">
                    <h5 class="card-title">My Profile</h5>
                    <hr>
                    <div class="row mb-3">
                        <div class="col-md row">
                            <label class="col-md-6 col-form-label mb-3">Member Since</label>
                            <div class="col-md-6">
                                <input type="text" value="{{ date('d/m/Y', strtotime($user->created_at)) }}" class="form-control" disabled readonly>
                            </div>
                            <label class="col-md-6 col-form-label mb-3">User ID</label>
                            <div class="col-md-6">
                                <input type="text" value="{{ $user->user_id }}" class="form-control" disabled readonly>
                            </div>
                            <label class="col-md-6 col-form-label">Email</label>
                            <div class="col-md-6">
                                <input type="text" name="cost_per_hour" value="{{ $user->email }}" disabled class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="d-flex justify-content-center image-container">
                                <a type="button" class="" data-bs-toggle="modal" href="#editFotoModal">
                                    @if ($user->profile_img_path != null)
                                    <img src="{{ asset('storage/foto_profil/'.$user->profile_img_path) }}" class="p-0 image" style="border-radius: 50%; object-fit: cover; width: 140px; height: 140px; border: 1px solid black">
                                    @else
                                    <img src="{{ asset('img/no-profile.png') }}" class="p-0 image" style="border-radius: 50%; object-fit: cover; width: 140px; height: 140px; border: 1px solid black">
                                    @endif
                                    <div class="profile-text middle">
                                        <i class="bi bi-plus-lg text-808080 m-0" style="font-size: 50px; width: fit-content; height: fit-content;"></i>
                                    </div>
                                </a>
                            </div>
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
                            @if ($user->jenis_kelamin == 'laki-laki')
                            <input type="text" name="jenis_kelamin" value="Laki-laki" class="form-control" disabled readonly>
                            @else
                            <input type="text" name="jenis_kelamin" value="Perempuan" class="form-control" disabled readonly>
                            @endif
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="text-secondary d-inline-block">Alamat</h5>
                        <button type="button" class="btn btn-warning d-inline-block" data-bs-toggle="modal" data-bs-target="#alamatModal">Edit</button>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-md-4 col-form-label">Alamat</label>
                        <div class="col-md-8">
                            <input type="text" name="alamat" value="{{ $user->alamat }}" disabled class="form-control">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-md-4 col-form-label">Kota</label>
                        <div class="col-md-4">
                            <input type="text" name="kabupaten" value="{{ $user->kabupaten }}" disabled class="form-control">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-md-4 col-form-label">Kecamatan</label>
                        <div class="col-md-4">
                            <input type="text" name="kecamatan" value="{{ $user->kecamatan }}" disabled class="form-control">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-md-4 col-form-label">Provinsi</label>
                        <div class="col-md-4">
                            <input type="text" name="provinsi" value="{{ $user->provinsi }}" disabled class="form-control">
                        </div>
                    </div>
                    <hr>
                    <h5 class="text-secondary">Dokumen</h5>
                    <div class="row">
                        <div class="col-4">
                            @if ($user->dokumen_ktp_path == null)
                            <div class="box-placeholder"></div>
                            @else
                            <img src="{{ asset('storage/ktp/'.$user->dokumen_ktp_path) }}" alt="" style="object-fit: cover; width: 80px; height: 80px; border: 1px solid black">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
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
            <form action="{{ route('user.profile-foto') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="file" name="profile_img_path" id="profile_img_path" class="d-none">
                    <div id="btn-change" style="cursor: pointer">
                        @if ($user->profile_img_path != null)
                        <img src="{{ asset('storage/foto_profil/'.$user->profile_img_path) }}" class="img-fluid">
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

<div class="modal fade" id="alamatModal" tabindex="-1" aria-labelledby="alamatModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="alamatModalLabel">Edit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/user/ganti-alamat/{{ $user->user_id }}" method="post">
                <div class="modal-body">
                    <h5 class="text-secondary">Alamat</h5>
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
                            <select name="provinsi" id="provinsi" class="form-select">
                                <option value="">Pilih provinsi</option>
                                @foreach ($province as $id => $name)
                                <option value="{{ $id }}">{{ $name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-md-4 col-form-label">Kota</label>
                        <div class="col-md-4">
                            <select name="kabupaten" id="kabupaten" class="form-select">
                                <option value="">Pilih kabupaten</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-md-4 col-form-label">Kecamatan</label>
                        <div class="col-md-4">
                            <select name="kecamatan" id="kecamatan" class="form-select">
                                <option value="">Pilih kecamatan</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-md-4 col-form-label">Kelurahan</label>
                        <div class="col-md-4">
                            <select name="kelurahan" id="kelurahan" class="form-select">
                                <option value="">Pilih kelurahan</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-default" data-bs-dismiss="modal">Cancel</button>
                    <input type="submit" value="Simpan" class="btn bg-temanbunda">
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $('#btn-change').click(function(e) {
        $('#profile_img_path').click();
    });
    $('#profile_img_path').change(function(e) {
        var src = window.URL.createObjectURL(this.files[0]);
        $('#btn-change').html(`<img src="${src}" class="img-fluid" />`);
    });
</script>
@endsection