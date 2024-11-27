<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookingController;

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', function () {
    return redirect()->route('events.index');
})->name('home');

// Rotte protette per gli amministratori
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
    Route::post('/events', [EventController::class, 'store'])->name('events.store');
    Route::get('/events/{event}/edit', [EventController::class, 'edit'])->name('events.edit');
    Route::put('/events/{event}', [EventController::class, 'update'])->name('events.update');
    Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('events.destroy');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::put('/users/{user}/make-admin', [UserController::class, 'makeAdmin'])->name('users.makeAdmin');
});

// Rotte accessibili a tutti gli utenti autenticati o ospiti
Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');

// Rotta per prenotare un evento
Route::post('/events/{event}/book', [BookingController::class, 'store'])->name('events.book');

// Rotte per il profilo utente
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::put('/profile/update-password', [ProfileController::class, 'updatePassword'])->name('profile.updatePassword');
    Route::delete('/profile/cancel-booking/{booking}', [ProfileController::class, 'cancelBooking'])->name('profile.cancelBooking');
});