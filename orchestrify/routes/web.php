<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChefFormController;
use App\Http\Controllers\ChefProfileController;
use App\Http\Controllers\InstrumentsController;
use App\Http\Controllers\MusicianFormController;
use App\Http\Controllers\MusicianProfileController;
use Illuminate\Support\Facades\Route;



Route::get('/', [AuthController::class , 'index'])->name('home');   
Route::get('register', [AuthController::class , 'showRegisterForm'])->name('register.form'); 
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('login', [AuthController::class , 'showLoginForm'])->name('login.form');
Route::post('login', [AuthController::class, 'login'])->name('login');

// constructor routes 
Route::get('/chefProfile', [ChefProfileController::class, 'index'])->name('chef.profile');
Route::post('/chefProfile', [ChefProfileController::class, 'store'])->name('chef.profile.store');

// musicien routes 
Route::get('/musicianProfile', [MusicianProfileController::class, 'index'])->name('musician.profile');
Route::post('/musicianProfile', [MusicianProfileController::class, 'store'])->name('musician.profile.store');


Route::middleware(['auth', 'check.chef.profile'])->group(function () {
    Route::get('/chef/profile/create', [ChefProfileController::class, 'create'])->name('chef.profile.create');
    Route::post('/chef/profile/store', [ChefProfileController::class, 'store'])->name('chef.profile.store');
});
