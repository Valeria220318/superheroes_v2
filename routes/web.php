<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperheroeController;

// Ruta de inicio
Route::get('/', function () {
    return view('welcome');
});

// Rutas para el CRUD de Superhéroes
Route::prefix('superheroes')->group(function () {
    Route::get('/', [SuperheroeController::class, 'index'])->name('superheroes.index');
    Route::get('/create', [SuperheroeController::class, 'create'])->name('superheroes.create');
    Route::post('/', [SuperheroeController::class, 'store'])->name('superheroes.store');
    Route::get('/{id}/edit', [SuperheroeController::class, 'edit'])->name('superheroes.edit');
    Route::put('/{id}', [SuperheroeController::class, 'update'])->name('superheroes.update');
    Route::delete('/{id}', [SuperheroeController::class, 'destroy'])->name('superheroes.destroy');
});

