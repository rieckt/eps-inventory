<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Milon\Barcode\DNS1D;

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

Route::get('/', function () {
    return view('index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('inventory', \App\Http\Controllers\InventoryController::class);

Route::get('/barcode/{barcode}', function ($barcode) {
    return DNS1D::getBarcodePNG($barcode, 'C39+',3,33,array(1,1,1), true);
});

require __DIR__.'/auth.php';
