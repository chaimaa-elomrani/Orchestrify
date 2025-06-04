<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChefFormController;
use App\Http\Controllers\ChefProfileController;
use App\Http\Controllers\MusicianFormController;
use App\Http\Controllers\MusicianProfileController;
use Illuminate\Support\Facades\Route;



Route::get('/', [AuthController::class , 'index'])->name('home');   
Route::get('register', [AuthController::class , 'showRegisterForm'])->name('register.form'); 
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('login', [AuthController::class , 'showLoginForm'])->name('login.form');
Route::post('login', [AuthController::class, 'login'])->name('login');

Route::get('/chefProfile', [ChefProfileController::class, 'index'])->name('chef.profile');
Route::post('/chefProfile', [ChefProfileController::class, 'store'])->name('chef.profile.store');
Route::get('/musicianProfile', [MusicianProfileController::class, 'index'])->name('musician.profile');