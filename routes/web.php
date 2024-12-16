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
use App\Http\Controllers\Visitor\ProfileController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\GuestMiddleware;
use App\Http\Middleware\MustAdminsMiddleware;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Profiler\Profile;

// Route Publik
Route::get('/', [HomepageController::class, 'index'])->name('homepage'); // Halaman utama
Route::get('/cari-wisata', [ListDestinationController::class, 'index']); // Cari tempat wisata
Route::get('/tempat-wisata/{id}', [DestinationDetailController::class, 'index']); // Detail tempat wisata
Route::get('/api/destinations', [ListDestinationController::class, 'getDestinations']); // API untuk mendapatkan daftar destinasi
Route::post('/api/visitor-data', [VisitorController::class, 'getVisitorData']); // API untuk mendapatkan data pengunjung
Route::get('/tentangkami',function(){
return view('visitor-pages.pages.tentangkami');
} );

// Route Auth (Middleware Guest)
Route::middleware(GuestMiddleware::class)->group(function(){
    Route::get('/login', [LoginController::class, 'index'])->name('login'); // Halaman login
    Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate'); // Proses autentikasi login
    Route::get('/register', [RegisterController::class, 'index'])->name('register'); // Halaman pendaftaran
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store'); // Proses penyimpanan data pendaftaran
});

// Route Logout
Route::get('/logout', [LoginController::class, 'logout'])->name('logout'); // Logout pengguna

// Route Authenticated (Middleware Auth)
Route::middleware('auth')->group(function(){
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile'); // Halaman profil pengguna
});

// Route Admin (Harus Admin)
Route::middleware(MustAdminsMiddleware::class)->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard'); // Dashboard Admin
    Route::get('/admin/kelola-wisata', [ManageDestinations::class, 'index'])->name('admin.manage.destination'); // Kelola tempat wisata
    Route::get('/admin/tempat-wisata/{id}/ubah', [ManageDestinations::class, 'indexEditDestination'])->name('destination.edit.show'); // Ubah tempat wisata
    Route::get('/admin/tempat-wisata/tambah', [ManageDestinations::class, 'indexAddDestination'])->name('destination.add.show'); // Tambah tempat wisata

    Route::delete('/admin/tempat-wisata/{id}/hapus', [ManageDestinations::class, 'deleteDestination'])->name('destination.destroy'); // Hapus tempat wisata
    Route::post('/admin/tempat-wisata/tambah', [ManageDestinations::class, 'storeDestination'])->name('destination.store'); // Proses penyimpanan data tempat wisata
    Route::post('/admin/tempat-wisata/ubah', [ManageDestinations::class, 'updateDestination'])->name('destination.update'); // Proses penyimpanan data tempat wis
});

// Route Manajemen Admin (Middleware Admin dengan level akses tertentu)
Route::middleware(AdminMiddleware::class . ":1")->group(function(){
    Route::get('/kelola-admin', [KelolaAdminController::class, 'index'])->name('admin.manage'); // Kelola Admin
    Route::get('/kelola-admin/ubah/{id}', [KelolaAdminController::class, 'indexEditAdmin'])->name('admin.edit.show'); // Ubah admin
    Route::get('/kelola-admin/tambah', [KelolaAdminController::class, 'indexCreateAdmin'])->name('admin.create.show'); // Tambah admin
    Route::post('/kelola-admin/tambah', [KelolaAdminController::class, 'store'])->name('admin.create'); // Proses tambah admin
    Route::put('/kelola-admin/ubah/{id}', [KelolaAdminController::class, 'update'])->name('admin.update'); // Proses update admin
    Route::delete('/kelola-admin/hapus/{id}', [KelolaAdminController::class, 'delete'])->name('admin.destroy'); // Hapus admin
});
