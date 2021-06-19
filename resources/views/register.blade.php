@extends('navbar.master')

@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

        // sembunyikan form kabupaten, kecamatan dan desa
        $("#form_kab").hide();
        $("#form_kec").hide();
        $("#form_des").hide();

        // ambil data kabupaten ketika data memilih provinsi
        $('body').on("change", "#form_prov", function() {
            var id = $(this).val();
            var data = "id=" + id + "&data=kabupaten";
            $.ajax({
                type: 'POST',
                url: "get_daerah.php",
                data: data,
                success: function(hasil) {
                    $("#form_kab").html(hasil);
                    $("#form_kab").show();
                    $("#form_kec").hide();
                    $("#form_des").hide();
                }
            });
        });

        // ambil data kecamatan/kota ketika data memilih kabupaten
        $('body').on("change", "#form_kab", function() {
            var id = $(this).val();
            var data = "id=" + id + "&data=kecamatan";
            $.ajax({
                type: 'POST',
                url: "get_daerah.php",
                data: data,
                success: function(hasil) {
                    $("#form_kec").html(hasil);
                    $("#form_kec").show();
                    $("#form_des").hide();
                }
            });
        });

        // ambil data desa ketika data memilih kecamatan/kota
        $('body').on("change", "#form_kec", function() {
            var id = $(this).val();
            var data = "id=" + id + "&data=desa";
            $.ajax({
                type: 'POST',
                url: "get_daerah.php",
                data: data,
                success: function(hasil) {
                    $("#form_des").html(hasil);
                    $("#form_des").show();
                }
            });
        });


    });
</script>

<main class="container">
    <div class="row">
        <div class="col-md-6">
            <img src="/img/register_page_picture.png" class="d-block mx-lg-auto img-fluid" width="600" loading="lazy">
        </div>
        <div class="col-md-6">
            <h2 class="fw-bold pt-5 pb-2 title text-center">Masuk Parent</h2>
            <form action="/register/store" method="post">
                {{ csrf_field() }}

                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <div class="input-group pb-2">
                    <!-- Nama Lengkap !-->
                    <label>Nama Lengkap</label>
                    <!-- <span class="input-group-text">Nama Lengkap</span> -->
                    <input type="text" name="nama" placeholder="Nama lengkap" value="{{ old('nama') }}" class="form-control">
                    <!-- @if($errors->has('nama'))
                    <div class="text-danger">
                        {{ $errors->first('nama')}}
                    </div>
                    @endif -->
                </div>
                <div class="input-group pb-2">
                    <span class="input-group-text">Password</span>
                    <input type="password" id="password" name="password" placeholder="••••••••" required="required" class="form-control">
                </div>
                <div class="input-group pb-2">
                    <!-- Email !-->
                    <span class="input-group-text">Email</span>
                    <input type="email" name="email" placeholder="example" value="{{ old('email') }}" class="form-control">
                </div>
                <div class="input-group pb-2">
                    <!-- Nomor Telepon!-->
                    <span class="input-group-text">Nomor Telepon</span>
                    <input type="number" name="no_telepon" placeholder="012-3456-7890" value="{{ old('no_telepon') }}" class="form-control">
                </div>
                <div class="input-group pb-2">
                    <!-- Alamat rumah !-->
                    <span class="input-group-text">Alamat rumah</span>
                    <textarea name="alamat" placeholder="Jl. Pelangi Raya" class="form-control"></textarea>
                </div>
                <div class="input-group pb-2">
                    <!-- Provinsi, Kabupaten, Kecamatan !-->
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
                </div>
                <div class="row">
                    <div class="col">
                        <div class="input-group pb-2">
                            <span class="input-group-text">Tanggal lahir</span>
                            <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
                        </div>
                    </div>
                    <div class="col">
                        <div class="input-group pb-2">
                            <span class="input-group-text">Jenis kelamin</span>
                            <select name="jenis_kelamin" value="{{ old('jenis_kelamin') }}">
                                <option selected="selected">Pilih jenis kelamin</option>
                                <option value="lakilaki">Laki-laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- <div class="input-group pb-2">
                    <span class="input-group-text">Confirm Password</span>
                    <input type="password" id="confirm_password" name="cPassword" placeholder="••••••••" required="required" class="form-control">
                </div> -->
                <input type="submit" value="Register">
            </form>
        </div>
    </div>
</main>

@endsection