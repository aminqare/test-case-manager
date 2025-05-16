<?php

use App\Http\Controllers\ProfileController;

use App\Http\Controllers\DeviceController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DeviceTestCaseController;

Route::resource('devices.test-cases', DeviceTestCaseController::class);



Route::get('/', function () {
    return view('welcome');
});

Route::get('/issues', function () {
    return view('issues.index');
})->middleware(['auth']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('devices', DeviceController::class);
});

require __DIR__.'/auth.php';
