@extends ('layout.master')
@section ('title', 'Riwayat Transaksi | Teman Bunda')
@include ('layout.navbar.navbar-user')
@include ('layout.sidebar.sidebar-user')

@section ('content')
<style>
    body {
        background-color: #efefef;
    }
</style>

<div class="container col-xxl-12 px-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card mb-2 shadow" style="border-radius: 20px; overflow: hidden; margin-top: 90px;">
                <div class="card-header bg-temanbunda p-0" style="height: 107px;">
                    <div class="row mt-4">
                        <div class="col-1">
                            <a href="{{ url()->previous() }}" class="text-decoration-none fw-bold" style="color: black;">
                                <i class="bi bi-chevron-left ps-2" style="font-size: 36px; height: 36; width: 36;"></i>
                            </a>
                        </div>
                        <div class="col">
                            <p class="m-0 ms-5" style="font-size: 36px;">Riwayat Transaksi</p>
                        </div>
                    </div>
                </div>
                <div class="card-body mx-5" style="min-height: 532px;">
                    <div class="row" style="margin-top: -50px;">
                        <div class="col-9">
                            <div class="row">
                                <h3>{{ $transaction->JobOffer->Caretaker->User->nama_depan }} {{ $transaction->JobOffer->Caretaker->User->nama_belakang }} <a href="/user/info-caregiver/{{ $transaction->JobOffer->Caretaker->caretaker_id }}" class="btn bg-white d-inline-block" style="color: #ffde59; border-color: #ffde59;">Lihat profil</a></h3>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    @for ($i = 1; $i < 6; $i++) @if ($transaction->JobOffer->Caretaker->meanRating >= $i)
                                        <i class="bi-star-fill" style="color: #FFDE59;"></i>
                                        @elseif (($i - $transaction->JobOffer->Caretaker->meanRating) >= 1)
                                        <i class="bi-star" style="color: #FFDE59;"></i>
                                        @elseif (fmod($transaction->JobOffer->Caretaker->meanRating, 1) != 0)
                                        <i class="bi-star-half" style="color: #FFDE59;"></i>
                                        @endif
                                        @endfor
                                        <p>
                                            {{ $transaction->JobOffer->Caretaker->JobOffers->reduce(function ($total, $jobOffer) {
                                            return $total + ($jobOffer->ReviewUser == null ? 0 : 1);
                                        }) }} Rating
                                        </p>
                                </div>
                                <div class="col">
                                    <p class="text-808080">Nomor Transaksi<span class="text-dark">{{ $transaction->transaction_id }}</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            @if ($transaction->JobOffer->Caretaker->User->profile_img_path != null)
                            <img src="{{ asset('storage/foto_profil/'.$transaction->JobOffer->Caretaker->User->profile_img_path) }}" class="profile-pic-lg border">
                            @else
                            <img src="{{ asset('img/no-profile.png') }}" class="profile-pic border border-5">
                            @endif
                        </div>
                    </div>
                    <div class="row col-6">
                        <table>
                            <tr>
                                @if ($transaction->transaction_status == "menunggu")
                                <td class="text-808080 text-end">Bayar sebelum</td>
                                <td>{{ $transaction->transaction_due }}</td>
                                @else
                                <td class="text-808080 text-end">Waktu pembayaran</td>
                                <td>{{ $transaction->payment_date }}</td>
                                @endif
                            </tr>
                            <tr>
                                <td class="text-808080 text-end">Jumlah dibayar</td>
                                <td>Rp{{ number_format($transaction->JobOffer->estimasi_biaya,0,",",".") }},00</td>
                            </tr>
                            <tr>
                                <td class="text-808080 text-end">Kode bank</td>
                                <td>999</td>
                            </tr>
                            <tr>
                                <td class="text-808080 text-end">Virtual Account</td>
                                <td>{{ $transaction->JobOffer->User->virtual_account }}</td>
                            </tr>
                            <tr>
                                <td class="text-808080 text-end">Status</td>
                                <td>{{ ucfirst($transaction->transaction_status) }}</td>
                            </tr>
                        </table>
                    </div>
                    <hr class="mb-0">
                    @if ($transaction->transaction_status == "menunggu")
                    <p class="text-danger text-center m-0" style="font-size: 14px;">Pesanan kamu otomatis dibatalkan apabila kamu tidak membayar sebelum waktu yang ditentukan</p>
                    @endif
                    <div class="row mt-3">
                        <table>
                            <tr>
                                <td class="text-808080 text-end" style="width: 175px;">Nomor order</td> <!-- utk sesuaikan widthnya, ubah width disini !-->
                                <td>{{ $transaction->JobOffer->job_id }}</td>
                            </tr>
                            <tr>
                                <td class="text-808080 text-end">Alamat</td>
                                <td>{{ $transaction->JobOffer->User->alamat }}, {{ $transaction->JobOffer->User->kelurahan }}, {{ $transaction->JobOffer->User->kecamatan }}</td>
                            </tr>
                            <tr>
                                <td class="text-808080 text-end">Tanggal bekerja</td>
                                <td>{{ $transaction->JobOffer->tanggal_masuk }} - {{ $transaction->JobOffer->tanggal_berakhir }}</td>
                            </tr>
                            <tr>
                                <td class="text-808080 text-end">Jam kerja</td>
                                <td>{{ $transaction->JobOffer->jam_masuk }} - {{ $transaction->JobOffer->jam_berakhir }}</td>
                            </tr>
                            <tr>
                                <td class="text-808080 text-end">Hari masuk</td>
                                <td>
                                @if ($transaction->JobOffer->wd_1 == 1)
                                    Senin
                                    @endif
                                    @if ($transaction->JobOffer->wd_2 == 1)
                                    Selasa
                                    @endif
                                    @if ($transaction->JobOffer->wd_3 == 1)
                                    Rabu
                                    @endif
                                    @if ($transaction->JobOffer->wd_4 == 1)
                                    Kamis
                                    @endif
                                    @if ($transaction->JobOffer->wd_5 == 1)
                                    Jumat
                                    @endif
                                    @if ($transaction->JobOffer->wd_6 == 1)
                                    Sabtu
                                    @endif
                                    @if ($transaction->JobOffer->wd_7 == 1)
                                    Minggu
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="text-808080 text-end" valign="top">Deskripsi pekerjaan</td>
                                <td>{{ $transaction->JobOffer->deskripsi_pekerjaan }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection