<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DestinationController;
use App\Http\Controllers\Admin\ManageDestinationController;
use App\Http\Controllers\Admin\ManageUserController;
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
    Route::get('/settings', [ProfileController::class, 'indexSettings'])->name('profile.settings');
    Route::put('/settings', [ProfileController::class, 'update'])->name('profile.settings.update');
});

// Route Admin (Harus Admin)
Route::middleware(MustAdminsMiddleware::class)->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard'); // Dashboard Admin
    Route::get('/admin/kelola-wisata', [ManageDestinationController::class, 'index'])->name('admin.manage.destination'); // Kelola tempat wisata
    Route::delete('/admin/tempat-wisata/{id}/hapus', [ManageDestinationController::class, 'deleteDestination'])->name('destination.destroy'); // Hapus tempat wisata

    Route::get('/admin/tempat-wisata/{id}/ubah', [DestinationController::class, 'indexEditDestination'])->name('destination.edit.show'); // Ubah tempat wisata
    Route::put('/admin/tempat-wisata/{id}/ubah', [DestinationController::class, 'updateDestination'])->name('destination.update'); // Proses penyimpanan data tempat wis
    Route::get('/admin/tempat-wisata/tambah', [DestinationController::class, 'indexAddDestination'])->name('destination.add.show'); // Tambah tempat wisata
    Route::post('/admin/tempat-wisata/tambah', [DestinationController::class, 'storeDestination'])->name('destination.store'); // Proses penyimpanan data tempat wisata
});

// Route Manajemen Admin (Middleware Admin dengan level akses tertentu)
Route::middleware(AdminMiddleware::class . ":1")->group(function(){
    Route::get('/admin/kelola-pengguna', [ManageUserController::class, 'index'])->name('user.manage'); // Kelola Admin
    Route::get('/admin/kelola-pengguna/ubah/{id}', [ManageUserController::class, 'indexEditUser'])->name('user.edit.show'); // Ubah admin
    Route::get('/admin/kelola-pengguna/tambah', [ManageUserController::class, 'indexCreateUser'])->name('user.create.show'); // Tambah admin
    Route::post('/admin/kelola-pengguna/tambah', [ManageUserController::class, 'store'])->name('user.create'); // Proses tambah admin
    Route::put('/admin/kelola-pengguna/ubah/{id}', [ManageUserController::class, 'update'])->name('user.update'); // Proses update admin
    Route::delete('/admin/kelola-pengguna/hapus/{id}', [ManageUserController::class, 'delete'])->name('user.destroy'); // Hapus admin
});
