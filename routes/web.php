<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ScholarshipController;

Route::get('/', [BlogController::class, 'home']); // 👈 changed from 'index' to 'home'
Route::get('/home', [BlogController::class, 'home']);
Route::get('/program', [BlogController::class, 'program']);
Route::get('/mentor', [BlogController::class, 'mentor']);
Route::get('/beasiswa', [BlogController::class, 'beasiswa']);
Route::get('/login', function () {
    return view('login');
})->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', function () {
    return view('register');
})->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/forget-password', function () {
    return view('forget-password'); 
})->name('forget-password');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/beasiswa', [ScholarshipController::class, 'index'])->name('beasiswa.index');
Route::post('/beasiswa/{id}/register', [ScholarshipController::class, 'register'])->name('beasiswa.register');
