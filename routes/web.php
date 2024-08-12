<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\userController;

Route::get('/dashboard', [userController::class,'index'])->name('dashboard');

Route::get('/users',[userController::class,'show'])->name('users');
