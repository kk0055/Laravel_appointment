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
Route::get('/my-prescription', [App\Http\Controllers\FrontendController::class,'myPrescription' ])->name('my.prescription');


//Dashboard
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class,'index' ]);


// Route::get('/create', [App\Http\Controllers\DoctorController::class, 'create']);



Auth::routes();
Route::resource('/doctor', App\Http\Controllers\DoctorController::class );


//Appointment
Route::get('/appointment/check', [App\Http\Controllers\AppointmentController::class, 'check'])->name('appointment.check');

Route::resource('appointment', App\Http\Controllers\AppointmentController::class );

Route::post('/appointment/check', [App\Http\Controllers\AppointmentController::class, 'check'])->name('appointment.check');

Route::post('/appointment/update', [App\Http\Controllers\AppointmentController::class, 'updateTime'])->name('appointment.update');

//Profileinformation
Route::get('/profileinfo', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile.index');
Route::post('/profileinfo', [App\Http\Controllers\ProfileController::class, 'store'])->name('profile.store');

Route::post('/profile-pic', [App\Http\Controllers\ProfileController::class, 'profilePic'])->name('profile.pic')->middleware('auth');

//Patient
Route::get('/patient',[App\Http\Controllers\PatientlistController::class, 'index'])->name('patient');
Route::get('/patient/all',[App\Http\Controllers\PatientlistController::class, 'allTimeAppointment'])->name('all.appointments');
Route::get('/status/update{id}',[App\Http\Controllers\PatientlistController::class, 'toggleStatus'])->name('update.status');

//Prescription
Route::get('/patient-today',[App\Http\Controllers\PrescriptionController::class, 'index'])->name('patients.today');
Route::post('/prescription',[App\Http\Controllers\PrescriptionController::class, 'store'])->name('prescription');

Route::get('/prescription/{userId}/{date}',[App\Http\Controllers\PrescriptionController::class, 'show'])->name('prescription.show');
Route::get('/prescribed-patients',[App\Http\Controllers\PrescriptionController::class, 'patientsFromPrescription'])->name('prescribed.patients');

Route::resource('department',App\Http\Controllers\DepartmentController::class);