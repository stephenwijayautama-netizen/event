<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\bookingController;
use App\Http\Controllers\eventController;




Route::post('/booking', [bookingController::class, 'store'])->name('booking.store');
Route::get('/daftar', [bookingController::class, 'index'])->name('daftar');
Route::get('/', [eventController::class, 'index'])->name('event');
Route::get('/store', [eventController::class, 'store'])->name('event.store');

Route::get('/home', [eventController::class, 'home'])->name('home');