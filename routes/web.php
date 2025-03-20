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

    // ➤ Nueva ruta para mostrar superhéroes inactivos
    Route::get('/inactivos', [SuperheroeController::class, 'inactivos'])->name('superheroes.inactivos');

    // ➤ Ruta para restaurar un superhéroe
    Route::post('/{id}/restaurar', [SuperheroeController::class, 'restore'])->name('superheroes.restore');

    // ➤ Ruta para eliminar permanentemente un superhéroe
    Route::delete('/{id}/force-delete', [SuperheroeController::class, 'forceDelete'])->name('superheroes.forceDelete');
});


