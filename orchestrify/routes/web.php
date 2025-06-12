<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChefDashboardController;
use App\Http\Controllers\ChefFormController;
use App\Http\Controllers\ChefProfileController;
use App\Http\Controllers\InstrumentsController;
use App\Http\Controllers\MusicianFormController;
use App\Http\Controllers\MusicianProfileController;
use App\Http\Controllers\ProgramsController;
use App\Http\Controllers\UsersController;
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

Route::middleware(['auth', 'role:chef'])->group(function () {
    Route::post('/instruments', [InstrumentsController::class, 'store'])->name('instruments.store');
    Route::get('/instruments/create', [InstrumentsController::class, 'showForm'])->name('instruments.create');
    Route::delete('/instruments/{id}', [InstrumentsController::class, 'destroy'])->name('instruments.destroy');
    Route::put('/instruments/update/{id}', [InstrumentsController::class, 'update'])->name('instruments.update');
    Route::get('/chefDashboard', [ChefDashboardController::class, 'stats'])->name('chefDashboard');
    Route::get('/programs', [ProgramsController::class , 'index'])->name('programs.index');
    Route::post('/programs', [ProgramsController::class, 'store'])->name('programs.store');

    Route::get('musicians', action: [MusicianProfileController::class, 'getMusicians'])->name(name: 'musicians.index');
  
});

Route::get('/musicianProfiles', [MusicianProfileController::class, 'getUsers'])->name('musicianProfiles');
Route::get('/redirecting', [AuthController::class , 'checkProfileAndRedirect'])->name('redirecting');

// Add these routes if they don't exist
Route::middleware(['auth', 'role:chef'])->group(function () {
    Route::get('/chef/dashboard', [ChefDashboardController::class, 'stats'])->name('chef.dashboard');
    Route::get('/chef/programs', [ProgramsController::class, 'index'])->name('chef.programs');
    Route::get('/chef/musicians', [MusicianProfileController::class, 'getMusicians'])->name('chef.musicians');
    Route::get('/chef/instruments', [InstrumentsController::class, 'index'])->name('chef.instruments');
    Route::get('/chef/history', function() { return view('chef.history'); })->name('chef.history');
    
    // Add musician dashboard route
    Route::get('/musician/dashboard', function() { return view('musicianDashboard'); })->name('musician.dashboard');
});
