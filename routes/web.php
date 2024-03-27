<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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

Route::get('/', [HomeController::class, 'index'])->name('user.home');

Route::get('/home', [HomeController::class, 'redirectToDashboard'])->middleware(['auth', 'verified']);
Route::get('/add_doctor_view', [AdminController::class, 'addDoctor']);
Route::get('/showappointment', [AdminController::class, 'showAppointment']);
Route::get('/alldoctors', [AdminController::class, 'showAllDoctor']);
Route::get('emailview/{id}', [AdminController::class, 'emailview'])->name('emailview');
Route::Post('/sendemail/{id}', [AdminController::class, 'sendEmail'])->name('sendemail');
Route::get('/approve_appoint/{id}', [AdminController::class, 'approveAppoint']);
Route::get('/cancel_appoint/{id}', [AdminController::class, 'cancelAppoint']);
Route::get('deletedoctor/{id}', [AdminController::class, 'deleteDoctor']);
Route::get('/editdoctor/{id}/edit', [AdminController::class, 'editDoctor'])->name('editdoctor');
Route::Put('/updatedoctor/{id}', [AdminController::class, 'updateDoctor'])->name('updatedoctor');
Route::post('/upload_doctor', [AdminController::class, 'uploadDoctor']);
Route::post('/appointment', [HomeController::class, 'appointment']);
Route::get('/my-appointment', [HomeController::class, 'myAppointment']);
Route::DELETE('/cancel_appoint/{id}', [HomeController::class, 'cancel_appoint']);
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
