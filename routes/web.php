<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;


Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', function () {
    return redirect()->route('events.index');
})->name('home');
Route::resource('events', EventController::class);