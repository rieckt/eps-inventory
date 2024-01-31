<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Milon\Barcode\DNS1D;

use App\Models\Room;
use App\Models\Inventory;
use App\Models\Category;
use App\Models\Floor;
use App\Models\Teacher;

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
    $roomsCount = Room::count();
    $roomsLastUpdated = Room::latest()->first()->updated_at ?? now();

    $inventoriesCount = Inventory::count();
    $inventoriesLastUpdated = Inventory::latest()->first()->updated_at ?? now();

    $categoriesCount = Category::count();
    $categoriesLastUpdated = Category::latest()->first()->updated_at ?? now();

    $floorsCount = Floor::count();
    $floorsLastUpdated = Floor::latest()->first()->updated_at ?? now();

    $teachersCount = Teacher::count();
    $teachersLastUpdated = Teacher::latest()->first()->updated_at ?? now();

    return view('dashboard', compact(
        'roomsCount', 'roomsLastUpdated',
        'inventoriesCount', 'inventoriesLastUpdated',
        'categoriesCount', 'categoriesLastUpdated',
        'floorsCount', 'floorsLastUpdated',
        'teachersCount', 'teachersLastUpdated'
    ));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('inventory', \App\Http\Controllers\InventoryController::class);
Route::resource('room', \App\Http\Controllers\RoomController::class);
Route::resource('floor', \App\Http\Controllers\FloorController::class);
Route::resource('category', \App\Http\Controllers\CategoryController::class);
Route::resource('teacher', \App\Http\Controllers\TeacherController::class);

Route::get('/barcode/{barcode}', function ($barcode) {
    return DNS1D::getBarcodePNG($barcode, 'C39+',3,33,array(1,1,1), true);
});

require __DIR__.'/auth.php';
