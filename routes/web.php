<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\DashboardController;

//Home
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
\

//FrontendController
Route::get('/', [App\Http\Controllers\FrontendController::class,'index' ]);
Route::get('/new-appointment/{doctorId}/{date}', [App\Http\Controllers\FrontendController::class,'show' ])->name('create.appointment');

Route::post('/book/appointment',[App\Http\Controllers\FrontendController::class,'store' ])->name('booking.appointment')->middleware('auth');

Route::get('/my-booking', [App\Http\Controllers\FrontendController::class,'myBookings' ])->name('my.booking')->middleware('auth');

//Dashboard
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class,'index' ]);


// Route::get('/create', [App\Http\Controllers\DoctorController::class, 'create']);

Route::resource('/doctor', App\Http\Controllers\DoctorController::class );

Auth::routes();

//Appointment
Route::get('/appointment/check', [App\Http\Controllers\AppointmentController::class, 'check'])->name('appointment.check');


Route::resource('appointment', App\Http\Controllers\AppointmentController::class );

Route::post('/appointment/check', [App\Http\Controllers\AppointmentController::class, 'check'])->name('appointment.check');

Route::post('/appointment/update', [App\Http\Controllers\AppointmentController::class, 'updateTime'])->name('appointment.update');

//Profileinformation
Route::get('/profileinfo', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile.index');
Route::post('/profileinfo', [App\Http\Controllers\ProfileController::class, 'store'])->name('profile.store');

Route::post('/profile-pic', [App\Http\Controllers\ProfileController::class, 'profilePic'])->name('profile.pic')->middleware('auth');