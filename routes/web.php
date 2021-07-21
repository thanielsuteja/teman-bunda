<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CariCaretakerController;
use App\Http\Controllers\CaretakerInfoController;
use App\Http\Controllers\BuatPenawaranController;
use App\Http\Controllers\DaftarCaretakerController;
use App\Http\Controllers\InfoOrderController;
use App\Http\Controllers\StatusOrderController;
use App\Http\Controllers\RiwayatTransaksiController;
use App\Http\Controllers\InfoTransaksiController;
use App\Http\Controllers\ProfilUserController;
use App\Http\Controllers\ReviewUserController;

//ApplicationController


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::get('/dashboard', function () {
    return view('home-user');
})->middleware(['auth'])->name('dashboard');

Route::get('/home', [HomeController::class, 'showHome'])->name('home');


// User Controller
Route::get('/user/home-page', [UserController::class, 'showPageHome'])->middleware(['auth'])->name('user.home');
// Cari Caregiver
Route::get('/user/cari-caregiver', [CariCaretakerController::class, 'showPageCariCaretaker'])->middleware(['auth'])->name('cari-caregiver');
Route::get('/user/info-caregiver/{id}', [CaretakerInfoController::class, 'showCaretakerInfo'])->middleware(['auth']);
Route::get('/user/buat-penawaran/{id}', [BuatPenawaranController::class, 'showPenawaranForm'])->middleware(['auth']);
Route::post('/user/buat-penawaran/simpan', [BuatPenawaranController::class, 'buatPenawaran'])->middleware(['auth']);
Route::post('/user/buat-penawaran/days', [BuatPenawaranController::class, 'getDaysFromBetweenDate'])->middleware('auth')->name('buat-penawaran-days');
Route::post('/user/buat-penawaran/estimation', [BuatPenawaranController::class, 'calculateEstimation'])->middleware('auth')->name('buat-penawaran-estimation');
// Orders
Route::get('/user/order', [StatusOrderController::class, 'showOrder'])->middleware(['auth'])->name('order');
Route::get('/user/order-info/{id}', [InfoOrderController::class, 'showOrderInfo'])->middleware(['auth'])->name('order-info');
Route::post('/user/update-gaji/{id}', [InfoOrderController::class, 'updateGaji'])->middleware(['auth']);
Route::get('/user/batalkan/{id}', [InfoOrderController::class, 'batalkanOrder'])->middleware(['auth']);
Route::get('/user/selesai/{id}', [InfoOrderController::class, 'selesaikanOrder'])->middleware(['auth']);
// Transactions
Route::get('/user/transaksi', [RiwayatTransaksiController::class, 'showTransaksi'])->middleware('auth')->name('transaksi');
Route::get('/user/info-transaksi/{id}', [InfoTransaksiController::class, 'showInfoTransaksi'])->middleware('auth');
// Review
Route::get('/user/review/{id}', [ReviewUserController::class, 'showUserReviewForm'])->middleware('auth');
Route::get('/user/simpan-review', [ReviewUserController::class, 'reviewCaretaker'])->middleware('auth');
// Daftar Caregiver
Route::get('/daftar-caretaker', [DaftarCaretakerController::class, 'showCaretakerRegisterForm'])->middleware('auth')->name('daftar-caretaker');
Route::post('/simpan-caretaker', [DaftarCaretakerController::class, 'registerCaretaker'])->middleware('auth');
Route::get('/menunggu-verifikasi', [DaftarCaretakerController::class, 'showTungguVerifikasi'])->middleware('auth')->name('menunggu-verifikasi');
Route::get('/mulai-caretaker', [DaftarCaretakerController::class, 'showSelamat'])->middleware('auth')->name('mulai-caretaker');
// User Profile
Route::get('/user/profile/{id}', [ProfilUserController::class, 'showProfile'])->middleware('auth');
Route::post('/user/ganti-alamat/{id}', [ProfilUserController::class, 'simpanAlamat'])->middleware('auth');

Route::get('/test', function () {
    return view('user.review');
});
// Route::get('/dropdown', [DependentDropdownController::class, 'index']);

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
require __DIR__ . '/caretaker.php';
