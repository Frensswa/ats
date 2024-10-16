<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\JobOpeningController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function (): void {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    
    Route::resource('clients', ClientController::class)->except(['edit', 'update', 'show']);
    Route::get('clients/{client}', [ClientController::class, 'edit'])->name('clients.edit');
    Route::post('clients/{client}', [ClientController::class, 'update'])->name('clients.update');

    Route::resource('job-openings', JobOpeningController::class)->except(['edit', 'update', 'show']);
    Route::get('job-openings/{jobOpening}', [JobOpeningController::class, 'edit'])->name('job-openings.edit');
    Route::post('job-openings/{jobOpening}', [JobOpeningController::class, 'update'])->name('job-openings.update');

});

Route::view('/forgot-password', 'welcome')
        ->name('forgot-password');
