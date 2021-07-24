@extends ('layout.master')
@section ('title','Daftar Teman Bunda')
@include ('layout.navbar.navbar')

@section('content')

<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="{{ asset('js/multi-step.js') }}"></script>
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
<script>
    $(document).ready(function() {
        $('#check_syarat').on('change', function() {
            var syarat_value = $("#check_syarat");
            if ($("#check_syarat").is(":checked")) {
                $('#btn_daftar').attr('disabled', false);
            } else {
                $('#btn_daftar').attr('disabled', true);
            }
        });
    })
</script>
<!-- <script>
    $(document).ready(function() {
        $('#email,#nama_depan,#nama_belakang,#password,#nomor_telepon,#tanggal_lahir').on('keyup', function() {
            var namadpn_value = $(" #nama_depan").val();
            var namablkng_value = $("#nama_belakang").val();
            var email_value = $("#email").val();
            var password_value = $("#password").val();
            var telepon_value = $("#nomor_telepon").val();
            var tanggal_lahir_value = $("#tanggal_lahir").val();
            var jenis_kelamin_value = $("#jenis_kelamin").val();
            var syarat_value = $("#check_syarat");
            if (namadpn_value != '' && namablkng_value != '' && email_value != '' && password_value != '' && telepon_value != '' && tanggal_lahir_value != '' && jenis_kelamin_value != '' && $("#check_syarat").is(":checked")) {
                $('#btn_next1').attr('disabled', false);
            } else {
                $('#btn_next1').attr('disabled', true);
            }
        });
        $('#check_syarat,#jenis_kelamin').on('change', function() {
            var namadpn_value = $("#nama_depan").val();
            var namablkng_value = $("#nama_belakang").val();
            var email_value = $("#email").val();
            var password_value = $("#password").val();
            var telepon_value = $("#nomor_telepon").val();
            var tanggal_lahir_value = $("#tanggal_lahir").val();
            var jenis_kelamin_value = $("#jenis_kelamin").val();
            var syarat_value = $("#check_syarat");
            if (namadpn_value != '' && namablkng_value != '' && email_value != '' && password_value != '' && telepon_value != '' && tanggal_lahir_value != '' && jenis_kelamin_value != '' && $("#check_syarat").is(":checked")) {
                $('#btn_next1').attr('disabled', false);
            } else {
                $('#btn_next1').attr('disabled', true);
            }
        });
    });
</script> -->

<main class="container main col-xxl-12 px-0 py-3">
    <div class="row">
        <div class="col-md-6 text-center">
            <p class="display-5 pt-1 fw-normal pb-2 title text-center"> Daftar di Teman Bunda </p>
            <img src="/img/register_page_picture.png" class="d-block mx-lg-auto img-fluid pt-5" loading="lazy">
            <p class="fw-normal"> Sudah punya akun ? <a href="/login" class="text-decoration-none"> Masuk </a>
            </p>
        </div>
        <div class="col-md-6">
            <div class="card bg-ffeea8" id="register-card">
                <div class="card-body mx-4 mt-4">
                    <form action="/register/store" method="post" id="msform" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <ul id="progressbar" class="text-center">
                            <li class="active" id="isi_formulir">
                                <strong> Isi Formulir </strong>
                            </li>
                            <li id="isi_alamat">
                                <strong> Isi Alamat </strong>
                            </li>
                            <li id="upload_dokumen">
                                <strong> Upload Dokumen </strong>
                            </li>
                        </ul>
                        <fieldset>
                            <div class="row">
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="text" name="nama_depan" id="nama_depan" placeholder="Nama Depan" class="form-control rounded-input">
                                        <label for="nama_depan"> Nama Depan </label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="text" name="nama_belakang" id="nama_belakang" placeholder="Nama Belakang" class="form-control rounded-input">
                                        <label for="nama_belakang"> Nama Belakang </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" id="email" name="email" placeholder="example" class="form-control rounded-input">
                                <label for="email"> Email </label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" id="password" name="password" placeholder="••••••••" required="required" class="form-control rounded-input">
                                <label for="password"> Kata sandi </label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="number" id="nomor_telepon" name="nomor_telepon" placeholder="012-3456-7890" class="form-control rounded-input">
                                <label for="nomor_telepon"> Nomor Telepon </label>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="date" class="form-control rounded-input" id="tanggal_lahir" name="tanggal_lahir">
                                        <label for="tanggal_lahir"> Tanggal lahir </label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <select class="form-select rounded-input" id="jenis_kelamin" name="jenis_kelamin" aria - label="Floating label select example">
                                            <option value=""> Pilih jenis kelamin </option>
                                            <option value="lakilaki"> Laki-laki </option>
                                            <option value="perempuan"> Perempuan </option>
                                        </select>
                                        <label for="jenis_kelamin"> Jenis kelamin </label>
                                    </div>
                                </div>
                            </div>
                            @if (count($errors) > 0)
                            <div class="alert alert-danger" role="alert">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li class="text-danger" style="font-size: 14px;">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <input type="button" name="next" class="next btn bg-temanbunda text-white mt-4" id="btn_next1" value="Selanjutnya" style="width: 170px; height: 60px;">
                        </fieldset>
                        <fieldset>
                            <div class="form-floating mb-3">
                                <input name="alamat" id="alamat" placeholder="Alamat rumah" class="form-control rounded-input" style="height: 60px">
                                <label for="alamat"> Alamat </label>
                            </div>
                            <div class="form-floating mb-3">
                                <select name="provinsi" id="provinsi" class="form-select rounded-input" aria - label="Floating label select">
                                    <option value="">Pilih Provinsi</option>
                                    @foreach ($provinsi as $id => $name)
                                    <option value="{{ $id }}">{{ $name }}</option>
                                    @endforeach
                                </select>
                                <label for="provinsi"> Provinsi </label>
                            </div>
                            <div class="form-floating mb-3">
                                <select name="kabupaten" id="kabupaten" class="form-select rounded-input" aria - label="Floating label select">
                                    <option value="">Pilih Kabupaten</option>
                                </select>
                                <label for="kabupaten"> Kabupaten </label>
                            </div>
                            <div class="form-floating mb-3">
                                <select name="kecamatan" id="kecamatan" class="form-select rounded-input" aria - label="Floating label select">
                                    <option value="">Pilih Kecamatan</option>
                                </select>
                                <label for="kecamatan"> Kecamatan </label>
                            </div>
                            <div class="form-floating mb-3">
                                <select name="kelurahan" id="kelurahan" class="form-select rounded-input" aria - label="Floating label select">
                                    <option value="">Pilih Kelurahan/Desa</option>
                                </select>
                                <label for="kelurahan"> Kelurahan / Desa </label>
                            </div>
                            <input type="button" name="previous" class="previous btn btn-secondary text-white mt-4" id="btn_prev" value="Sebelumnya" style="width: 170px; height: 60px;">
                            <input type="button" name="next" class="next btn bg-temanbunda text-white mt-4" id="btn_next2" value="Selanjutnya" style="width: 170px; height: 60px;">
                        </fieldset>
                        <fieldset>
                            <div class="form-group mb-3">
                                <label for="inputGroupFile01">Upload foto profil <span style="font-size: 14px;">.jpeg,jpg,png (opsional)</span></label>
                                <input type="file" class="form-control" id="inputGroupFile01" name="foto_profil">
                            </div>
                            <div class="form-group mb-3">
                                <label for="inputGroupFile02">Upload foto KTP <span style="font-size: 14px;">.jpeg,jpg,png</span></label>
                                <input type="file" class="form-control" id="inputGroupFile02" name="ktp">
                            </div>
                            <div class="form-check ms-4">
                                <input type="checkbox" name="setuju" id="check_syarat" class="form-check-input">
                                <label for="setuju" class="form-check-label ms-2"> Dengan mencentang ini, kamu menyetujui <a href="/syaratdanketentuan" class="text-decoration-none"> Syarat & Ketentuan </a> kami</label>
                            </div>
                            <input type="button" name="previous" class="previous btn btn-secondary text-white mt-4" id="btn_prev2" value="Sebelumnya" style="width: 170px; height: 60px;">
                            <input type="submit" class="btn next bg-temanbunda text-white mt-4" id="btn_daftar" value="Daftar" style="width: 170px; height: 60px;" disabled>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection