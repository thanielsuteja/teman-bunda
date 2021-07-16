<?php

use App\Http\Controllers\CaretakerController;

Route::get('/caretaker/home', [CaretakerController::class, 'showPageHome'])->middleware('auth')->name('caretaker.home');

Route::get('/caretaker/profile', [CaretakerController::class, 'showPageProfile'])->middleware('auth')->name('caretaker.profile');
Route::post('/caretaker/profile', [CaretakerController::class, 'updateProfile'])->middleware('auth')->name('caretaker.profile');

Route::get('/caretaker/ulasan-saya', [CaretakerController::class, 'showPageUlasanSaya'])->middleware('auth')->name('caretaker.ulasan-saya');

Route::get('/caretaker/status-order', [CaretakerController::class, 'showPageStatusOrder'])->middleware('auth')->name('caretaker.status-order');
Route::get('/caretaker/status-order/{id}', [CaretakerController::class, 'showPageDetailStatusOrder'])->middleware('auth')->name('caretaker.detail-status-order');
Route::post('/caretaker/status-order/{id}/request-salary', [CaretakerController::class, 'requestSalaryStatusOrder'])->middleware('auth')->name('caretaker.request-salary-status-order');
Route::post('/caretaker/status-order/{id}/rejected', [CaretakerController::class, 'rejectedStatusOrder'])->middleware('auth')->name('caretaker.rejected-status-order');
Route::post('/caretaker/status-order/{id}/approved', [CaretakerController::class, 'approvedStatusOrder'])->middleware('auth')->name('caretaker.approved-status-order');

Route::get('/caretaker/riwayat-transaksi', [CaretakerController::class, 'showPageRiwayatTransaksi'])->middleware('auth')->name('caretaker.riwayat-transaksi');
Route::get('/caretaker/riwayat-transaksi/{id}', [CaretakerController::class, 'showPageDetailRiwayatTransaksi'])->middleware('auth')->name('caretaker.detail-riwayat-transaksi');

Route::get('/caretaker/playground', [CaretakerController::class, 'getDaysFromBetweenDate'])->middleware('auth');