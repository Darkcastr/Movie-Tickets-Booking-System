<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home');
});


Route::get('/login', [App\Http\Controllers\AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [App\Http\Controllers\AuthController::class, 'login']);
Route::get('/register', [App\Http\Controllers\AuthController::class, 'showRegister']);
Route::post('/register', [App\Http\Controllers\AuthController::class, 'register']);
Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout']);
Route::get('/movies', [App\Http\Controllers\MovieController::class, 'index']);
Route::get('/movies/{id}', [App\Http\Controllers\MovieController::class, 'show']);
Route::get('/bookings/create/{showtimeId}', [App\Http\Controllers\BookingController::class, 'create']);
Route::post('/bookings', [App\Http\Controllers\BookingController::class, 'store']);
Route::get('/my-bookings', [App\Http\Controllers\BookingController::class, 'index'])->name('bookings.index');



Route::get('/bookings/{id}', [App\Http\Controllers\BookingController::class, 'show'])->name('bookings.show');
Route::delete('/bookings/{id}', [App\Http\Controllers\BookingController::class, 'destroy'])->name('bookings.destroy');

Route::middleware('auth.check')->get('/my-bookings', [App\Http\Controllers\BookingController::class, 'myBookings']);
