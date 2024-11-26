<?php

use App\Http\Controllers\Authentication\LoginController;
use App\Http\Controllers\Authentication\RegisterController;
use App\Http\Controllers\VisitorPages\HomepageController;
use Illuminate\Support\Facades\Route;



Route::get('/login', [LoginController::class, 'index']);
Route::get('/register', [RegisterController::class, 'index']);


Route::get('homepage', [HomepageController::class, 'index']);
