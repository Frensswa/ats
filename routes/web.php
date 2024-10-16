<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function (): void {
    Route::get('/', function () {
        return view('welcome');
    });
});

Route::view('/forgot-password', 'welcome')
        ->name('forgot-password');
