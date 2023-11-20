<?php

use App\Http\Controllers\ReservaController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\QuartoController;

/* Listagem de Quartos disponíveis */
Route::get('/', [QuartoController::Class, 'listarDisponiveis']);

/* Disponibilidade de Quartos e Edição */
Route::get('/quartos/create', [QuartoController::Class, 'create']);
Route::post('/quartos/store', [QuartoController::Class, 'store']);
Route::get('quartos/edit/{id}', [QuartoController::Class, 'edit'])->middleware('auth');
Route::put('quartos/update/{id}', [QuartoController::Class, 'update'])->middleware('auth');

/* Mostrar quarto para reserva */
Route::get('/quartos/{id}', [QuartoController::Class, 'show'])->middleware('auth');

/* Visualização das reservas */
Route::get('/reservas', [ReservaController::Class, 'index'])->middleware('auth');

/* Reservar e Cancelar Reserva */
Route::post('/reservas/store/{id}', [ReservaController::Class, 'store'])->middleware('auth');
Route::get('reservas/delete/{id}', [ReservaController::Class, 'destroy'])->middleware('auth');
