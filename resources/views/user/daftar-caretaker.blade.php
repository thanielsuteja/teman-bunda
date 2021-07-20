@extends ('layout.master')
@section ('title', 'Daftar Menjadi Caregiver | Teman Bunda')
@include ('layout.navbar.navbar-user')

@section ('content')
<style>
    body {
        font-size: 15px;
        overflow: hidden;
    }
</style>
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="{{ asset('js/multi-step2.js') }}"></script>
<script>
    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#provinsi').on('change', function() {
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

        $('#kabupaten').on('change', function() {
            $.ajax({
                url: '{{ route("getKecamatan") }}',
                method: 'POST',
                data: {
                    id: $(this).val()
                },
                success: function(response) {
                    $('#kecamatan').empty();
                    $.each(response, function(id, name) {
                        $('#kecamatan').append(`<div class="btn-group-vertical" role="group" aria-label="Basic checkbox toggle button group">
                                        <input type="checkbox" class="btn-check" value="${id}" name="kecamatan_id" id="kecamatan_${id}">
                                        <label class="btn btn-outline-default text-start" for="kecamatan_${id}">${name}</label>
                                    </div>`)
                    })
                }
            })
        });
    });
</script>

<main class="container col-xxl-12 px-0 py-3">
    <div class="row" style="margin-top: 80px;">
        <div class="col-md-6 text-center">
            <p class="display-6 pt-1 fw-normal pb-2 title text-center"> Daftar Menjadi Caregiver </p>
            <img src="/img/daftar-caretaker_1.png" class="d-block mx-lg-auto img-fluid" loading="lazy">
        </div>
        <div class="col-md-6">
            <div class="card bg-ffeea8" id="register-card" style="min-height: 640px;">
                <div class="card-body mx-4 mt-4">
                    <form action="#" method="post" id="msform" enctype="multipart/form-data">
                        @csrf
                        <ul id="progressbar2" class="text-center m-0 ps-5">
                            <li class="active" id="pilih_profesi">
                                <p class="width15 text-dark">Pilih Profesi</p>
                            </li>
                            <li id="isi_formulir_caretaker">
                                <p class="width15 text-dark">Isi Formulir</p>
                            </li>
                            <li id="isi_area">
                                <p class="width15 text-dark">Isi Area Layanan</p>
                            </li>
                            <li id="deskripsi_diri">
                                <p class="width15 text-dark">Isi Deskipsi Diri</p>
                            </li>
                            <li id="upload_dokumen_caretaker">
                                <p class="width15 text-dark">Upload Dokumen</p>
                            </li>
                            <li id="proses">
                                <p class="width15 text-dark">Tunggu Diproses</p>
                            </li>
                        </ul>
                        <fieldset>
                            <div class="row">
                                <h3 class="text-center">Jenis individu apa yang bisa kamu asuh?</h3>
                            </div>
                            <div class="row ms-3 me-2">
                                <div class="form-check">
                                    <input class="form-check-input p-2" type="checkbox" value="1" id="bayi" name="profession_id">
                                    <label class="form-check-label fw-bold ms-2" for="bayi" style="font-size: 17px;">
                                        Bayi <span class="text-808080">0 - 36 bulan</span>
                                    </label>
                                    <p class="text-808080 ms-2">Untuk bayi, kegiatan utama mereka adalah memberi susu, mengganti popok, dan mandi.</p>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input p-2" type="checkbox" value="2" id="anak-anak" name="profession_id>
                                    <label class="form-check-label fw-bold ms-2" for="anak-anak" style="font-size: 17px;">
                                        Anak-anak <span class="text-808080">3 - 7 tahun</span>
                                    </label>
                                    <p class="text-808080 ms-2">Kegiatan utama mereka adalah memberi makan, mengganti popok, memandikan, dan menemani beraktivitas.</p>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input p-2" type="checkbox" value="3" id="anak_sd" name="profession_id">
                                    <label class="form-check-label fw-bold ms-2" for="anak_sd" style="font-size: 17px;">
                                        Anak SD <span class="text-808080">7 - 13 tahun</span>
                                    </label>
                                    <p class="text-808080 ms-2">Pada anak SD kelas 1 - 6, kegiatan utama mereka adalah mengantar dan menjemput, menemani, membantu mengerjakan pekerjaan rumah, serta menuntun keahlian tertentu. </p>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input p-2" type="checkbox" value="4" id="lansia" name="profession_id">
                                    <label class="form-check-label fw-bold ms-2" for="lansia" style="font-size: 17px;">
                                        Lansia <span class="text-808080">60 tahun ke atas</span>
                                    </label>
                                    <p class="text-808080 ms-2">Kegiatan utama mereka adalah memandikan, merawat, dan menemani.</p>
                                </div>
                            </div>
                            <input type="button" name="next" class="next btn bg-temanbunda text-white mt-2 me-3" id="btn_next1" value="Selanjutnya" style="width: 170px; height: 60px;">
                        </fieldset>
                        <fieldset class="mx-3" style="min-height: 466px;">
                            <div class="form-floating mb-3">
                                <select type="text" id="tipe" name="tipe" class="form-select rounded-input" placeholder="profesi sekarang">
                                    <option>Pilih profesi</option>
                                    <option value="Ibu">Ibu rumah tangga</option>
                                    <option value="Mahasiswa">Mahasiswa</option>
                                    <option value="Tenaga profesional">Tenaga profesional</option>
                                    <option value="Normal">Normal</option>
                                </select>
                                <label for="tipe">Profesi sekarang</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select type="text" id="pendidikan" name="pendidikan" class="form-select rounded-input" placeholder="pendidikan terakhir">
                                    <option>Pilih pendidikan terakhir</option>
                                    <option value="SMP">Sekolah Menengah Pertama</option>
                                    <option value="SMK">Sekolah Menengah Kejuruan</option>
                                    <option value="SMA">Sekolah Menengah Atas</option>
                                    <option value="Sarjana">Sarjana</option>
                                    <option value="Magister">Magister</option>
                                    <option value="Doktor">Doktor</option>
                                </select>
                                <label for="pendidikan">Pendidikan terakhir</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" id="NIK" name="NIK" placeholder="nik" class="form-control rounded-input">
                                <label for="NIK">Nomor Induk KTP</label>
                            </div>
                            <div class="input-group mb-3">
                                <input type="number" class="form-control rounded-input" placeholder="Harapan tarif setiap satu jam" id="tarif" name="tarif" aria-describedby="info_tarif" style="height: 58px;">
                                <a id="info_tarif" role="button" tabindex="0" class="btn bg-white d-flex align-items-center" type="button" data-bs-toggle="popover" data-bs-trigger="focus hover" title="Jumlah tarif yang disarankan" data-bs-content="Rp15.000,00 - Rp20.000,00">
                                    <i class="bi bi-info-circle-fill m-0" style="font-size: 24px;"></i>
                                </a>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-floating mb-3">
                                        <input type="number" class="form-control rounded-input" placeholder="a" id="kode_bank" name="kode_bank">
                                        <label for="kode_bank">Kode bank</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="number" class="form-control rounded-input" placeholder="a" id="rekening" name="rekening">
                                        <label for="rekening">Nomor rekening</label>
                                    </div>
                                </div>
                            </div>
                            <div style="height: 5px;"></div>
                            <input type="button" name="previous" class="previous btn btn-secondary text-white mt-4" id="btn_prev2" value="Sebelumnya" style="width: 170px; height: 60px;">
                            <input type="button" name="next" class="next btn bg-temanbunda text-white mt-4" id="btn_next2" value="Selanjutnya" style="width: 170px; height: 60px;">
                        </fieldset>
                        <fieldset class="mx-3" style="min-height: 466px;">
                            <div class="form-floating mb-3">
                                <select name="provinsi" id="provinsi" class="form-select rounded-input" aria - label="Floating label select">
                                    <option value="">Pilih Provinsi</option>
                                    @foreach ($provinsi as $id => $name)
                                    <option value="{{ $id }}">{{ $name }}</option>
                                    @endforeach
                                </select>
                                <label for="provinsi">Provinsi</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select name="kabupaten" id="kabupaten" class="form-select rounded-input" aria - label="Floating label select">
                                    <option value="">Pilih Kabupaten</option>
                                </select>
                                <label for="kabupaten">Kabupaten</label>
                            </div>
                            <div class="mb-3">
                                <button class="btn bg-temanbunda rounded-input" type="button" data-bs-toggle="collapse" data-bs-target="#kecamatan" aria-expanded="false" aria-controls="collapseExample" style="height: 58px; width: 100%;">
                                    Pilih area kerja
                                </button>
                            </div>
                            <div class="collapse" id="kecamatan"></div>
                            <div style="height: 153px;"></div>
                            <input type="button" name="previous" class="previous btn btn-secondary text-white mt-4" id="btn_prev3" value="Sebelumnya" style="width: 170px; height: 60px;">
                            <input type="button" name="next" class="next btn bg-temanbunda text-white mt-4" id="btn_next3" value="Selanjutnya" style="width: 170px; height: 60px;">
                        </fieldset>
                        <fieldset class="mx-3" style="height: 466px;">
                            <div class="form-floating">
                                <textarea class="form-control rounded-input" placeholder="Saya dapat melakukan ini dan itu" name="perkenalan_diri" id="perkenalan_diri" aria-describedby="info_perkenalan_diri" style="height: 150px !important;"></textarea>
                                <label for="perkenalan_diri">Perkenalan dirimu secara singkat dan padat</label>
                                <div id="info_perkenalan_diri" class="form-text ms-3">Perkenalan diri yang baik menaikkan peluang dipekerjakan oleh pengguna</div>
                            </div>
                            <div class="row ms-3 me-2 mt-4">
                                <p class="p-0 mb-0" style="font-size: 16px;">Berikan centang pada pilihan di bawah sesuai dengan kondisimu</p>
                                <div id="info_perkenalan_diri" class="form-text ps-0 mt-0 mb-2">Apabila kamu setuju, pengguna dapat memiliki lebih banyak opsi</div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input p-2" type="checkbox" value="1" id="pengawasan_kamera" name="pengawasan_kamera">
                                    <label class="form-check-label ms-2" for="pengawasan_kamera">
                                        Saya setuju untuk bekerja di bawah pengawasan CCTV
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input p-2" type="checkbox" value="0" id="takut_anjing" name="takut_anjing">
                                    <label class="form-check-label ms-2" for="takut_anjing">
                                        Saya dapat bekerja dengan keberadaan hewan peliharaan
                                    </label>
                                </div>
                            </div>
                            <div style="height: 70px;"></div>
                            <input type="button" name="previous" class="previous btn btn-secondary text-white mt-4" id="btn_prev4" value="Sebelumnya" style="width: 170px; height: 60px;">
                            <input type="button" name="next" class="next btn bg-temanbunda text-white mt-4" id="btn_next4" value="Selanjutnya" style="width: 170px; height: 60px;">
                        </fieldset>
                        <fieldset class="mx-3" style="height: 466px;">
                            <div class=" form-group mb-3">
                                <label for="vaksin">Sertifikat Vaksinasi</label>
                                <input type="file" class="form-control" id="vaksin" name="vaksin">
                            </div>
                            <div class="form-group mb-3">
                                <label for="psikotes">Berkas psikotes</label>
                                <input type="file" class="form-control" id="psikotes" name="psikotes">
                            </div>
                            <div class="form-group mb-3">
                                <label for="ijazah">Ijazah</label>
                                <input type="file" class="form-control" id="ijazah" name="ijazah">
                            </div>
                            <div class="form-group mb-3">
                                <label for="skck">Surat Keterangan Catatan Kepolisian</label>
                                <input type="file" class="form-control" id="skck" name="skck">
                            </div>
                            <div class="form-check">
                                <input class="form-check-input p-2" type="checkbox" id="check_syarat">
                                <label class="form-check-label ms-2" for="check_syarat">
                                    Dengan mencentang ini, kamu menyetujui <a href="/syaratdanketentuan" class="text-decoration-none"> Syarat & Ketentuan </a> kami
                                </label>
                            </div>
                            <div style="height: 45px;"></div>
                            <input type="button" name="previous" class="previous btn btn-secondary text-white mt-4" id="btn_prev4" value="Sebelumnya" style="width: 170px; height: 60px;">
                            <input type="submit" class="btn bg-temanbunda text-white mt-4" id="btn_daftar" value="Daftar" style="width: 170px; height: 60px; float: right;" disabled>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection