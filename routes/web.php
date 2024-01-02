<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\SessionsController;
use App\Http\Controllers\Admin\MedicineController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CheckController;
use App\Http\Controllers\HistoryPatientController;
use App\Http\Controllers\Patients\ChecksController as PatientsChecksController;
use App\Http\Controllers\Patients\RegisterController as PatientsRegisterController;



Route::get('/', function () {
    return view('welcome');
})->name('index');

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/check', [CheckController::class, 'index'])->name('check');
Route::get('/history-patient', [HistoryPatientController::class, 'index'])->name('history-patient');



Route::controller(SessionsController::class)->group(function () {
    Route::get('/doctors/login', 'doctorLogin')->name('doctor-login');
    Route::get('/admins/login', 'adminLogin')->name('admin-login');

    Route::post('/login', 'create')->name('create-session');

    Route::get('/logout', 'logout')->name('logout');
});

Route::middleware(['auth:doctor'])->group(function () {

});

Route::middleware(['auth:admin'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::controller(MedicineController::class)->group(function () {
            Route::get('/medicines', 'index')->name('list-medicines');
            Route::get('/medicines/create', 'create')->name('create-medicines');
            Route::post('/medicines/store', 'store')->name('store-medicines');
            Route::get('/medicines/edit/{id}', 'edit')->name('edit-medicines');
            Route::put('/medicines/update/{id}', 'update')->name('update-medicines');
            Route::delete('/medicines/delete/{id}', 'destroy')->name('delete-medicines');
        });
    });
});


Route::controller(PatientsRegisterController::class)->group(function () {
    Route::prefix('register')->group(function () {
        Route::get('/patients', 'create')->name('create-patient');
        Route::post('/patients', 'store')->name('store-patient');
        Route::get('/show', 'show')->name('show-patient');
    });
});

Route::controller(PatientsChecksController::class)->group(function () {
    Route::prefix('register')->group(function () {
        Route::get('/clinics', 'create')->name('register-clinics');
        Route::post('/clinics', 'store')->name('store-clinics');
    });
});

