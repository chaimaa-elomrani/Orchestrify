<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;



Route::get('register', [AuthController::class , 'showRegisterForm'])->name('register.form'); 
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/home', [AuthController::class , 'index']);   