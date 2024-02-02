<?php

use App\Http\Controllers\Auth\{
    AuthenticatedSessionController,
    ConfirmablePasswordController,
    EmailVerificationNotificationController,
    EmailVerificationPromptController,
    NewPasswordController,
    PasswordController,
    PasswordResetLinkController,
    RegisteredUserController,
    VerifyEmailController,
};
use App\Http\Controllers\{
    ProfileController,
    ItemController,
    RoomController,
    FloorController,
    CategoryController,
    TeacherController,
    ItemStatusController,
    StatusController,
};
use Illuminate\Support\Facades\Route;

// Routes for guests
Route::middleware('guest')->group(function () {
    // Registration routes
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);

    // Login routes
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    // Password reset routes
    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
    Route::post('reset-password', [NewPasswordController::class, 'store'])->name('password.store');
});

// Routes for authenticated users
Route::middleware('auth')->group(function () {
    // Email verification routes
    Route::get('verify-email', EmailVerificationPromptController::class)->name('verification.notice');
    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)->middleware(['signed', 'throttle:6,1'])->name('verification.verify');
    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])->middleware('throttle:6,1')->name('verification.send');

    // Password confirmation routes
    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])->name('password.confirm');
    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    // Password update route
    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    // Logout route
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Resource routes
    Route::resources([
        'items' => ItemController::class,
        'room' => RoomController::class,
        'floor' => FloorController::class,
        'category' => CategoryController::class,
        'teacher' => TeacherController::class,
        'itemStatus' => ItemStatusController::class,
        'status' => StatusController::class,
    ]);
});
