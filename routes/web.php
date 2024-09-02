<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\userController;

Route::get('/dashboard', [userController::class,'index'])->name('dashboard');

Route::get('/users',[userController::class,'show'])->name('users');

Route::post('/add-user',[userController::class,'create'])->name('add-user');

Route::post('/edit-user/{id}',[userController::class,'edit'])->name('edit-user');

Route::delete('/delete-user/{id}',[userController::class,'destroy'])->name('delete-user');

Route::post('/update-user/{id}',[userController::class,'update'])->name('destroy-user');
