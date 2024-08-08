<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Preceptor\CursoController;
use App\Http\Controllers\Preceptor\AsistenciaController;

route::resource('curso', cursoController::class)->names('prece.curso');
Route::resource('cursos/{curso}/asistencias', AsistenciaController::class)->names('prece.asistencia');