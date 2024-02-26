<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager; // Fix the namespace
use App\Http\Controllers\BookingController;

// routes/web.php




// routes/web.php
//////////////////////////////////////////////////////////////

// routes/web.php


///////////////////////////////////////////////////////////////////

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('welcome');
});

Route::get('/frontpage', function () {
    return view('frontpage');
}); 
Route::get('/newfront', function () {
    return view('newfront');
}); 
Route::get('/registration', [AuthManager::class, 'registration'])->name('registration'); // Fix the namespace and casing
Route::post('/registration', [AuthManager::class, 'registrationpost'])->name('registration.post'); // Fix the namespace and casing
Route::get('/login', [AuthManager::class, 'login'])->name('login'); // Fix the namespace and casing
Route::post('/login', [AuthManager::class, 'loginpost'])->name('login.post'); // Fix the namespace and casing
Route::get('/logout', [AuthManager::class, 'logout'])->name('logout');
Route::get('/frontpage', [AuthManager::class, 'frontpage'])->name('frontpage');
Route::get('/newfront', [AuthManager::class, 'newfront'])->name('newfront');
Route::get('/homepage', [AuthManager::class, 'homepage'])->name('homepage');
Route::get('/frontpage', [AuthManager::class, 'frontpage'])->middleware('auth')->name('frontpage');

Route::get('/', function () {
    return view('homepage');
}); 
Route::get('/contact', [AuthManager::class, 'check'])->name('check');
Route::get('/contact', [AuthManager::class, 'contact'])->name('contact');
Route::get('/rooms', [AuthManager::class, 'rooms'])->name('rooms');
Route::get('/about', [AuthManager::class, 'contact'])->name('about');
Route::get('/about', [AuthManager::class, 'book'])->name('book');
Route::get('/about', [AuthManager::class, 'history'])->name('history');
Route::get('/about', [AuthManager::class, 'b2'])->name('b2');
Route::get('/contact', function () {
    return view('contact');
})->name('contact');
Route::get('/about', function () {
    return view('about');
})->name('about');
Route::get('/rooms', function () {
    return view('rooms');
})->name('rooms');
Route::get('/check', function () {
    return view('check');
})->name('check');
Route::get('/book', function () {
    return view('book');
})->name('book');
Route::get('/history', function () {
    return view('history');
})->name('history');
Route::get('/bookings', function () {
    return view('bookings');
})->name('bookings');
Route::get('/b2', function () {
    return view('b2');
})->name('b2');

Route::post('/bookings', [BookingController::class, 'store']);





