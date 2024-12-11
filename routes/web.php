<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\KelolaAdminController;
use App\Http\Controllers\Admin\ManageDestinations;
use App\Http\Controllers\Admin\VisitorController;
use App\Http\Controllers\Authentication\LoginController;
use App\Http\Controllers\Authentication\RegisterController;
use App\Http\Controllers\Visitor\HomepageController;
use App\Http\Controllers\Visitor\ListDestinationController;
use App\Http\Controllers\Visitor\DestinationDetailController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\DisableCsrfValidation;
use App\Http\Middleware\GuestMiddleware;
use App\Http\Middleware\MustAdminsMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/api/destinations', [ListDestinationController::class, 'getDestinations']);
Route::post('/api/visitor-data', [VisitorController::class, 'getVisitorData']);


Route::middleware(GuestMiddleware::class)->group(function(){
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
    Route::get('/register', [RegisterController::class, 'index'])->name('register');
});

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');



Route::get('/', [HomepageController::class, 'index'])->name('homepage');
Route::get('/cari-wisata', [ListDestinationController::class, 'index']);
Route::get('/tempat-wisata/{id}', [DestinationDetailController::class, 'index']);

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/kelola-wisata', [ManageDestinations::class, 'index']);
});

Route::middleware(MustAdminsMiddleware::class)->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/kelola-wisata', [ManageDestinations::class, 'index']);
});

Route::get('/kelola-wisata', [ManageDestinations::class, 'index']);

Route::get('/buat-tempat-wisata', function(){
    return view('admin-pages.pages.ubah-edit-tempat-wisata', ['jenisMode' => 'baru']);
});


Route::middleware(AdminMiddleware::class . ":1")->group(function(){
    Route::get('/kelola-admin',[KelolaAdminController::class, 'index'])->name('admin.manage');
    route::get('/kelola-admin/ubah/{id}', [KelolaAdminController::class, 'indexEditAdmin'])->name('admin.edit.show');
    route::get('/kelola-admin/tambah', [KelolaAdminController::class, 'indexCreateAdmin'])->name('admin.create.show');

    route::post('/kelola-admin/tambah', [KelolaAdminController::class, 'store'])->name('admin.create');
    route::put('/kelola-admin/ubah/{id}', [KelolaAdminController::class, 'update'])->name('admin.update');
    route::delete('/kelola-admin/hapus/{id}', [KelolaAdminController::class, 'delete'])->name('admin.destroy');

});
