<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\RatingController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Ruta para el Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rutas para la gestión del perfil (autenticación)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rutas para gestionar las propiedades
Route::resource('properties', PropertyController::class)->middleware('auth');

// Ruta para guardar valoraciones
Route::post('properties/{property}/ratings', [RatingController::class, 'store'])->name('ratings.store');

// Ruta para gestionar usuarios
Route::prefix('admin')->name('admin.')->middleware('role:admin')->group(function () {
    Route::resource('users', UserController::class);
});






require __DIR__.'/auth.php';
