<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdmUsersController;
use App\Http\Controllers\ProfessionController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\JobOfferController;
use App\Http\Controllers\ApplicationController;

//admin auth
Route::get('/admin', function () {
    return view('admlogin');
})->name('adm.login');

Route::post('/login/admstore', [LoginController::class, 'admstore'])->middleware('guest');

Route::get('/admin/dashboard', function () {
    return view('admin.index');
})->middleware(['auth'])->middleware(['admin'])->name('adm.dashboard');

// Route::get('logout', function () {
//     auth()->logout();
//     Session()->flush();

//     return Redirect::to('/admin/accessdenied');
// })->name('logout');

Route::get('/admin/logout', function () {
    auth()->logout();
    Session()->flush();

    return Redirect::to('/admin');
})->name('adm.logout');

Route::get('/admin/accessdenied', function () {
    return view('accessdenied');
});

//end admin auth


//AdmUsersController

Route::get('/admin/users', [AdmUsersController::class, 'AllUsers'])->middleware(['auth'])->middleware(['admin'])->name('adm.users');

Route::get('/admin/users/details/{id}', [AdmUsersController::class, 'Details'])->middleware(['auth'])->middleware(['admin']);

Route::get('/admin/profile', [AdmUsersController::class, 'AdmDetails'])->middleware(['auth'])->middleware(['admin'])->name('adm.profile');

Route::get('/admin/profile/edit-profile', [AdmUsersController::class, 'AdmEdit'])->middleware(['auth'])->middleware(['admin']);

Route::post('/admin/profile/update-profile/{id}', [AdmUsersController::class, 'AdmUpdate'])->middleware(['auth'])->middleware(['admin']);

//EndAdmUsersController

//ProfessionController

Route::get('/admin/professions', [ProfessionController::class, 'AllProfessions'])->middleware(['auth'])->middleware(['admin'])->name('adm.professions');

Route::get('/admin/professions/new', [ProfessionController::class, 'ViewAddPage'])->middleware(['admin']);

Route::post('/admin/professions/add', [ProfessionController::class, 'AddNew'])->middleware(['auth'])->middleware(['admin'])->name('adm.professions.add');

Route::get('/admin/professions/edit/{id}', [ProfessionController::class, 'Edit'])->middleware(['auth'])->middleware(['admin']);

Route::post('/admin/professions/update/{id}', [ProfessionController::class, 'Update'])->middleware(['auth'])->middleware(['admin']);

Route::get('/admin/professions/delete/{id}', [ProfessionController::class, 'Delete'])->middleware(['auth'])->middleware(['admin']);


//EndProfessionController


//RegionController

Route::get('/admin/regions', [RegionController::class, 'AllRegions'])->middleware(['auth'])->middleware(['admin'])->name('adm.regions');

Route::get('/admin/regions/new', [RegionController::class, 'ViewAddPage'])->middleware(['auth'])->middleware(['admin']);

Route::post('/admin/regions/add', [RegionController::class, 'AddNew'])->middleware(['auth'])->middleware(['admin'])->name('adm.regions.add');

Route::get('/admin/regions/edit/{id}', [RegionController::class, 'Edit'])->middleware(['auth'])->middleware(['admin']);

Route::post('/admin/regions/update/{id}', [RegionController::class, 'Update'])->middleware(['auth'])->middleware(['admin']);

Route::get('/admin/regions/delete/{id}', [RegionController::class, 'Delete'])->middleware(['auth'])->middleware(['admin']);

//EndRegionController

//JobOfferController

Route::get('/admin/job_offers', [JobOfferController::class, 'AllJobs'])->middleware(['auth'])->middleware(['admin'])->name('adm.job_offers');

Route::get('/admin/job_offers/details/{id}', [JobOfferController::class, 'Details'])->middleware(['auth'])->middleware(['admin']);

//EndJobOfferController

//TransactionController
Route::get('/admin/transactions', [TransactionController::class, 'AllTransactions'])->middleware(['auth'])->middleware(['admin'])->name('adm.transactions');

Route::get('/admin/transactions/finish/{id}', [TransactionController::class, 'FinishTransaction'])->middleware(['auth'])->middleware(['admin']);

Route::get('/admin/transactions/verify/{id}', [TransactionController::class, 'VerifyTransaction'])->middleware(['auth'])->middleware(['admin']);
//EndTransactionController

//ApplicationController
Route::get('/admin/applications', [ApplicationController::class, 'AllApplications'])->middleware(['auth'])->middleware(['admin'])->name('adm.applications');

Route::get('/admin/applications/details/{id}', [ApplicationController::class, 'Details'])->middleware(['auth'])->middleware(['admin']);

Route::get('/admin/applications/accept/{id}', [ApplicationController::class, 'AcceptApplication'])->middleware(['auth'])->middleware(['admin']);

Route::get('/admin/applications/deny/{id}', [ApplicationController::class, 'DenyApplication'])->middleware(['auth'])->middleware(['admin']);
