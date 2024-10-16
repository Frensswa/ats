<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function (): void {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    
    Route::resource('clients', ClientController::class)->except(['edit', 'update']);
    Route::get('clients/{client}', [ClientController::class, 'edit'])->name('clients.edit');
    Route::post('clients/{client}', [ClientController::class, 'update'])->name('clients.update');

});

Route::view('/forgot-password', 'welcome')
        ->name('forgot-password');
