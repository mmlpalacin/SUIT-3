<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use App\Models\Asignacion_de_Cursos;
use App\Models\Asistencia;

Route::get('/', [HomeController::class, 'index'])->name('anuncios.index');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        $user = Auth::user();
        $role = $user->roles->first()->name;

        $cursos = Asignacion_de_Cursos::where('user_id', $user->id)->with('curso')->get();
        
        $asistencias = Asistencia::whereHas('alumno', function ($query) use ($user) {
            $query->where('alumno_id', $user->id);
        })->get();

        return view('dashboard', compact('cursos', 'asistencias', 'role'));
    })->name('dashboard');
});
