<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DataCampaign;
use App\Http\Controllers\DataUser;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', function () {
    return redirect()->route('login');
})->name('root');

// Authentication routes
Route::middleware(['guest'])->group(function(){
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
    Route::get('/register', [AuthController::class, 'create'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
    Route::get('/verify/{verify_key}', [AuthController::class, 'verify']);
});

// Authenticated routes
Route::middleware(['auth'])->group(function(){
    // User route (accessible for authenticated users)
    Route::get('/home', [UserController::class, 'index'])->name('home')->middleware('userAkses:user');
    // Admin route
    Route::get('/admin', [AdminController::class, 'index'])->name('admin')->middleware('userAkses:admin');

    // user management routes
    Route::get('/datauser', [DataUser::class, 'index'])->name('datauser');
    Route::get('/datauser/update/{id}', [DataUser::class, 'edit'])->name('datauser.edit');
    Route::post('/datauser/update/{id}', [DataUser::class, 'update'])->name('update.submit');
    Route::post('/datauser/delete/{id}', [DataUser::class, 'delete'])->name('datauser.delete');

    // campaign management routes
    Route::get('/datacampaign', [DataCampaign::class, 'index'])->name('datacampaign');
    Route::get('/datacampaign/create', [DataCampaign::class, 'create'])->name('datacampaign.create');
    Route::post('/datacampaign/create', [DataCampaign::class, 'store'])->name('datacampaign.submit');
    Route::get('/datacampaign/update/{id}', [DataCampaign::class, 'edit'])->name('datacampaign.edit');
    Route::post('/datacampaign/update/{id}', [DataCampaign::class, 'update'])->name('datacampaign.update');
    Route::post('/datacampaign/delete/{id}', [DataCampaign::class, 'delete'])->name('datacampaign.delete');
});

// Logout route (accessible for authenticated users)
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');