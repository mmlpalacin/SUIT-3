<?php

namespace App\Http\Controllers\Preceptor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Asistencia;
use App\Models\Curso;
use App\Models\User;

class AsistenciaController extends Controller
{
    public function index(Curso $curso)
    {
        $alumnos = User::alumnosPorCurso($curso->id)->get();
        $fechas = Asistencia::select('date')->distinct()->orderBy('date', 'desc')->pluck('date');

        return view('preceptor.asistencia.index', compact('curso','alumnos', 'fechas'));
    }

    public function create(curso $curso)
    {
        $alumnos = User::alumnosPorCurso($curso->id)->get();

        return view('preceptor.asistencia.create', compact('curso', 'alumnos'));
    }

    public function store(Request $request, Curso $curso)
    {
        $data = $request->validate([
            'asistencias.*.alumno_id' => 'required|exists:users,id',
            'asistencias.*.estado' => 'required|in:presente,tarde,ausente',
            'date' => 'required|date',
        ]);
    
        foreach ($data['asistencias'] as $asistenciaData) {
            Asistencia::updateOrCreate(
                [
                    'alumno_id' => $asistenciaData['alumno_id'],
                    'date' => $data['date']
                ],
                [
                    'estado' => $asistenciaData['estado']
                ]
            );
        }
        return redirect()->route('prece.asistencia.index', $curso);
    }
}
