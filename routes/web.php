<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
// use App\Http\Controllers\LoginController;
// use App\Http\Controllers\AdmUsersController;
// use App\Http\Controllers\ProfessionController;
// use App\Http\Controllers\RegionController;
// use App\Http\Controllers\TransactionController;
// use App\Http\Controllers\JobOfferController;
// use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CariCaretakerController;


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
Route::get('/user/cari-caretaker', [CariCaretakerController::class, 'showPageCariCaretaker'])->middleware(['auth'])->name('user.cari-caretaker');
Route::get('/user/cari-caretaker/{id}', [CariCaretakerController::class, 'showCaretakerInfo'])->middleware(['auth'])->name('user.caretaker-info');

// Route::get('/test', function () {
//     return view('e');
// });
// Route::get('/dropdown', [DependentDropdownController::class, 'index']);

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
