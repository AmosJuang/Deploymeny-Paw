<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;

Route::get('/', [BlogController::class, 'home']); // 👈 changed from 'index' to 'home'
Route::get('/home', [BlogController::class, 'home']);
Route::get('/program', [BlogController::class, 'program']);
Route::get('/mentor', [BlogController::class, 'mentor']);
Route::get('/beasiswa', [BlogController::class, 'beasiswa']);
Route::get('/login', [BlogController::class, 'login']);
Route::get('/register', [BlogController::class, 'register']);

