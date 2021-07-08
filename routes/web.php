<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DependentDropdownController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/dashboard', function () {
    return view('home-user');
})->middleware(['auth'])->name('dashboard');

Route::get('/home', [HomeController::class, 'home'])->name('home');


// User Controller
Route::get('/user/home-page', [UserController::class, 'showPageHome'])->middleware(['auth'])->name('user.home');
Route::get('/user/cari-caretaker', [UserController::class, 'showPageCariCaretaker'])->middleware(['auth'])->name('user.cari-caretaker');


require __DIR__.'/auth.php';

//testing
Route::get('/', function () {
    return view('layout.sidebar.fail-sidebar');
});
// Route::get('/test', function () {
//     return view('sidebar.sidebar');
// });
Route::get('/test', function() {
    return view('e');
});
Route::get('/dropdown', [DependentDropdownController::class, 'index']);