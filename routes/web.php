<?php

use App\Http\Controllers\Authentication\LoginController;
use App\Http\Controllers\Authentication\RegisterController;
use App\Http\Controllers\VisitorPages\HomepageController;
use App\Http\Controllers\VisitorPages\ListDestinationController;
use Illuminate\Support\Facades\Route;


Route::get('/api/destinations', [ListDestinationController::class, 'getDestinations']);


Route::get('/login', [LoginController::class, 'index']);
Route::get('/register', [RegisterController::class, 'index']);


Route::get('/homepage', [HomepageController::class, 'index']);
Route::get('/cari-wisata', [ListDestinationController::class, 'index']);