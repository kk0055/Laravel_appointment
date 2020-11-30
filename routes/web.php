<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\DashboardController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class,'index' ]);


// Route::get('/create', [App\Http\Controllers\DoctorController::class, 'create']);

Route::resource('/doctor', App\Http\Controllers\DoctorController::class );



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
