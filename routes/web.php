<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MusicaController;
use App\Http\Controllers\TempoLiturgicoController;
use App\Http\Controllers\ParteMissaController;
use App\Http\Controllers\TipoCantoController;
use App\Http\Controllers\CadernoController;

// Página inicial (opcional)
Route::get('/', function () {
    return redirect()->route('musicas.index');
});

// CRUD de Músicas
Route::resource('musicas', MusicaController::class);

// CRUD de Tempos Litúrgicos
Route::resource('tempos', TempoLiturgicoController::class);

// CRUD de Partes da Missa
Route::resource('partes', ParteMissaController::class);

// CRUD de Tipos de Canto
Route::resource('tipos', TipoCantoController::class);

// CRUD de Cadernos
Route::resource('cadernos', CadernoController::class);

// Rota extra para exportar PDF de um caderno
Route::get('cadernos/{caderno}/export', [CadernoController::class, 'exportPdf'])->name('cadernos.export');
