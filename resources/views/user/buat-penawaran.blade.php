@extends ('layout.master')
@section ('title', 'Buat penawaran kerja')
@include ('layout.navbar.navbar-user')
@include ('layout.sidebar.sidebar-user')

@section ('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

<style>
    body {
        background-color: #efefef;
    }

    input,
    select,
    textarea {
        background-color: #ebebeb !important;
    }
</style>

<div class="container col-xxl-12 px-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card shadow mb-4" style="border-radius: 20px; overflow: hidden; margin-top: 90px;">
                <div class="card-header bg-temanbunda d-flex align-items-center p-0" style="height: 107px;">
                    <div class="col-1 d-flex align-items-center">
                        <a href="{{ url()->previous() }}" class="text-decoration-none fw-bold" style="color: black;">
                            <i class="bi bi-chevron-left ps-3" style="font-size: 36px; height: 36; width: 36;"></i>
                        </a>
                    </div>
                    <div class="col">
                        <h2 class="m-0 ms-3">Buat Penawaran Kerja</h2>
                    </div>
                </div>
                <div class="card-body mx-5" style=" min-height: 532px;">
                    <form action="/user/buat-penawaran/simpan" method="POST">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ Auth::user()->user_id }}">
                        <input type="hidden" name="caretaker_id" value="{{ $care->caretaker_id }}">
                        <div class="row">
                            <p class="text-808080">Membuat tawaran kerja untuk {{ $care->User->nama_depan }} {{ $care->User->nama_belakang }}</p>
                            <div class="form-floating mb-2">
                                <input type="text" id="judul" name="judul" placeholder="Judul pekerjaan" class="form-control rounded-input">
                                <label class="ps-4" for="judul">Judul pekerjaan</label>
                            </div>
                            <div class="form-floating mb-2">
                                <textarea name="deskripsi_pekerjaan" id="deskripsi_pekerjaan" placeholder="Deskripsi pekerjaan" class="form-control rounded-input" style="height: 150px !important;"></textarea>
                                <label class="ps-4" for="deskripsi_pekerjaan">Deskripsi pekerjaan</label>
                            </div>
                        </div>
                        <div class="row mb-2 align-items-center">
                            <label for="alamat_kerja" class="col-sm-3 text-808080 ps-4">Alamat</label>
                            <div class="col-sm">
                                <input type="text" readonly class="form-control-plaintext" id="alamat_kerja" value="{{ $care->User->alamat }}, {{ ucwords(strtolower($care->User->kelurahan)) }}, {{ ucwords(strtolower($care->User->kecamatan)) }}, {{ ucwords(strtolower($care->User->kabupaten)) }}" style="background-color: white !important;">
                            </div>
                            <div class="col-sm-2">
                                <a href="{{ route('user.profile', Auth::user()->user_id) }}" class="btn btn-outline-default">Ubah</a>
                            </div>
                        </div>
                        <div class="row mb-2 align-items-center">
                            <label for="" class="col-sm-3 text-808080 ps-4">Durasi pekerjaan</label>
                            <div class="form-floating col-sm">
                                <input type="date" id="tanggal_masuk" name="tanggal_masuk" placeholder="" class="form-control rounded-input">
                                <label class="ps-4" for="tanggal_masuk">Tanggal masuk</label>
                            </div>
                            <div class="form-floating col-sm">
                                <input type="date" id="tanggal_berakhir" name="tanggal_berakhir" placeholder="" class="form-control rounded-input">
                                <label class="ps-4" for="tanggal_berakhir">Tanggal berakhir</label>
                            </div>
                        </div>
                        <div class="row mb-2 align-items-center">
                            <label for="" class="col-sm-3 text-808080 ps-4">Jam kerja</label>
                            <div class="form-floating col-sm">
                                <input type="time" id="jam_masuk" name="jam_masuk" placeholder="" class="form-control rounded-input">
                                <label class="ps-4" for="jam_masuk">Jam masuk</label>
                            </div>
                            <div class="form-floating col-sm">
                                <input type="time" id="jam_berakhir" name="jam_berakhir" placeholder="" class="form-control rounded-input">
                                <label class="ps-4" for="jam_berakhir">Jam selesai</label>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label for="" class="col-sm-3 text-808080 ps-4 pt-3">Hari kerja</label>
                            <div class="col-sm d-grip">
                                <button class="btn bg-temanbunda rounded-input fw-bold w-100" type="button" data-bs-toggle="collapse" data-bs-target="#listhari" aria-expanded="false" aria-controls="listhari" style="height: 58px;">
                                    Pilih hari
                                </button>

                                <div class="collapse" id="listhari">
                                    <div class="card card-body d-grip ps-0">
                                        <div class="btn-group-vertical" role="group" aria-label="Basic checkbox toggle button group">
                                            <input type="checkbox" class="btn-check" value="1" name="wd_1" id="wd_1">
                                            <label class="btn btn-outline-default text-start" for="wd_1">Senin</label>

                                            <input type="checkbox" class="btn-check" value="1" name="wd_2" id="wd_2">
                                            <label class="btn btn-outline-default text-start" for="wd_2">Selasa</label>

                                            <input type="checkbox" class="btn-check" value="1" name="wd_3" id="wd_3">
                                            <label class="btn btn-outline-default text-start" for="wd_3">Rabu</label>

                                            <input type="checkbox" class="btn-check" value="1" name="wd_4" id="wd_4">
                                            <label class="btn btn-outline-default text-start" for="wd_4">Kamis</label>

                                            <input type="checkbox" class="btn-check" value="1" name="wd_5" id="wd_5">
                                            <label class="btn btn-outline-default text-start" for="wd_5">Jumat</label>

                                            <input type="checkbox" class="btn-check" value="1" name="wd_6" id="wd_6">
                                            <label class="btn btn-outline-default text-start" for="wd_6">Sabtu</label>

                                            <input type="checkbox" class="btn-check" value="1" name="wd_7" id="wd_7">
                                            <label class="btn btn-outline-default text-start" for="wd_7">Minggu</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm">
                            </div>
                        </div>
                        <div class="row mb-2 align-items-center">
                            <label for="" class="col-sm-3 text-808080 ps-4">Estimasi biaya</label>
                            <div class="col-sm">
                                <input type="text" id="estimasi_biaya" name="estimasi_biaya" class="form-control rounded-input" placeholder="Rp." style="height: 58px;">
                                <!-- JAM_KERJA = jam_berakhir-jam_masuk
                                UPAH_PER_HARI = JAM_KERJA * cost_per_hour -->
                            </div>
                            <div class="col-sm"></div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <input type="submit" value="Kirim" class="btn bg-temanbunda mb-3 fw-bold" style="width: 180px; height: 58px;">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#tanggal_masuk, #tanggal_berakhir').on('change', function(e) {
            var tanggal_masuk = $('#tanggal_masuk').val();
            var tanggal_berakhir = $('#tanggal_berakhir').val();
            if (tanggal_masuk !== '' && tanggal_berakhir !== '') {
                $.ajax({
                    url: '{{ route("buat-penawaran-days") }}',
                    method: 'post',
                    data: {
                        tanggal_masuk,
                        tanggal_berakhir
                    },
                    success: function(data) {
                        $('.btn-group-vertical').empty();
                        $('#estimasi_biaya').val('');
                        for (const [key, value] of Object.entries(data)) {
                            $('.btn-group-vertical').append(`
                                <input type="checkbox" class="btn-check days" value="${key}" name="wd_${key}" id="wd_${key}">
                                <label class="btn btn-outline-default text-start" for="wd_${key}">${value}</label>
                            `);
                        }
                        $('#jam_masuk, #jam_berakhir, input[class="btn-check days"]').on('change', function(e) {
                            var caretaker_id = "{{ $care->caretaker_id }}";
                            var tanggal_masuk = $('#tanggal_masuk').val();
                            var tanggal_berakhir = $('#tanggal_berakhir').val();
                            var jam_masuk = $('#jam_masuk').val();
                            var jam_berakhir = $('#jam_berakhir').val();
                            var days = [];
                            $('input[class="btn-check days"]:checked').each(function() {
                                days.push(this.value);
                            });
                            if (tanggal_masuk !== '' && tanggal_berakhir !== '' && jam_masuk !== '' && jam_berakhir !== '') {
                                $.ajax({
                                    url: '{{ route("buat-penawaran-estimation") }}',
                                    method: 'post',
                                    data: {
                                        caretaker_id,
                                        tanggal_masuk,
                                        tanggal_berakhir,
                                        jam_masuk,
                                        jam_berakhir,
                                        days
                                    },
                                    success: function(data) {
                                        $('#estimasi_biaya').val('');
                                        $('#estimasi_biaya').val(data);
                                    }
                                });
                            }
                        });
                    },
                });
            }
        });
    });
</script>
@endsection