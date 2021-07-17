<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CariCaretakerController;
use App\Http\Controllers\CaretakerInfoController;
use App\Http\Controllers\BuatPenawaranController;
use App\Http\Controllers\StatusOrderController;
use App\Http\Controllers\RiwayatTransaksiController;
use App\Http\Controllers\InfoTransaksiController;

//ApplicationController


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/home', [HomeController::class, 'home']);

Route::get('/dashboard', function () {
    return view('home-user');
})->middleware(['auth'])->name('dashboard');

Route::get('/home', [HomeController::class, 'home'])->name('home');


// User Controller
Route::get('/user/home-page', [UserController::class, 'showPageHome'])->middleware(['auth'])->name('user.home');
Route::get('/user/cari-caregiver', [CariCaretakerController::class, 'showPageCariCaretaker'])->middleware(['auth'])->name('cari-caregiver');
Route::get('/user/info-caregiver/{id}', [CaretakerInfoController::class, 'showCaretakerInfo'])->middleware(['auth']);
Route::get('/user/buat-penawaran/{id}', [BuatPenawaranController::class, 'showPenawaranForm'])->middleware(['auth']);
Route::post('/user/buat-penawaran/simpan', [BuatPenawaranController::class, 'buatPenawaran'])->middleware(['auth']);
Route::get('/user/order', [StatusOrderController::class, 'showOrder'])->middleware(['auth'])->name('order');
Route::get('/user/order-info/{id}', [StatusOrderController::class, 'showOrderInfo'])->middleware(['auth'])->name('order-info');

Route::post('/user/update-gaji/{id}', [StatusOrderController::class, 'updateGaji'])->middleware(['auth']);
Route::post('/user/batalkan/{{ $job->job_id }}', [StatusOrderController::class, 'batalkanOrder'])->middleware(['auth']);
Route::post('/user/selesai/{{ $job->job_id }}', [StatusOrderController::class, 'selesaikanOrder'])->middleware(['auth']);

Route::get('/user/transaksi', [RiwayatTransaksiController::class, 'showTransaksi'])->middleware('auth')->name('transaksi');
Route::get('/user/info-transaksi/{id}', [InfoTransaksiController::class, 'showInfoTransaksi'])->middleware('auth');

Route::get('/test', function () {
    return view('user.buat-penawaran');
});
// Route::get('/dropdown', [DependentDropdownController::class, 'index']);

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
