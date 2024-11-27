<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LocatarioController;
use App\Http\Controllers\ImobiliariaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/dashboard', [Controller::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/imobiliarias', [ImobiliariaController::class, 'index'])->name('imobiliarias.index');
    Route::get('/imobiliarias/{imobiliaria}', [ImobiliariaController::class, 'show']);
    Route::post('/imobiliarias', [ImobiliariaController::class, 'store'])->name('imobiliarias.store');
    Route::put('/imobiliarias/{imobiliaria}', [ImobiliariaController::class, 'update'])->name('imobiliarias.update');
    Route::delete('/imobiliarias/{imobiliaria}', [ImobiliariaController::class, 'destroy'])->name('imobiliarias.destroy');

    Route::get('/locatarios', [LocatarioController::class, 'index'])->name('locatarios.index');
    Route::get('/locatarios/{locatario}', [LocatarioController::class, 'show'])->name('locatarios.show');
    Route::post('/locatarios', [LocatarioController::class, 'store'])->name('locatarios.store');
    Route::put('/locatarios/{locatario}', [LocatarioController::class, 'update'])->name('locatarios.update');
    Route::delete('/locatarios/{locatario}', [LocatarioController::class, 'destroy'])->name('locatarios.destroy');
});

require __DIR__.'/auth.php';
