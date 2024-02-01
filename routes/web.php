<?php

use App\Http\Controllers\{
    DashboardController,
    BarcodeController,
};
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/barcode/{barcode}', [BarcodeController::class, 'show'])
    ->middleware('auth')
    ->name('barcode.show');

require __DIR__.'/auth.php';
