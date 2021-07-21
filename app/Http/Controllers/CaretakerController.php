<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Job_offer;
use App\Models\Transaction;
use App\Models\Profession;
use App\Models\Notification;
use App\Models\Review_caretaker;
use App\Models\Caretaker;
use App\Models\User;
use App\Models\Profession_caretaker_relation;
use Laravolt\Indonesia\Models\Province;
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Village;

class CaretakerController extends Controller
{
    public function showPageHome()
    {
        return view('caretaker.home');
    }

    public function showPageProfile()
    {
        $user = Auth::user();
        $professions = Profession::get();
        $provinces = Province::pluck('name', 'id');

        return view('caretaker.profile', ['user' => $user, 'professions' => $professions, 'provinces' => $provinces]);
    }

    public function updateProfileArea(Request $request)
    {
        $user = Auth::user();

        $user->update([
            'alamat' => $request->alamat,
            'provinsi' => Province::find($request->provinsi)->name,
            'kabupaten' => City::find($request->kabupaten)->name,
            'kecamatan' => District::find($request->kecamatan)->name,
            'kelurahan' => Village::find($request->kelurahan)->name,
        ]);

        return redirect()->route('caretaker.profile');
    }

    public function updateProfileDetail(Request $request)
    {
        $user = Auth::user();
        $caretaker = $user->Caretaker;

        $caretaker->update([
            'cost_per_hour' => $request->cost_per_hour,
            'pengawasan_kamera' => $request->pengawasan_kamera,
            'deskripsi_caretaker' => $request->deskripsi_caretaker,
            'tinggi' => $request->tinggi,
            'berat' => $request->berat,
        ]);
        $caretaker->ProfessionCaretakerRelation()->delete();
        foreach ($request->profession_id as $profession_id) {
            Profession_caretaker_relation::create([
                'profession_id' => $profession_id,
                'caretaker_id' => $caretaker->caretaker_id
            ]);
        }

        return redirect()->route('caretaker.profile');
    }

    public function updateProfileFoto(Request $request)
    {
        $user = Auth::user();

        $request->profile_img_path->store('foto_profile', 'public');

        $user->update([
            'profile_img_path' => $request->profile_img_path->hashName()
        ]);

        return redirect()->route('caretaker.profile');
    }

    public function updateProfileTerbuka(Request $request)
    {
        $user = Auth::user();

        $user->Caretaker->update([
            'caretaker_status' => $user->Caretaker->caretaker_status == 0 ? 1 : 0
        ]);

        return true;
    }

    public function showPageUlasanSaya()
    {
        $reviews = Auth::user()->Caretaker->JobOffers()->with('ReviewUser', 'User')->has('ReviewUser')->get();

        return view('caretaker.ulasan-saya', ['reviews' => $reviews]);
    }

    public function showPageReviewUser($id)
    {
        $user = User::find($id);

        return view('caretaker.review-user', ['user' => $user]);
    }

    public function showPageStatusOrder()
    {
        $jobOffers = Auth::user()->Caretaker->JobOffers()->with('User')->get();

        return view('caretaker.status-order', ['jobOffers' => $jobOffers]);
    }

    public function showPageDetailStatusOrder($id)
    {
        $jobOffer = Job_offer::with('User')->find($id);

        return view('caretaker.detail-status-order', ['jobOffer' => $jobOffer]);
    }

    public function requestSalaryStatusOrder($id, Request $request)
    {
        $jobOffer = Job_offer::find($id);
        $jobOffer->update([
            'job_status' => 'ubah gaji',
            'permintaan_gaji_baru' => $request->price
        ]);

        $user = Auth::user();

        Notification::create([
            'notification_type' => 'Permintaan Perubahan Gaji',
            'content' => 'Caregiver '.$user->nama_depan.' '.$user->nama_belakang.' meminta perubahan gaji baru',
            'user_id' => $jobOffer->user_id,
            'caretaker_id' => null,
            'url' => route('order-info', $jobOffer->job_id)
        ]);

        return redirect()->route('caretaker.status-order');
    }

    public function rejectedStatusOrder($id)
    {
        $jobOffer = Job_offer::find($id);
        $jobOffer->update([
            'job_status' => 'ditolak'
        ]);

        $user = Auth::user();

        Notification::create([
            'notification_type' => 'Penawaran Kerja Ditolak',
            'content' => 'Penawaran kerja untuk '.$user->nama_depan.' '.$user->nama_belakang.' telah ditolak. Mungkin Caregiver belum cocok.',
            'user_id' => $jobOffer->user_id,
            'caretaker_id' => null,
            'url' => route('order-info', $jobOffer->job_id)
        ]);

        return redirect()->route('caretaker.status-order');
    }

    public function approvedStatusOrder($id)
    {
        $jobOffer = Job_offer::find($id);
        $jobOffer->update([
            'job_status' => 'diterima',
        ]);
        $caretaker = $jobOffer->Caretaker;

        $transaction = Transaction::create([
            'transaction_status' => 'menunggu',
            'job_id' => $jobOffer->job_id,
            'transaction_ammount' => $job->estimasi_biaya,
            'transaction_due' => date('Y-m-d', strtotime('+1 days')),
            'bank_account' => $caretaker->bank_account,
            'virtual_account' => '1234567899'
        ]);

        $user = Auth::user();

        Notification::create([
            'notification_type' => 'Lakukan Pembayaran',
            'content' => 'Penawaran kerja untuk '.$user->nama_depan.' '.$user->nama_belakang.' telah diterima. Segera lakukan pembayaran pada halaman Transaksi',
            'user_id' => $jobOffer->user_id,
            'caretaker_id' => null,
            'url' => route('info-transaksi', $transaction->transaction_id),
        ]);

        return redirect()->route('caretaker.status-order');
    }

    public function showPageRiwayatTransaksi()
    {
        $transactions = Auth::user()->Caretaker->JobOffers()->with('Transaction', 'User')->has('Transaction')->whereIn('job_status', ['diterima', 'selesai', 'berlangsung'])->get();

        return view('caretaker.riwayat-transaksi', ['transactions' => $transactions]);
    }

    public function showPageDetailRiwayatTransaksi($id)
    {
        $transaction = Transaction::with('JobOffer.User')->find($id);

        return view('caretaker.detail-riwayat-transaksi', ['transaction' => $transaction]);
    }

    public function showPageReview($id)
    {
        $job = Job_offer::where('job_id', $id)->first();

        return view('caretaker.review', ['job' => $job]);
    }

    public function sendReview($id, Request $request)
    {
        Review_caretaker::create([
            'job_id' => $id,
            'review_rating' => $request->penilaian,
            'review_content' => $request->ulasan,
        ]);

        return redirect()->route('caretaker.status-order');
    }
}
