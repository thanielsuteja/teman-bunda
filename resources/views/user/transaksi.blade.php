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
                <div class="card-header row bg-temanbunda p-0 align-items-center" style="height: 107px;">
                    <p class="m-0 ms-5" style="font-size: 36px;">Riwayat Transaksi</p>
                </div>
                <div class="card-body" style="min-height: 532px;">
                    @foreach ($transaction as $transaction)
                    <a href="/user/info-transaksi/{{$transaction->transaction_id}}" class="text-decoration-none" style="color: black;">
                        <div class="card border-2 mx-4 my-4 zoom" style="background-color: #f3f3f3; border-radius: 10px; overflow: hidden;">
                            <div class="card-header d-flex align-items-center p-0" style="background-color: #ffeea8;">
                                <div class="col-sm-10 border-end border-5 border-white">
                                    <p class="my-2 ps-4" style="font-size: 26px;">{{ $transaction->JobOffer->judul_pekerjaan }}</p>
                                </div>
                                <div class="col-sm-2 text-center p-0">
                                    @if ($transaction->transaction_status == "menunggu")
                                    <p class="text-808080 fw-bold" style="font-size: 17px; margin: 0;">{{ ucfirst($transaction->transaction_status) }}</p>
                                    @elseif ($transaction->transaction_status == "terbayar")
                                    <p class="fw-bold" style="color: #0063BE; font-size: 17px; margin: 0;">{{ ucfirst($transaction->transaction_status) }}</p>
                                    @elseif ($transaction->transaction_status == "terverifikasi")
                                    <p class="fw-bold" style=" color: #0EAD00; font-size: 17px; margin: 0;">{{ ucfirst($transaction->transaction_status) }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3 px-2 text-center">
                                        @if ($transaction->JobOffer->Caretaker->User->profile_img_path != null)
                                        <img src="{{ asset('storage/foto_profil/'.$transaction->JobOffer->Caretaker->User->profile_img_path) }}" class="profile-pic border border-5">
                                        @else
                                        <img src="{{ asset('img/no-profile.png') }}" class="profile-pic border border-5">
                                        @endif
                                    </div>
                                    <div class="col-md-9">
                                        <table>
                                            <tr>
                                                <td class="text-808080">Nomor transaksi</td>
                                                <td>{{ $transaction->transaction_id }}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-808080">Nama Caregiver</td>
                                                <td>{{ $transaction->JobOffer->Caretaker->User->nama_depan }} {{ $transaction->JobOffer->Caretaker->User->nama_belakang }}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-808080">Tanggal bekerja</td>
                                                <td>{{ $transaction->JobOffer->tanggal_masuk }} - {{ $transaction->JobOffer->tanggal_berakhir }}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-808080">Jumlah yang dibayar</td>
                                                <td>{{ number_format($transaction->JobOffer->estimasi_biaya, 0, ",", ".") }},00</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection