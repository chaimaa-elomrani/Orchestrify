<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;



Route::get('/', [AuthController::class , 'index']);   
Route::get('register', [AuthController::class , 'showRegisterForm'])->name('register.form'); 
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('login', [AuthController::class , 'showLoginForm'])->name('login.form');
Route::post('login', [AuthController::class, 'login'])->name('login');