<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::get('/', [HomeController::class, 'showHome'])->name('home');

Route::get('/register', [AuthController::class, 'showRegisterForm'])
    // ->middleware('guest')
    ->name('register');

Route::post('/register/store', [AuthController::class, 'register'])
    ->middleware('guest');

Route::get('/login', [AuthController::class, 'showLoginForm'])
    ->middleware('guest')
    ->name('login');

Route::post('/login/store', [AuthController::class, 'login'])
    ->middleware('guest');

Route::get('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

Route::get('/dashboard', function () {
    return view('home-user');
})->middleware(['auth'])->name('dashboard');
Route::get('/test', function() {
    return view('user.terima-kasih');
});

Route::post('/getKabupaten', [AuthController::class, 'getKabupaten'])->name('getKabupaten');
Route::post('/getKecamatan', [AuthController::class, 'getKecamatan'])->name('getKecamatan');
Route::post('/getKelurahan', [AuthController::class, 'getKelurahan'])->name('getKelurahan');

// require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
require __DIR__ . '/caretaker.php';
require __DIR__ . '/user.php';
