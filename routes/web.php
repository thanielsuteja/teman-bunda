<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdmUsersController;
use App\Http\Controllers\ProfessionController;
use App\Http\Controllers\RegionController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', function () {
    return view('admin.index');
})->name('adm.dashboard');

//AdmUsersController

Route::get('/admin/users', [AdmUsersController::class, 'AllUsers'])->name('adm.users');

Route::get('/admin/users/details/{id}', [AdmUsersController::class, 'Details']);

//EndAdmUsersController

//ProfessionController

Route::get('/admin/professions', [ProfessionController::class, 'AllProfessions'])->name('adm.professions');

Route::get('/admin/professions/new', [ProfessionController::class, 'ViewAddPage']);

Route::post('/admin/professions/add', [ProfessionController::class, 'AddNew'])->name('adm.professions.add');

Route::get('/admin/professions/edit/{id}', [ProfessionController::class, 'Edit']);

Route::post('/admin/professions/update/{id}', [ProfessionController::class, 'Update']);

Route::get('/admin/professions/delete/{id}', [ProfessionController::class, 'Delete']);


//EndProfessionController


//RegionController

Route::get('/admin/regions', [RegionController::class, 'AllRegions'])->name('adm.regions');

Route::get('/admin/regions/new', [RegionController::class, 'ViewAddPage']);

Route::post('/admin/regions/add', [RegionController::class, 'AddNew'])->name('adm.regions.add');

Route::get('/admin/regions/edit/{id}', [RegionController::class, 'Edit']);

Route::post('/admin/regions/update/{id}', [RegionController::class, 'Update']);

Route::get('/admin/regions/delete/{id}', [RegionController::class, 'Delete']);

//EndRegionController

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/home', [HomeController::class, 'home']);

require __DIR__.'/auth.php';
