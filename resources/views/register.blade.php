@extends('navbar.navbar-top')

@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $('#tbName').on('input change', function () {
            if ($(this).val() != '') {
                $('#submit').prop('disabled', false);
            }
            else {
                $('#submit').prop('disabled', true);
            }
        });
    });
</script>

<main class="container main col-xxl-12 px-0 py-3">
    <div class="row">
        <div class="col-md-6 text-center">
            <img src="/img/register_picture.png" class="d-block mx-lg-auto img-fluid mt-5 pt-5" loading="lazy">
            <p class="fw-normal">Sudah punya akun? <a href="/login" class="text-decoration-none">Masuk</a></p>
        </div>
        <div class="col-md-6">
            <p class="display-5 pt-1 fw-normal pb-2 title text-center">Daftar di Teman Bunda</h2>
            <div class="card bg-grey" id="register-card">
                <div class="card-body mx-4 mt-4">
                    <form action="/register/store" method="post">
                        {{ csrf_field() }}

                        <div class="form-floating mb-3">
                            <input type="text" name="nama" id="nama" placeholder="Nama lengkap" class="form-control rounded-input">
                            <label for="nama">Nama Lengkap</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" id="email" name="email" placeholder="example" class="form-control rounded-input">
                            <label for="email">Email</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" id="password" name="password" placeholder="••••••••" required="required" class="form-control rounded-input">
                            <label for="password">Kata sandi</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" id="no_telepon" name="no_telepon" placeholder="012-3456-7890" class="form-control rounded-input">
                            <label for="no_telepon">Nomor Telepon</label>
                        </div>
                        <!-- <div class="form-floating mb-3">
                            Alamat rumah !
                            <textarea name="alamat" id="alamat" placeholder="Jl. Pelangi Raya" class="form-control"></textarea>
                            <label for="alamat"></label>
                        </div>
                        <div class="input-group mb-3">
                            Provinsi, Kabupaten, Kecamatan !
                            <span class="input-group-text">Provinsi</span>
                            <select name="provinsi"">
                        <option selected=" selected">Pilih Provinsi</option>
                                <option value="DKI Jakarta">DKI Jakarta</option>
                                <option value="Banten">Banten</option>
                                <option value="Jawa Barat">Jawa Barat</option>
                            </select>
                            <span class="input-group-text">Kabupaten</span>
                            <select name="kabupaten"">
                        <option selected=" selected">Pilih Kabupaten/Kota</option>
                                <option value="Kota Jakarta Pusat">Kota Jakarta Pusat</option>
                                <option value="Kota Jakarta Timur">Kota Jakarta Timur</option>
                                <option value="Kota Jakarta Barat">Kota Jakarta Barat</option>
                                <option value="Kota Jakarta Selatan">Kota Jakarta Selatan</option>
                                <option value="Kota Jakarta Utara">Kota Jakarta Utara</option>
                                <option value="Kota Bogor">Kota Bogor</option>
                                <option value="Kabupaten Bogor">Kabupaten Bogor</option>
                                <option value="Kota Depok">Kota Depok</option>
                                <option value="Kota Tangerang">Kota Tangerang</option>
                                <option value="Kota Tangerang Selatan">Kota Tangerang Selatan</option>
                                <option value="Kabupaten Tangerang">Kabupaten Tangerang</option>
                                <option value="Kota Bekasi">Kota Bekasi</option>
                                <option value="Kabupaten Bekasi">Kabupaten Bekasi</option>
                            </select>
                        </div> -->
                        <div class="row">
                            <div class="col">
                                <div class="form-floating mb-3">
                                    <input type="date" class="form-control-lg rounded-input" id="tanggal_lahir" name="tanggal_lahir">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-floating mb-3">
                                    <select class="form-select rounded-input" id="jenis_kelamin" name="jenis_kelamin" aria-label="Floating label select example">
                                        <option selected>Pilih jenis kelamin</option>
                                        <option value="lakilaki">Laki-laki</option>
                                        <option value="perempuan">Perempuan</option>
                                    </select>
                                    <label for="jenis_kelamin">Jenis kelamin</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-check ms-4">
                                <input type="checkbox" name="setuju" id="setuju" class="form-check-input">
                                <label for="setuju" class="form-check-label ms-2">Dengan mencentang ini, kamu menyetujui <a href="/syaratdanketentuan" class="text-decoration-none">Syarat & Ketentuan</a> kami</label>
                            </div>
                        </div>
                        <div class="text-center">
                            <input type="submit" class="btn btn-default text-white mt-4" id="btnDaftar" value="Daftar" style="width: 240px; height: 60px;">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection