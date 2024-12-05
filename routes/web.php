<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ManageDestinations;
use App\Http\Controllers\Admin\VisitorController;
use App\Http\Controllers\Authentication\LoginController;
use App\Http\Controllers\Authentication\RegisterController;
use App\Http\Controllers\Visitor\HomepageController;
use App\Http\Controllers\Visitor\ListDestinationController;
use App\Http\Controllers\Visitor\DestinationDetailController;
use App\Http\Middleware\DisableCsrfValidation;
use App\Http\Middleware\MustAdminsMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/api/destinations', [ListDestinationController::class, 'getDestinations']);
Route::post('/api/visitor-data', [VisitorController::class, 'getVisitorData']);


Route::middleware('guest')->group(function(){
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});



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
