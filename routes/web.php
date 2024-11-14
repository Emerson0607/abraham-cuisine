<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservationController;
use App\Models\Reservation;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
       // Retrieve all reservations
       $reservations = Reservation::all();

       // Pass data to the view
       return view('dashboard', compact('reservations'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::prefix('reservations')->group(function () {
    Route::get('/', [ReservationController::class, 'index']); // Show all reservations 
    Route::get('/create', [ReservationController::class, 'create'])->name('reservations.create');
    
    // Store reservation (this is the one causing the error)
    Route::post('/', [ReservationController::class, 'store'])->name('reservations.store');
    Route::get('/reservations/{id}', [ReservationController::class, 'show'])->name('reservations.show');
    Route::put('/reservations/{id}', [ReservationController::class, 'update'])->name('reservations.update');

    Route::get('{id}/edit', [ReservationController::class, 'edit']); // Show edit form
    Route::delete('{id}', [ReservationController::class, 'destroy']); // Delete reservation
});




require __DIR__.'/auth.php';
