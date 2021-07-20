@extends ('layout.master')
@section ('title', 'Daftar Menjadi Caregiver | Teman Bunda')
@include ('layout.navbar.navbar-user')

@section ('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="{{ asset('js/multi-step.js') }}"></script>
<main class="container main col-xxl-12 px-0 py-3">
    <div class="row">
        <div class="col-md-6 text-center">
            <img src="/img/daftar-caretaker_1.png" class="d-block mx-lg-auto img-fluid mt-5 pt-5" loading="lazy">
        </div>
        <div class="col-md-6">
            <p class="display-5 pt-1 fw-normal pb-2 title text-center"> Daftar Menjadi Caregiver </h2>
            <div class="card bg-ffeea8" id="register-card">
                <div class="card-body mx-4 mt-4">
                    <form action="#" method="post" id="msform" enctype="multipart/form-data">
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
                                            <option value="lakilaki"> Laki - laki </option>
                                            <option value="perempuan"> Perempuan </option>
                                        </select>
                                        <label for="jenis_kelamin"> Jenis kelamin </label>
                                    </div>
                                </div>
                            </div>
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
                                <label for="inputGroupFile01">Upload foto profil</label>
                                <input type="file" class="form-control" id="inputGroupFile01" name="foto_profil">
                            </div>
                            <div class="form-group mb-3">
                                <label for="inputGroupFile02">Upload foto KTP</label>
                                <input type="file" class="form-control" id="inputGroupFile02" name="ktp">
                            </div>
                            <div class="form-check ms-4">
                                <input type="checkbox" name="setuju" id="check_syarat" class="form-check-input">
                                <label for="setuju" class="form-check-label ms-2"> Dengan mencentang ini, kamu menyetujui <a href="/syaratdanketentuan" class="text-decoration-none"> Syarat & Ketentuan </a> kami</label>
                            </div>
                            <input type="submit" class="btn bg-temanbunda text-white mt-4" id="btn_daftar" value="Daftar" style="width: 240px; height: 60px;" disabled>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection