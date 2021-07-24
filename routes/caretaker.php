<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfilCaretakerController;
use App\Http\Controllers\UlasanSayaController;
use App\Http\Controllers\OrderCaretakerController;
use App\Http\Controllers\TransaksiCaretakerController;
use App\Http\Controllers\ReviewCaretakerController;

Route::middleware(['auth'])->group(function () {
    Route::get('/mulai-caretaker', [HomeController::class, 'showSelamat'])->name('mulai-caretaker');
    
    Route::get('/caretaker/home', [HomeController::class, 'showCaretakerHome'])->name('caretaker.home');

    Route::get('/caretaker/profile', [ProfilCaretakerController::class, 'showPageProfile'])->name('caretaker.profile');
    Route::post('/caretaker/profile/area', [ProfilCaretakerController::class, 'updateProfileArea'])->name('caretaker.profile-area');
    Route::post('/caretaker/profile/detail', [ProfilCaretakerController::class, 'updateProfileDetail'])->name('caretaker.profile-detail');
    Route::post('/caretaker/profile/foto', [ProfilCaretakerController::class, 'updateFotoProfil'])->name('caretaker.profile-foto');
    Route::post('/caretaker/profile/terbuka', [ProfilCaretakerController::class, 'updateStatusTerbukaUntukPekerjaans'])->name('caretaker.profile-terbuka');

    Route::get('/caretaker/profil-user/{id}', [ProfilCaretakerController::class, 'showProfilUser'])->name('caretaker.profil-user');
    
    Route::get('/caretaker/ulasan-saya', [UlasanSayaController::class, 'showPageUlasanSaya'])->name('caretaker.ulasan-saya');

    Route::get('/caretaker/order', [OrderCaretakerController::class, 'showPageOrder'])->name('caretaker.order');
    Route::get('/caretaker/order/{id}', [OrderCaretakerController::class, 'showPageDetailOrder'])->name('caretaker.detail-order');
    Route::post('/caretaker/order/{id}/request-salary', [OrderCaretakerController::class, 'requestSalaryStatusOrder'])->name('caretaker.request-salary-order');
    Route::post('/caretaker/order/{id}/rejected', [OrderCaretakerController::class, 'rejectedStatusOrder'])->name('caretaker.rejected-order');
    Route::post('/caretaker/order/{id}/approved', [OrderCaretakerController::class, 'approvedStatusOrder'])->name('caretaker.approved-order');

    Route::get('/caretaker/riwayat-transaksi', [TransaksiCaretakerController::class, 'showPageRiwayatTransaksi'])->name('caretaker.riwayat-transaksi');
    Route::get('/caretaker/riwayat-transaksi/{id}', [TransaksiCaretakerController::class, 'showPageDetailRiwayatTransaksi'])->name('caretaker.detail-riwayat-transaksi');

    Route::get('/caretaker/review/{id}', [ReviewCaretakerController::class, 'showPageReview'])->name('caretaker.review');
    Route::post('/caretaker/review/{id}', [ReviewCaretakerController::class, 'sendReview'])->name('caretaker.send-review');
});