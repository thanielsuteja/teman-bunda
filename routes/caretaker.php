<?php

use App\Http\Controllers\CaretakerController;

Route::middleware(['auth'])->group(function () {
    Route::get('/caretaker/home', [CaretakerController::class, 'showPageHome'])->name('caretaker.home');

    Route::get('/caretaker/profile', [CaretakerController::class, 'showPageProfile'])->name('caretaker.profile');
    Route::post('/caretaker/profile/area', [CaretakerController::class, 'updateProfileArea'])->name('caretaker.profile-area');
    Route::post('/caretaker/profile/detail', [CaretakerController::class, 'updateProfileDetail'])->name('caretaker.profile-detail');
    Route::post('/caretaker/profile/foto', [CaretakerController::class, 'updateProfileFoto'])->name('caretaker.profile-foto');
    Route::post('/caretaker/profile/terbuka', [CaretakerController::class, 'updateProfileTerbuka'])->name('caretaker.profile-terbuka');

    Route::get('/caretaker/ulasan-saya', [CaretakerController::class, 'showPageUlasanSaya'])->name('caretaker.ulasan-saya');

    Route::get('/caretaker/review-user/{id}', [CaretakerController::class, 'showPageReviewUser'])->name('caretaker.review-user');

    Route::get('/caretaker/status-order', [CaretakerController::class, 'showPageStatusOrder'])->name('caretaker.status-order');
    Route::get('/caretaker/status-order/{id}', [CaretakerController::class, 'showPageDetailStatusOrder'])->name('caretaker.detail-status-order');
    Route::post('/caretaker/status-order/{id}/request-salary', [CaretakerController::class, 'requestSalaryStatusOrder'])->name('caretaker.request-salary-status-order');
    Route::post('/caretaker/status-order/{id}/rejected', [CaretakerController::class, 'rejectedStatusOrder'])->name('caretaker.rejected-status-order');
    Route::post('/caretaker/status-order/{id}/approved', [CaretakerController::class, 'approvedStatusOrder'])->name('caretaker.approved-status-order');

    Route::get('/caretaker/riwayat-transaksi', [CaretakerController::class, 'showPageRiwayatTransaksi'])->name('caretaker.riwayat-transaksi');
    Route::get('/caretaker/riwayat-transaksi/{id}', [CaretakerController::class, 'showPageDetailRiwayatTransaksi'])->name('caretaker.detail-riwayat-transaksi');

    Route::get('/caretaker/review/{id}', [CaretakerController::class, 'showPageReview'])->name('caretaker.review');
    Route::post('/caretaker/review/{id}', [CaretakerController::class, 'sendReview'])->name('caretaker.send-review');
});