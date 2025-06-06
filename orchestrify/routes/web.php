<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChefFormController;
use App\Http\Controllers\ChefProfileController;
use App\Http\Controllers\InstrumentsController;
use App\Http\Controllers\MusicianFormController;
use App\Http\Controllers\MusicianProfileController;
use Illuminate\Support\Facades\Route;



Route::get('/', [AuthController::class, 'index'])->name('home');
Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('login', [AuthController::class, 'login'])->name('login');

// constructor routes 
Route::get('/chefProfile', [ChefProfileController::class, 'index'])->name('chef.profile');
Route::post('/chefProfile', [ChefProfileController::class, 'store'])->name('chef.profile.store');

// musicien routes 
Route::get('/musicianProfile', [MusicianProfileController::class, 'index'])->name('musician.profile');
Route::post('/musicianProfile', [MusicianProfileController::class, 'store'])->name('musician.profile.store');


Route::get('/chef/profile/create', [ChefProfileController::class, 'create'])->name('chef.profile.create');
Route::post('/chef/profile/store', [ChefProfileController::class, 'store'])->name('chef.profile.store');


// instruments routes
Route::get('/instruments', [InstrumentsController::class, 'index'])->name('instruments.index');
Route::post('/instruments', [InstrumentsController::class, 'store'])->name('instruments.store');
Route::get('/instruments/create', [InstrumentsController::class, 'showForm'])->name('instruments.create');
Route::delete('/instruments/{id}', [InstrumentsController::class, 'destroy'])->name('instruments.destroy');
Route::put('/instruments/{id}', [InstrumentsController::class, 'update'])->name('instruments.update');
