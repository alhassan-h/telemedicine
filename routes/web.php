<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

Route::get('/', function () { return redirect(route('home')); });
Route::get('/home', function () { return redirect(route('home')); });
Route::get('/www.ashmed.com', function () { return redirect(route('home')); });

Route::get('/ashmed.com', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
Route::get('/doctors', [App\Http\Controllers\DashboardController::class, 'doctors'])->name('doctors');
Route::get('/patients', [App\Http\Controllers\DashboardController::class, 'patients'])->name('patients');
Route::get('/appointments', [App\Http\Controllers\DashboardController::class, 'appointments'])->name('appointments');
Route::get('/chats', [App\Http\Controllers\DashboardController::class, 'chats'])->name('chats');
Route::post('/chats/savechat', [App\Http\Controllers\DashboardController::class, 'savechat'])->name('chats.savechat');
Route::post('/chats/conversation', [App\Http\Controllers\DashboardController::class, 'conversation'])->name('chats.conversation');
Route::get('/videochats', [App\Http\Controllers\DashboardController::class, 'videochats'])->name('videochats');


Route::get('/admin/dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/profile', [App\Http\Controllers\AdminController::class, 'profile'])->name('admin.profile');
Route::get('/admin/doctors', [App\Http\Controllers\AdminController::class, 'doctors'])->name('admin.doctors');
// Route::get('/admin/doctors/add', [App\Http\Controllers\AdminController::class, 'addDoctor'])->name('admin.doctors.add');
Route::post('/admin/doctors/save', [App\Http\Controllers\AdminController::class, 'saveDoctor'])->name('admin.doctors.save');
// Route::get('/admin/doctors/edit/{id}', [App\Http\Controllers\AdminController::class, 'editDoctor'])->name('admin.doctors.edit');
Route::post('/admin/doctors/update', [App\Http\Controllers\AdminController::class, 'updateDoctor'])->name('admin.doctors.update');
Route::post('/admin/doctors/delete', [App\Http\Controllers\AdminController::class, 'deleteDoctor'])->name('admin.doctors.delete');
// Route::get('/admin/doctors/{id}', [App\Http\Controllers\AdminController::class, 'doctor'])->name('admin.doctor');
Route::get('/admin/patients', [App\Http\Controllers\AdminController::class, 'patients'])->name('admin.patients');
Route::post('/admin/patients/delete', [App\Http\Controllers\AdminController::class, 'deletePatient'])->name('admin.patients.delete');
// Route::get('/admin/patients/{id}', [App\Http\Controllers\AdminController::class, 'patient'])->name('admin.patient');

Route::get('/doctor/dashboard', [App\Http\Controllers\DoctorController::class, 'index'])->name('doctor.dashboard');
Route::get('/doctor/appointments', [App\Http\Controllers\DoctorController::class, 'appointments'])->name('doctor.appointments');
Route::post('/doctor/appointments/approve', [App\Http\Controllers\DoctorController::class, 'approveAppointment'])->name('doctor.appointment.approve');
Route::post('/doctor/appointments/reject', [App\Http\Controllers\DoctorController::class, 'rejectAppointment'])->name('doctor.appointment.reject');
Route::post('/doctor/appointments/cancel', [App\Http\Controllers\DoctorController::class, 'cancelAppointment'])->name('doctor.appointment.cancel');
Route::get('/doctor/profile', [App\Http\Controllers\DoctorController::class, 'profile'])->name('doctor.profile');
Route::get('/doctor/patients', [App\Http\Controllers\DoctorController::class, 'patients'])->name('doctor.patients');
Route::get('/doctor/patients/{id}', [App\Http\Controllers\DoctorController::class, 'patient'])->name('doctor.patient');
Route::get('/doctor/chats', [App\Http\Controllers\DoctorController::class, 'chats'])->name('doctor.chats');
Route::get('/doctor/chats/{id}', [App\Http\Controllers\DoctorController::class, 'chat'])->name('doctor.chat');
Route::get('/doctor/videochats', [App\Http\Controllers\DoctorController::class, 'videochats'])->name('doctor.videochats');

Route::get('/patient/dashboard', [App\Http\Controllers\PatientController::class, 'index'])->name('patient.dashboard');
Route::get('/patient/profile', [App\Http\Controllers\PatientController::class, 'profile'])->name('patient.profile');
Route::get('/patient/doctors', [App\Http\Controllers\PatientController::class, 'doctors'])->name('patient.doctors');
Route::get('/patient/doctors/{id}', [App\Http\Controllers\PatientController::class, 'doctor'])->name('patient.doctor');
Route::get('/patient/appointments', [App\Http\Controllers\PatientController::class, 'appointments'])->name('patient.appointments');
Route::post('/patient/appointments/request', [App\Http\Controllers\PatientController::class, 'requestAppointment'])->name('patient.appointments.request');
Route::post('/patient/appointments/clear', [App\Http\Controllers\PatientController::class, 'clearAppointment'])->name('patient.appointment.clear');
Route::get('/patient/chats', [App\Http\Controllers\PatientController::class, 'chats'])->name('patient.chats');
Route::get('/patient/chats/{id}', [App\Http\Controllers\PatientController::class, 'chat'])->name('patient.chat');
Route::get('/patient/videochats', [App\Http\Controllers\PatientController::class, 'videochats'])->name('patient.videochats');
