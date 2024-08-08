<?php

namespace App\Http\Controllers\Preceptor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CursoController extends Controller
{
    function index ()
    {
        $user_id = Auth::id();
        $cursos = Curso::whereHas('asignaciones', function ($query) use ($user_id) {
            $query->where('user_id', $user_id);
        })->get();

        return view('preceptor.lista-curso', compact('cursos'));
    }
    
    function show (Curso $curso)
    {
        $asignaciones = $curso->asignaciones;

        $alumnos = User::alumnosPorCurso($curso->id)->get();

        $profesores = User::profesoresPorCurso($curso->id)->get();

        return view('preceptor.curso', compact('curso', 'alumnos', 'profesores'));
    }
}
