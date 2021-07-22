<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CariCaretakerController;
use App\Http\Controllers\BuatPenawaranController;
use App\Http\Controllers\DaftarCaretakerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderUserController;
use App\Http\Controllers\TransaksiUserController;
use App\Http\Controllers\ProfilUserController;
use App\Http\Controllers\ReviewUserController;

Route::middleware(['auth', 'pending.caregiver'])->group(function () {
    // User Controller
    Route::get('/user/home-page', [HomeController::class, 'showUserHome'])->name('user.home');
    // Cari Caregiver
    Route::get('/user/cari-caregiver', [CariCaretakerController::class, 'showPageCariCaretaker'])->name('cari-caregiver');
    Route::get('/user/info-caregiver/{id}', [CariCaretakerController::class, 'showCaretakerInfo']);
    // Buat Penawaran Kerja
    Route::get('/user/buat-penawaran/{id}', [BuatPenawaranController::class, 'showPenawaranForm']);
    Route::post('/user/buat-penawaran/simpan', [BuatPenawaranController::class, 'buatPenawaran']);
    Route::post('/user/buat-penawaran/simpan', [BuatPenawaranController::class, 'buatPenawaran']);
    Route::post('/user/buat-penawaran/days', [BuatPenawaranController::class, 'getDaysFromBetweenDate'])->name('buat-penawaran-days');
    Route::post('/user/buat-penawaran/estimation', [BuatPenawaranController::class, 'calculateEstimation'])->name('buat-penawaran-estimation');
    // Orders
    Route::get('/user/order', [OrderUserController::class, 'showOrder'])->name('order');
    Route::get('/user/order-info/{id}', [OrderUserController::class, 'showOrderInfo'])->name('order-info');
    Route::post('/user/update-gaji/{id}', [OrderUserController::class, 'updateGaji']);
    Route::get('/user/batalkan/{id}', [OrderUserController::class, 'batalkanOrder']);
    Route::get('/user/selesai/{id}', [OrderUserController::class, 'selesaikanOrder']);
    // Transactions
    Route::get('/user/transaksi', [TransaksiUserController::class, 'showTransaksi'])->name('transaksi');
    Route::get('/user/info-transaksi/{id}', [TransaksiUserController::class, 'showInfoTransaksi'])->name('info-transaksi');
    // Review
    Route::get('/user/review/{id}', [ReviewUserController::class, 'showUserReviewForm'])->name('user.review');
    Route::post('/user/simpan-review', [ReviewUserController::class, 'reviewCaretaker']);
    // Daftar Caregiver
    Route::get('/daftar-caretaker', [DaftarCaretakerController::class, 'showCaretakerRegisterForm'])->name('daftar-caretaker');
    Route::post('/simpan-caretaker', [DaftarCaretakerController::class, 'registerCaretaker']);
    Route::get('/menunggu-verifikasi', [DaftarCaretakerController::class, 'showTungguVerifikasi'])->name('menunggu-verifikasi');
    Route::get('/mulai-caretaker', [DaftarCaretakerController::class, 'showSelamat'])->name('mulai-caretaker');
    // User Profile
    Route::get('/user/profile/{id}', [ProfilUserController::class, 'showProfile'])->name('user.profile');
    Route::post('/user/ganti-alamat/{id}', [ProfilUserController::class, 'simpanAlamat']);
});