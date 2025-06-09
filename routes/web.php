<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PerformanceController;

Route::get('/', [PerformanceController::class, 'index'])->name('performances.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/performances/create', [PerformanceController::class, 'create'])->name('performances.create');
    Route::get('/performances/{performance}/edit', [PerformanceController::class, 'edit'])->name('performances.edit');
    Route::put('/performances/{performance}', [PerformanceController::class, 'update'])->name('performances.update');
    Route::post('/performances', [PerformanceController::class, 'store'])->name('performances.store');

    # Bulk Methods
    Route::post('/performances/bulk-add5min', [PerformanceController::class, 'bulkAddFiveMinutes'])
        ->name('performances.bulkAddFiveMinutes');
});

require __DIR__.'/auth.php';
