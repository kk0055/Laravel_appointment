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

Route::get('/appointment/check', [App\Http\Controllers\AppointmentController::class, 'check'])->name('appointment.check');


Route::resource('appointment', App\Http\Controllers\AppointmentController::class );

Route::post('/appointment/check', [App\Http\Controllers\AppointmentController::class, 'check'])->name('appointment.check');

Route::post('/appointment/update', [App\Http\Controllers\AppointmentController::class, 'updateTime'])->name('appointment.update');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
